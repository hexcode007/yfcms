<?php

/**
 * 通过Guzzle发送Http请求
 */
use GuzzleHttp\Pool;

class HttpRequest {

    private static $_instance;

    /**
     * @return Guzzle 实例
     */
    public static function getInstance() {
        if (null == self::$_instance) {
            self::$_instance = new GuzzleHttp\Client();
        }

        return self::$_instance;
    }

    /**
     * 通过guzzle发送post请求
     *
     * @param  string $url
     * @param  array $options
     * @param  string $contentType
     * @return array
     */
    public static function post($url = null, array $options = []) {
        $ret = [
            'statusCode' => -1,
            'body' => '',
            'header' => '',
            'errorMsg' => ''
        ];

        try {
            $client = self::getInstance();
            $response = $client->post($url, $options);

            $ret['statusCode'] = $response->getStatusCode();
            $contentType = $response->getHeader('content-type');

            if (false !== strpos($contentType, 'application/json')) {
                //json格式解析
                $ret['contentType'] = 'json';
            } else {
                //需要echo，这里是数据流格式，需要echo $ret['body']
                $ret['contentType'] = $contentType;
            }

            $ret['body'] = $response->getbody();
        } catch (Exception $e) {
            $ret['errorMsg'] = $e->getMessage();
        }

        return $ret;
    }

    /**
     * 通过guzzle发送并行请求
     *
     * @param  array $request_info 多个请求的地址
     * @return array  按请求的顺序以数字键为key，返回对应内容
     */
    public static function postConcurrent($request_info) {
        $ret = [];
        $requests = [];

        $client = self::getInstance();

        foreach ($request_info as $v) {
            //print_r($v['params']) . '<br>';
            $requests[] = $client->createRequest('post', $v['url'], isset($v['params']) ? $v['params'] : array());
        }

        // Results is a GuzzleHttp\BatchResults object.
        $results = Pool::batch($client, $requests);

        foreach ($results as $key => $response) {

            if (get_class($response) == 'GuzzleHttp\Message\Response') {
                $headers = $response->getHeaders();

                $contentType = $headers['Content-Type'][0];
                $contentType = explode(';', $contentType);

                $ret[$key]['contentType'] = $contentType[0];
                $ret[$key]['statusCode'] = $response->getStatusCode();

                if ($contentType[0] == 'application/json') {
                    $ret[$key]['contentType'] = 'json';
                }

                $ret[$key]['body'] = $response->getbody();
            } else {
                $ret[$key]['contentType'] = 'text/html';
                $ret[$key]['statusCode'] = $response->getCode();
                $ret[$key]['body'] = $response->getMessage();
            }
        }

        return $ret;
    }

}
