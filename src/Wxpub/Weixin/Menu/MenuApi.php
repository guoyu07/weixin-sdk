<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 13:28
 * @description:微信菜单相关api
 */

namespace Wxpub\Weixin\Menu;


use Wxpub\Contracts\WeixinApiInterface;
use Wxpub\Utils\Curl;
use Wxpub\WxpubCode;
use Wxpub\WxpubUrl;

class MenuApi extends WeixinApiInterface
{
    protected $curl;
    public function __construct($access_token)
    {
        parent::__construct($access_token);
        $this->curl = new Curl();
    }

    /**
     * 创建订单时，需要提供的数组数据结构如下：
     * 详情，参考：https://mp.weixin.qq.com/wiki/10/0234e39a2025342c17a7d23595c6b40a.html#
     *
     * ```php
     *  [
     *      [
     *          'type' => 'click',// 菜单的响应动作类型 @see MenuType
     *          'name'  => '商城',// 菜单名称
     *          'key'   => 'sakdjfksd'// 菜单KEY值，用于消息接口推送，不超过128字节
     *      ],
     *      [
     *          'name'  => '点我点我',
     *          'sub_button'    => [
     *              [
     *                  'type'  => 'view',
     *                  'name'  => '搜索',
     *                  'url'   => 'http://www.pugefei.com/'
     *              ],
     *              [
     *                  'type'  => 'click',
     *                  'name'  => '赞一下',
     *                  'url'   => 'abcdefad'
     *              ]
     *          ]
     *      ]
     *  ]
     * ```
     *
     *
     * @param array $menu 订单内容
     * @return boolean|array 成功返回true，失败返回数组，及错误信息
     * @author helei
     */
    public function createMenu(array $menu)
    {
        $data['button'] = $menu;

        $url = WxpubUrl::getCreateMenuUrl($this->access_token);

        header('Content-type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);exit;
        $ret = $this->curl->post(json_encode($data, JSON_UNESCAPED_UNICODE))->submit($url);

        $retArr = json_decode($ret['body'], true);
        
        if ($retArr['errcode'] != WxpubCode::SUCC) {
            return $retArr;
        }

        return true;
    }

    public function queryMenu()
    {

    }

    public function deleteMenu()
    {

    }

    public function pushMenu()
    {

    }

    public function customMenu()
    {

    }

    public function getMenuConfig()
    {

    }
}