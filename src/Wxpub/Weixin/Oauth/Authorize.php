<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 19:34
 * @description: 网页获取用户基本信息
 */

namespace Wxpub\Weixin\Oauth;


use Wxpub\Contracts\WeixinApiInterface;
use Wxpub\WxpubCode;
use Wxpub\WxpubUrl;

class Authorize extends WeixinApiInterface
{

    /**
     * @param string $scope
     *  - snsapi_base 静默授权
     *  - snsapi_userinfo 授权需要用户手动同意，
     * @param $state
     * @author helei
     */
    public function getCode($scope = 'snsapi_base', $state = 'STATE')
    {
        $url = WxpubUrl::getOauthUrl($this->access_token, $scope, $state);

        $this->curl->get($url);
    }

    /**
     * 根据code获取网页授权的 access_token
     * @param string $code
     * @return array
     * @author helei
     */
    public function getOauthAccessToken($code)
    {
        $url = WxpubUrl::getOauthAccessTokenUrl($code);

        $ret = $this->curl->get($url);

        $retArr = json_decode($ret['body'], true);

        return $retArr;
    }

    /**
     * 刷新access_token  。当然这个接口也可以不需要调用，当出现状况时，直接重新获取。
     * 不过重新获取步骤繁琐，建议使用该接口
     * @param string $refresh_token
     * @note refresh_token拥有较长的有效期（7天、30天、60天、90天）
     * @return array
     *
     * @author helei
     */
    public function refreshAccessToken($refresh_token)
    {
        $url = WxpubUrl::getOauthRefreshTokenUrl($refresh_token);

        $ret = $this->curl->get($url);

        $retArr = json_decode($ret['body'], true);

        return $retArr;
    }

    /**
     * 拉取用户信息(需scope为 snsapi_userinfo)
     * @param string $access_token 网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同
     * @param string $openid 用户的唯一标识
     * @return array
     * @author helei
     */
    public function getUserInfo($access_token, $openid)
    {
        $url = WxpubUrl::getOauthUserInfoUrl($access_token, $openid);

        $ret = $this->curl->get($url);

        $retArr = json_decode($ret['body'], true);

        return $retArr;
    }

    /**
     * 检查用户的授权凭证是否还有效
     * @param string $access_token 网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同
     * @param string $openid 用户的唯一标识
     * @return bool
     * @author helei
     */
    public function checkAccessTokenExpire($access_token, $openid)
    {
        $url = WxpubUrl::getOauthCheckTokenUrl($access_token, $openid);

        $ret = $this->curl->get($url);

        $retArr = json_decode($ret['body'], true);

        if ($retArr['errcode'] == WxpubCode::SUCC) {
            return true;
        }

        return false;
    }
}