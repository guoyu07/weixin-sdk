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
        $redirectUri = urlencode(WxpubConfig::OAUTH_REDIREC_URL);

        $baseUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?';

        return $baseUrl . "appid={$appid}&redirect_uri={$redirectUri}&response_type=code&scope={$scope}&state={$state}#wechat_redirect";
    }

    /**
     * 通过code换取网页授权access_token 的url
     * @param string $code 授权后返回的code
     * @return string
     * @author helei
     */
    public static function getOauthAccessTokenUrl($code)
    {
        $appid = WxpubConfig::APP_ID;
        $secret = WxpubConfig::APP_SECRET;

        $baseUrl = 'https://api.weixin.qq.com/sns/oauth2/access_token?';

        return $baseUrl . "appid={$appid}&secret$secret={}&code={$code}&grant_type=authorization_code";
    }

    /**
     * 获取刷新access_token 的url
     * @param $refresh_token
     * @return string
     * @author helei
     */
    public static function getOauthRefreshTokenUrl($refresh_token)
    {
        $appid = WxpubConfig::APP_ID;

        $baseUrl = "https://api.weixin.qq.com/sns/oauth2/refresh_token?";

        return $baseUrl . "appid={$appid}&grant_type=refresh_token&refresh_token={$refresh_token}";
    }

    /**
     * 拉取用户信息(需scope为 snsapi_userinfo)
     * @param string $access_token 网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同
     * @param string $openid 用户的唯一标识
     * @return string
     * @author helei
     */
    public static function getOauthUserInfoUrl($access_token, $openid)
    {
        return "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
    }

    /**
     * 检验授权凭证（access_token）是否有效
     * @param $access_token
     * @param $openid
     * @return string
     * @author Fox
     */
    public static function getOauthCheckTokenUrl($access_token, $openid)
    {
        return "https://api.weixin.qq.com/sns/auth?access_token={$access_token}&openid={$openid}";
    }

    /**
     * 开发者可通过OpenID来获取用户基本信息
     *
     * @param $access_token
     * @param $openid
     * @return string
     * @author helei
     */
    public static function getSignUserInfoUrl($access_token, $openid)
    {
        return "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";
    }

    /**
     * 开发者可通过该接口来批量获取用户基本信息。最多支持一次拉取100条。
     * @param $access_token
     * @return string
     * @author helei
     */
    public static function getBatchUserInfoUrl($access_token)
    {
        return "https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token={$access_token}";
    }
}