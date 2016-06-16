<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 15:54
 * @description: 创建菜单
 */
require_once __DIR__ . '/../autoload.php';

use Wxpub\Weixin\Menu\MenuApi;
use Wxpub\Weixin\Menu\MenuType;

$access_token = 'naZ_ZXe6cYBneTne2OjURgvuNtTPD8VSkp3VVam_BiD9unAns_3Gf9ZafD_K4d6yE2p283gg0hf0gG-MPTUoNKe8vZhGEqFekVtqb7terGeitrpV4WtYmQf6w9lLc3tZUFTeAFALWK';

$menu = new  MenuApi($access_token);

// 菜单数据
$menuData = [
    [
        'type'  => MenuType::VIEW,
        'name'  => '预约拍摄',
        'url'   => 'http://www.pugefei.com/'
    ],
    [
        'name'  => '了解我们',
        'sub_button'    => [
            [
                'type'  => MenuType::VIEW,
                'name'  => '客服微信',
                'view'  => 'http://www.baidu.com/'
            ],
            [
                'type'  => MenuType::VIEW,
                'name'  => '新品发布',
                'view'  => 'http://www.baidu.com/'
            ]
        ]
    ],
    [
        'name'  => '了解我们',
        'sub_button'    => [
            [
                'type'  => MenuType::VIEW,
                'name'  => '希顿国际广场店',
                'view'  => 'http://www.baidu.com/'
            ],
            [
                'type'  => MenuType::VIEW,
                'name'  => '凯德天府店',
                'view'  => 'http://www.baidu.com/'
            ]
        ]
    ]
];



$ret = $menu->createMenu($menuData);

var_dump($ret);