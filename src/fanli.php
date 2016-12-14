<?php
/**
 * Created by PhpStorm.
 * User: yu.fu
 * Date: 2016/12/2
 * Time: 9:22
 */
namespace fanlisdk\src;

require_once 'utils/util.php';
use fanlisdk\src\utils\utils as util;

class fanli {
    private $host = 'http://union.fanli.com/';
    private $config;
    private $util;

    /**
     * sdk
     * @param $config ,包括shopid和shopkey
     */
    public function __construct(array $config) {
        if (!$config || !$config['shopid'] || !$config['shopkey']) {
            throw new \Exception('config缺少参数');
        }
        $this->config = $config;
        $this->util = new util();
    }

    public function push(array $postdata) {
        $url = $this->host . 'dingdan/push?shopid=' . $this->config['shopid'];
        return $this->util->curl($postdata, $url);
    }
}