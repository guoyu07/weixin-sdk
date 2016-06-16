<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 19:34
 * @description: 网页获取用户基本信息
 */

namespace Wxpub\Weixin\Oauth;


use Wxpub\Contracts\WeixinApiInterface;
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
}