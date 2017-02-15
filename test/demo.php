<?php
/**
 * Created by PhpStorm.
 * User: yu.fu
 * Date: 2016/12/2
 * Time: 9:25
 */
//include("../src/utils/utils.php");
//include("../src/fanli.php");
//use fanlisdk\src\fanli;
include("../vendor/autoload.php");//若不用auloader加载则需引入文件

$util = new \fanlisdk\src\utils\utils();

$config = ['shopid' => 1234, 'shopkey' => '51fanli'];
$fanli = new fanlisdk\src\fanli($config);
$testdata = ['orders' => array(['test' => 1, 'products' => array(['pid' => 1], ['pid' => 2])], ['test' => 2])];//自己造个符合格式的数组
$postxml = $util->xmlencode($testdata, 'offline');
var_dump($postxml);

$result = $fanli->push(['content' => $postxml]);

var_dump($result);

