<?php

class DBHelp {

    public static function buildUpData($data) {
        $sql = '';
        if (is_array($data) && !empty($data)) {
            foreach ($data as $k => $v) {
                $itmes[] = " {$k}=:{$k}";
            }
            $sql = implode(',', $itmes) . '  ';
            return $sql;
        }
        return '1=1';
    }

    public static function buildWhere($data) {
        $sql = '';
        $itmes = array();
        if (is_array($data) && !empty($data)) {
            foreach ($data as $k => $v) {
                $itmes[] = " {$k}=:{$k}";
            }
            $sql = implode(' and ', $itmes);
            return $sql;
        }
        return '1=1';
    }

    public static function getWhiteItem($data, $white_list = array(), $ignore_empty = true) {
        $result = array();
        foreach ($white_list as $v) {
            if (isset($data[$v])) {
                if ($ignore_empty && $data[$v] === "") {
                    continue;
                }
                $result[$v] = $data[$v];
            }
        }
        return $result;
    }

}
