<?php
/**
 * Created by PhpStorm.
 * User: yu.fu
 * Date: 2016/12/2
 * Time: 17:58
 */
namespace src\utils;

class Utils {
    public function getSign() {

    }

    public function xmldecode($xml) {
        return json_decode(json_encode(simplexml_load_string($xml)), true);
    }

    public function xmlgenerate(array $data) {

    }

    public function curl(array $postdata, $url) {
        $ch = curl_init();
        if ($ch === false) {
            return false;
        }
        //目前推送接口只支持post方式
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type:application/x-www-form-urlencoded', 'Accept:application/xml']);

        $result = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return array('http_code' => $http_code, 'data' => $result);
    }

}