<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 12:48
 * @description: 用于保存weiixn返回的状态码
 */

namespace Wxpub;


class WxpubCode
{
    // 请求成功
    const SUCC = 0;

    // 系统繁忙
    const SYSTEM_ERROR = -1;

    // 获取access_token时AppSecret错误，或者access_token无效
    const APP_SECRET_ERROR = 40001;

    // 不合法的凭证类型
    const TOKEN_ERROR = 40002;

    // 不合法的openid
    const OPEN_ID_ERROR = 40003;
    
    /**
     * 尚有多种状态码，未接入。后续需要，陆续补入
     */
}