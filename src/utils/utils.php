<?php
/**
 * Created by PhpStorm.
 * User: yu.fu
 * Date: 2016/12/2
 * Time: 17:58
 */
namespace fanlisdk\src\utils;

class utils {
    private $xmlNode = [
        'orders' => 'order',
        'products' => 'product',
        'extension' => 'extension'
    ];

    //push接口暂时没有签名
    public function getSign() {

    }

    public function xmldecode($xml) {
        return json_decode(json_encode(simplexml_load_string($xml)), true);
    }

    public function xmlencode(array $data, $type = '', $version = '4.0') {
        if (!$data) {
            return false;
        }
        $is_type = $type ? 'type="' . $type . '"' : '';
        $xml = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?><orders ' . $is_type . ' version="' . $version . '"></orders>');

        return $this->generate($data['orders'], $xml, 'orders')->asXML();
    }

    private function generate(array $data, \SimpleXMLElement $obj, $name = '') {
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                if (!is_numeric($k)) {
                    $x = $obj->addChild($k);
                    $name = $k;
                } else {
                    $x = $obj->addChild($this->xmlNode[$name]);
                }

                $this->generate($v, $x, $name);
            } else $obj->addChild($k, $v);
        }

        return $obj;
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