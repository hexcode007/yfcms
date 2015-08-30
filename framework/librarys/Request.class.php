<?php

class Request {

    public static $instance = null;

    public static function instance(& $uri = TRUE) {
        if (!Request::$instance) {
            Request::$instance = new Request();
        }

        return Request::$instance;
    }

    public function start($settings = null) {
        if (!get_magic_quotes_gpc()) {
            $_GET = $this->filter($_GET);
            $_POST = $this->filter($_POST);
            $_COOKIE = $this->filter($_COOKIE);
        }
        return $this;
    }


    public function filter($value) {
        if (is_array($value) OR is_object($value)) {
            foreach ($value as $key => $val) {
                // Recursively clean each value
                $value[$key] = $this->filter($val);
            }
        } elseif (is_string($value)) {
            $value = addslashes($value);
            if (strpos($value, "\r") === FALSE) {
                $value = str_replace(array("\r\n", "\r"), "\n", $value);
            }
        }

        return $value;
    }

    public function execute() {
        $suffix = "Controller";
        Router::parseUri();
        try {

            $_cc = ucfirst(Router::getController()) . $suffix;
            Loader::autoload($_cc);

            if (!class_exists($_cc, false) && !interface_exists($_cc, false)) {
                throw new Exception('Class ' . $_cc . ' does not exist');
            }

            $class = new ReflectionClass($_cc);

            if ($class->isAbstract()) {
                throw new Exception('Cannot create instances of abstract ' . $_cc . '');
            }

            // Create a new instance of the controller
            $controller = $class->newInstance();

            // Execute the "before action" method
            //$class->getMethod('before')->invoke($controller);
            // Execute the main action with the parameters
            $class->getMethod(Router::getAction() . 'Action')->invokeArgs($controller, Router::getParams());

            // Execute the "after action" method
            //$class->getMethod('after')->invoke($controller);
        } catch (Exception $e) {
            throw $e;
        }
        return $this;
    }

}

// End Request
