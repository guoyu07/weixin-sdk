<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 12:59
 * @description: 常用的一些函数
 */

/**
 * 对提供的数据进行urlsafe的base64编码。
 *
 * @param string $data 待编码的数据，一般为字符串
 *
 * @return string 编码后的字符串
 * @link http://developer.qiniu.com/docs/v6/api/overview/appendix.html#urlsafe-base64
 */
function base64UrlSafeEncode($data)
{
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($data));
}

/**
 * 对提供的urlsafe的base64编码的数据进行解码
 *
 * @param string $str 待解码的数据，一般为字符串
 *
 * @return string 解码后的字符串
 */
function base64UrlSafeDecode($str)
{
    $find = array('-', '_');
    $replace = array('+', '/');
    return base64_decode(str_replace($find, $replace, $str));
}

/**
 * 使用Sha1进行数据签名
 * @param array $data 待签名的数组
 * @param string $key 加入的key,可以为空
 * @return string
 * @author helei
 */
function signBySha1(array $data, $key = '')
{
    sort($data, SORT_STRING);
    $tmpStr = implode($data);
    return sha1($tmpStr);
}