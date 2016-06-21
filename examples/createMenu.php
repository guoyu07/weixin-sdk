<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 15:54
 * @description: 创建菜单
 */
require_once __DIR__ . '/../autoload.php';

use Wxpub\Weixin\Menu\MenuApi;
use Wxpub\Weixin\Menu\MenuType;

$access_token = 'pYBxxM4L1kDxBknlXVzXlepQaPNY0jVC8KPMRgTCrHRYiRi-4qmL0ZIeRw_h1LIVRftHnrhk9i9XyiPFBsLQAcn3zdzc4AUnGoFvoTbsxmUwFDhPzfa3pI8EGzeCMPzNDZUiAIARNI';

$menu = new  MenuApi($access_token);

// 菜单数据
$menuData = array(
    array(
        'name'  => '购物平台',
        'type'  => 'view',
        'url'   => 'https://wap.koudaitong.com/v2/showcase/feature?alias=mvcxsa9b',
    ),
    array(
        'name'  => '加盟中心',
        'sub_button'    => array(
            array(
                'type'  => 'click',
                'key'   => 'SELF_QRCODE01',
                'name'  => '我的推广二维码',
            ),
        ),
    ),
    array(
        'name'  => '联系我们',
        'type'  => 'view',
        'url'   => 'http://wap.koudaitong.com/v2/showcase/feature?alias=sl8um0vr',
    ),
);



$ret = $menu->createMenu($menuData);

var_dump($ret);