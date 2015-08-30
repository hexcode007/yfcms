<?php

/**
 * 获取配置类
 */
class Config {

    //存储已读取的配置
    private static $_config;

    //获取对应文件配置
    private static function getConfig($filename) {
        if (!isset(self::$_config[$filename])) {
            //配置文件
            $config_file = APPPATH . 'configs/' . $filename . '.php';

            if (!file_exists($config_file)) {
                self::$_config[$filename] = array();
                return false;
            }

            //转成数组以方便动态读取
            self::$_config[$filename] = require $config_file;
        }

        return self::$_config[$filename];
    }

    /**
     * 获取配置内容
     *
     * @param  string $info         要获取的配置信息
     * @param  string $filename     获取哪个文件的配置
     * @return 数组或数组键对应类型
     */
    public static function get($info, $filename = 'global') {
        try {
            //获取配置
            $config = self::getConfig($filename);

            if ($config === false) {
                return '';
            }
            if ($info === "*") {
                return $config;
            }
            //按"."分割字符串
            $str = explode('.', $info);
            //设置将要返回的值
            $ret = isset($config[$str[0]]) ? $config[$str[0]] : '';

            //是否有多个层级
            if (($count = count($str)) > 1) {
                if (is_array($ret)) {
                    for ($i = 1; $i < $count; ++$i) {
                        $value = isset($ret[$str[$i]])  ?  $ret[$str[$i]] : '' ;
                        if (is_array($ret)) {
                            if (isset($value)) {
                                $ret = $value;
                            } else {
                                $ret = '';
                                break;
                            }
                        }
                    }
                } else {
                    $ret = '';
                }
            }

            return $ret;
        } catch (Exception $e) {
            return '';
        }
    }

}
