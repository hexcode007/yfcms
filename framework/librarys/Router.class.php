<?php

class Router {

    private static $controller = 'index';
    private static $action = 'index';
    private static $params = array();
    private static $uri = null;
    private static $default_uri = null;

    public static function parseUri() {

        self::$default_uri = self::$uri = self::_getUri();

        $router = Config::get('*', 'router');

        if (is_array($router) && !empty($router)) {
            if (isset($router['default']['controller']) && $controller = $router['default']['controller']) {
                self::setController($controller);
            }

            if (isset($router['default']['action']) && $action = $router['default']['action']) {
                self::setAction($action);
            }
            unset($router['default']);
            foreach ($router as $method => $arr) {
                if ($method == strtolower($_SERVER['REQUEST_METHOD']) || $method === 'any') {
                    foreach ($arr as $key => $val) {
                        $key = str_replace(array('.', '/'), array('\.', '\/'), $key);
                        if (preg_match('#^' . $key . '$#', self::$uri)) {
                            if (strpos($val, '$') !== FALSE AND strpos($key, '(') !== FALSE) {
                                self::$uri = preg_replace('#^' . $key . '$#', $val, self::$uri);
                                self::$uri = preg_replace('#//+#', '/', self::$uri);
                                self::$uri = preg_replace('#\.[\s./]*/#', '', self::$uri);
                                self::$uri = trim(self::$uri, '/');
                            } else {
                                self::$uri = trim($val, '/');
                            }
                            break;
                        }
                    }
                }
                continue;
            }
        }
        self::_setRouter(self::$uri);
    }

    public static function setController($str) {
        self::$controller = $str;
    }

    public static function setAction($str) {
        self::$action = $str;
    }

    public static function setParams($arr) {
        self::$params = $arr;
    }

    public static function getController() {
        return self::$controller;
    }

    public static function getAction() {
        return self::$action;
    }

    public static function getParams() {
        return self::$params;
    }

    public static function getUri() {
        return self::$uri;
    }

    public static function getDefaultUri() {
        return self::$default_uri;
    }

    public static function setDefaultUri($uri) {
        return self::$default_uri = $uri;
    }

    private static function _setRouter($uri) {
        $uri_arr = explode("/", self::$uri);

        self::setController(isset($uri_arr[0]) && $uri_arr[0] ? $uri_arr[0] : self::getController());
        self::setAction(isset($uri_arr[1]) && $uri_arr[1] ? $uri_arr[1] : self::getAction());
        unset($uri_arr[0], $uri_arr[1]);
        self::setParams($uri_arr);
    }

    private static function _getUri() {
        if (!empty($_SERVER['PATH_INFO'])) {
            // PATH_INFO does not contain the docroot or index
            $uri = $_SERVER['PATH_INFO'];
        } elseif (isset($_GET['_url']) && !empty($_GET['_url'])) {
            $uri = $_GET['_url'];
        } else {
            // REQUEST_URI and PHP_SELF include the docroot and index

            if (isset($_SERVER['REQUEST_URI'])) {
                // REQUEST_URI includes the query string, remove it
                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            } elseif (isset($_SERVER['PHP_SELF'])) {
                $uri = $_SERVER['PHP_SELF'];
            } elseif (isset($_SERVER['REDIRECT_URL'])) {
                $uri = $_SERVER['REDIRECT_URL'];
            } else {
                // If you ever see this error, please report an issue at and include a dump of $_SERVER
                throw new Exception('Unable to detect the URI using PATH_INFO, REQUEST_URI, or PHP_SELF');
            }

            // Get the path from the base URL, including the index file
            $base_url = parse_url("/", PHP_URL_PATH);

            if (strpos($uri, $base_url) === 0) {
                // Remove the base URL from the URI
                $uri = substr($uri, strlen($base_url));
            }

            if (strpos($uri, "index.php") === 0) {
                // Remove the index file from the URI
                $uri = substr($uri, strlen("index.php"));
            }
        }

        // Reduce multiple slashes to a single slash
        $uri = preg_replace('#//+#', '/', $uri);

        // Remove all dot-paths from the URI, they are not valid
        $uri = preg_replace('#\.[\s./]*/#', '', $uri);

        $uri = trim($uri, '/');

        return $uri;
    }

}
