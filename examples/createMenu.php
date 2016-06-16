<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 15:54
 * @description: 创建菜单
 */
require_once __DIR__ . '/../autoload.php';

use Wxpub\Weixin\Menu\MenuApi;
use Wxpub\Weixin\Menu\MenuType;

$access_token = 'CtsvDOzaiPTq1AjH5OZ398sVu7RBJKPaFZAS6XUIprJr4Q_8VDjwQGCBCWXa2ZjevR3yxK9w-MM6xjL7inQgbPnqdrjGgnlPmIc5-Ov0OVcKar4a9nn_zRp3f2mhFqzALNAhAEAGIV';

$menu = new  MenuApi($access_token);

// 菜单数据
$menuData = [
    [
        'type'  => MenuType::VIEW,
        'name'  => '预约拍摄',
        'url'   => 'http://www.pugefei.com/'
    ],
    [
        'name'  => '看看我们',
        'sub_button'    => [
            [
                'type'  => MenuType::VIEW,
                'name'  => '客服微信',
                'url'  => 'http://www.baidu.com/'
            ],
            [
                'type'  => MenuType::VIEW,
                'name'  => '新品发布',
                'url'  => 'http://www.baidu.com/'
            ]
        ]
    ],
    [
        'name'  => '了解我们',
        'sub_button'    => [
            [
                'type'  => MenuType::VIEW,
                'name'  => '希顿国际广场店',
                'url'  => 'http://www.baidu.com/'
            ],
            [
                'type'  => MenuType::VIEW,
                'name'  => '凯德天府店',
                'url'  => 'http://www.baidu.com/'
            ]
        ]
    ]
];



$ret = $menu->createMenu($menuData);

var_dump($ret);