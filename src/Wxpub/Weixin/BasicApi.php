<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 12:55
 * @description: 主要解决weiixn接入，及获取基础信息
 */

namespace Wxpub\Weixin;


use Wxpub\Utils\Curl;
use Wxpub\Utils\DataParser;
use Wxpub\WxpubConfig;
use Wxpub\WxpubUrl;

class BasicApi
{

    /**
     * 进行签名的验证
     *
     * @note 调用该方法的控制器，在收到返回值为true时，需要echo 出 echostr 值。
     *   否则微信无法判断是否成功
     *
     * @param string $signature
     * @param string $timestamp
     * @param string $nonce
     * @return bool
     * @author helei
     */
    public function checkSignature($signature, $timestamp, $nonce)
    {
        $token = WxpubConfig::TOKEN;

        $data = array($token, $timestamp, $nonce);
        $sign = signBySha1($data);

        if ($sign == $signature) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取accesstoken
     *
     * @note 微信当前默认，该token 7200s 后过期。因此建议获取后进行缓存。达到上限后，调用该接口进行刷新即可
     *
     * @return array
     * @author helei
     */
    public function getAccessToken()
    {
        $url = WxpubUrl::getAccessTokenUrl();

        $curl = new Curl();
        $ret = $curl->get($url);

        return json_decode($ret['body'], true);
    }
}