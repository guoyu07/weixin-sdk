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

    /**
     * 获取查询订单url
     * @param $access_token
     * @return string
     * @author helei
     */
    public static function getQueryMenuUrl($access_token)
    {
        return WxpubConfig::PUB_GETEWAY_URL . "menu/get?access_token={$access_token}";
    }

    /**
     * 菜单删除url
     * @param $access_token
     * @return string
     * @author helei
     */
    public static function getDelMenuUrl($access_token)
    {
        return WxpubConfig::PUB_GETEWAY_URL . "menu/delete?access_token={$access_token}";
    }

    /**
     * 获取自定义菜单配置的url
     * @param $access_token
     * @return string
     * @author helei
     */
    public static function getCurrentSelfMenuInfoUrl($access_token)
    {
        return WxpubConfig::PUB_GETEWAY_URL . "get_current_selfmenu_info?access_token={$access_token}";
    }

    /**
     * 获取授权的url
     * @param $access_token
     * @param $scope
     * @param string $state 重定向后会带上state参数，开发者可以填写a-zA-Z0-9的参数值，最多128字节
     * @return string
     * @author helei
     */
    public static function getOauthUrl($access_token, $scope, $state)
    {
        $appid = WxpubConfig::APP_ID;
        $redirectUri = WxpubConfig::OAUTH_REDIREC_URL;

        $baseUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?';

        return $baseUrl . "appid={$appid}&redirect_uri={$redirectUri}&response_type=code&scope={$scope}&state={$state}#wechat_redirect";
    }
}