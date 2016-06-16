<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 19:12
 * @description:
 */

require_once __DIR__ . '/../autoload.php';

$access_token = 'CtsvDOzaiPTq1AjH5OZ398sVu7RBJKPaFZAS6XUIprJr4Q_8VDjwQGCBCWXa2ZjevR3yxK9w-MM6xjL7inQgbPnqdrjGgnlPmIc5-Ov0OVcKar4a9nn_zRp3f2mhFqzALNAhAEAGIV';

use Wxpub\Weixin\Menu\MenuApi;

$menu = new  MenuApi($access_token);

$ret = $menu->controlMenu('config');
var_dump($ret);