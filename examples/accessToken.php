<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 13:24
 * @description:
 */

require_once __DIR__ . '/../autoload.php';

use Wxpub\Weixin\BasicApi;

$api = new BasicApi();
$ret = $api->getAccessToken();
var_dump($ret['access_token']);