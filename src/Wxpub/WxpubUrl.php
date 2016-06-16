<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 13:15
 * @description: 定义用于微信各类请求的url
 */

namespace Wxpub;


class WxpubUrl
{
    /**
     * 刷新access_token 的url
     * @return string
     * @author helei
     */
    public static function getAccessTokenUrl()
    {
        $appid = WxpubConfig::APP_ID;
        $secret = WxpubConfig::APP_SECRET;

        return WxpubConfig::PUB_GETEWAY_URL . "token?grant_type=client_credential&appid={$appid}&secret={$secret}";
    }

    /**
     * 创建菜单的url
     * @param string $access_token
     * @return string
     * @author helei
     */
    public static function getCreateMenuUrl($access_token)
    {
        return WxpubConfig::PUB_GETEWAY_URL . "menu/create?access_token={$access_token}";
    }
}