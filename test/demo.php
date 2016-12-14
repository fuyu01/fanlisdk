<?php
/**
 * Created by PhpStorm.
 * User: yu.fu
 * Date: 2016/12/2
 * Time: 9:25
 */
include("../src/utils/util.php");
include("../src/fanli.php");
use src\fanli;
$config = ['shopid' => 1234, 'shopkey' => '51fanli'];
$fanli = new fanli($config);
$result = $fanli->push(['content'=>'<?xml version="1.0" encoding="utf-8"?>
<orders version="4.0" type="offline">
<order>
<s_id>1234</s_id>
<order_id_parent>DD9678453</order_id_parent>
<order_id>DD9678453_1</order_id>
<order_time>2013-01-01 08:10:01</order_time>
<uid>1234567</uid>
<pay_time>2013-01-01 08:20:01</pay_time>
<status>1</status>
<lastmod>2013-01-01 08:20:01</lastmod>
<is_newbuyer>0</is_newbuyer>
<code>123456789</code>
<remark>备注</remark>
<extension>
<seqno>16101712123522</seqno>
<reg_addr>杭州市</reg_addr>
<pay_addr>杭州市</pay_addr>
<payaddr_code>127</payaddr_code>
<store_code>20145111</store_code>
<store_name>杭州市金山路**二店</store_name>
<store_addr>杭州市金山路鞍山大道300号</store_addr>
<store_moblie>13611111111</store_moblie>
<b_uid>12345@51fanli</b_uid>
<b_umoblie>13611111111</b_umoblie>
<reg_time>2013-01-01 08:20:01</reg_time>
</extension>
<products>
<product>
<pid>21312</pid>
<title><![CDATA[ 贝伊 保健护颈护肩枕 枕芯 枕头 BH-决明子蚕丝枕 ]]></title>
<category>5001</category>
<category_title>服装</category_title>
<num>3</num>
<price>40</price>
<real_pay_fee>80</real_pay_fee>
<refund_num>1</refund_num>
<commission>1.25</commission>
<comm_type>A</comm_type>
</product>
</products>
</order>
</orders>
']);

var_dump($result);
$util = new src\utils\Utils();
var_dump($util->xmldecode($result));

