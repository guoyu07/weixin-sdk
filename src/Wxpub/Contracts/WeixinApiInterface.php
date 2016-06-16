<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 13:37
 * @description:
 */

namespace Wxpub\Contracts;


abstract class WeixinApiInterface
{
    protected $access_token;

    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }
}