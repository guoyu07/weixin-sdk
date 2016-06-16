<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 13:37
 * @description:
 */

namespace Wxpub\Contracts;


use Wxpub\Utils\Curl;

abstract class WeixinApiInterface
{
    protected $access_token;

    protected $curl;

    public function __construct($access_token)
    {
        $this->access_token = $access_token;

        $this->curl = new Curl();
    }
}