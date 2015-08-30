<?php

/**
 * 参数验证类
 */
class Validate {

    private $data;
    public static $instance = null;

    public static function instance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function checkAllParams(&$request) {
        $this->data = $this->getRules();
        if ($this->checkRules($this->data)) {
            foreach ($this->data as $k => $v) {
                if (empty($v[0])) {
                    $request[$k] = '';
                    continue;
                }
                $rules = explode('|', $v[0]);
                $msg = isset($v[1]) ? $v[1] : '';
                $return = $this->checkOneParam($k, $request, $rules, $msg);
                if ($return === false) {
                    return array(1, $msg);
                }
            }
            return array(0, '');
        }
        return array(0, '');
    }

    private function checkOneParam($attribute, &$params, $rules, $msg) {
        $value = isset($params[$attribute]) ? $params[$attribute] : $params[$attribute] = '';
        foreach ($rules as $rule) {
            $export_rule = explode(':', $rule);
            $method = 'validate' . ucfirst($export_rule[0]);
            unset($export_rule[0]);
            if (!method_exists($this, $method)) {
                throw new Exception("参数{$attribute}的验证规则中{$method}规则不存在");
            }

            if ($this->{$method}($attribute, $value, array_values($export_rule)) == false) {
                return false;
            }
        }
        return true;
    }

    private function requireParameterCount($count, $parameters, $rule) {
        if (count($parameters) < $count) {
            throw new Exception("$rule需要$count个参数");
        }
    }

    private function getSize($attribute, $value) {
        $hasNumeric = $this->hasRule($attribute, 'numeric');
        $hasInt = $this->hasRule($attribute, 'int');
        if (is_numeric($value) && ($hasNumeric || $hasInt)) {
            return $value;
        } elseif (is_array($value)) {
            return count($value);
        }

        return $this->getStringSize($value);
    }

    private function getStringSize($value) {
        if (function_exists('mb_strlen'))
            return mb_strlen($value);

        return strlen($value);
    }

    private function hasRule($attribute, $rules) {
        $relustr = $this->data[$attribute][0];
        return strpos($relustr, $rules) !== false;
    }

    public function checkRules($rules) {
        if (is_array($rules)) {
            foreach ($rules as $k => $rule) {
                if (!is_array($rules)) {
                    throw new Exception("参数{$k}的验证规则错误");
                }
            }
            return true;
        }
        return false;
    }

    public function getRules() {
        $params = Config::get(Router::getUri(), 'params');
        if ($params) {
            return $params['rule'];
        }
        return false;
    }

    private function validateRequired($attribute, $value, $parameters = '') {
        if (is_null($value)) {
            return false;
        } elseif (is_string($value) && trim($value) === '') {
            return false;
        } elseif (is_array($value) && count($value) < 1) {
            return false;
        }
        return true;
    }

    private function validateRequiredIf($attribute, $value, $parameters) {
        $this->requireParameterCount(2, $parameters, 'requiredIf');

        $data = array_get($this->data, $parameters[0]);

        $values = array_slice($parameters, 1);

        if (in_array($data, $values)) {
            return $this->validateRequired($attribute, $value);
        }

        return true;
    }

    protected function validateInteger($attribute, $value) {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    protected function validateNumeric($attribute, $value) {
        return is_numeric($value);
    }

    protected function validateBoolean($attribute, $value) {
        $acceptable = array(true, false, 0, 1, '0', '1');
        return in_array($value, $acceptable, true);
    }

    protected function validateDifferent($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'different');
        $other = $parameters[0];
        return isset($this->data[$other]) && $value != $this->data[$other];
    }

    protected function validateSame($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'same');
        $other = array_get($this->data, $parameters[0]);
        return (isset($other) && $value == $other);
    }

    protected function validateConfirmed($attribute, $value) {
        return $this->validateSame($attribute, $value, array($attribute . '_confirmation'));
    }

    protected function validateArray($attribute, $value) {
        return is_array($value);
    }

    private function validateRegex($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'reg');
        return preg_match($parameters[0], $value);
    }

    protected function validateDate($attribute, $value) {
        if ($value instanceof DateTime)
            return true;
        if (strtotime($value) === false)
            return false;
        $date = date_parse($value);
        return checkdate($date['month'], $date['day'], $date['year']);
    }

    protected function validateDateFormat($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'date_format');
        $parsed = date_parse_from_format($parameters[0], $value);
        return $parsed['error_count'] === 0 && $parsed['warning_count'] === 0;
    }

    private function validateMin($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'min');

        return $this->getSize($attribute, $value) >= $parameters[0];
    }

    private function validateMax($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'max');
        return $this->getSize($attribute, $value) <= $parameters[0];
    }

    private function validateSize($attribute, $value, $parameters) {
        $this->requireParameterCount(1, $parameters, 'size');
        return $this->getSize($attribute, $value) == $parameters[0];
    }

    private function validateIn($attribute, $value, $parameters) {
        return in_array((string) $value, $parameters);
    }

    private function validateUsername($attribute, $value, $parameters) {
        return preg_match("/^[\w+]{6,16}$/", $value);
    }

    private function validateFile($attribute, $value, $parameters) {
        if (is_array($_FILES[$attribute]) && !empty($_FILES[$attribute]))
            return true;
        return false;
    }

    private function validateNotIn($attribute, $value, $parameters) {
        return !$this->validateIn($attribute, $value, $parameters);
    }

    private function validateEmail($attribute, $value, $parameters = '') {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function validateUrl($attribute, $value, $parameters = '') {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    private function validateIp($attribute, $value, $parameters = '') {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }

    private function validateMobile($attribute, $value, $parameters = '') {
        return preg_match("/^1[3|4|5|7|8][0-9]{9}$/", $value);
    }

}
