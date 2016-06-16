<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 12:33
 * @description:
 */

namespace Wxpub;


class WxpubConfig
{
    /**
     * 微信公众号的网关
     * https://api.weixin.qq.com/cgi-bin/
     */
    const PUB_GETEWAY_URL = 'https://api.weixin.qq.com/cgi-bin/';

    /**
     * 微信公众号登陆账号
     */
    const LOGIN_ACCOUNT = '1827528197@qq.com';

    /**
     * 开发者ID
     */
    const APP_ID = 'wx816a1bc3b853698c';

    /**
     * 应用密钥
     */
    const APP_SECRET = '7fefb3db82141a4ed20547e01f32b126';

    /**
     * 用于微信接入的token
     */
    const TOKEN = '';

    /**
     * 用于消息加密的秘钥
     */
    const ENCODING_AES_KEY = '';
}