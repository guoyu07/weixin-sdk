<?php
/**
 * @author: helei
 * @createTime: 2016-06-21 16:11
 * @description: 用户基本信息
 */

namespace Wxpub\Weixin\User;


use Wxpub\Utils\Curl;
use Wxpub\WxpubUrl;

class Info
{
    /**
     * 获取单个用户的信息
     * @param $access_token
     * @param $openid
     * @author helei
     */
    public function getSignUserInfo($access_token, $openid)
    {
        $url = WxpubUrl::getSignUserInfoUrl($access_token, $openid);

        $curl = new Curl();
        $ret = $curl->get($url);

        return json_decode($ret['body'], true);
    }

    /**
     * 批量获取用户基本信息 最多支持一次拉取100条。
     * @param $access_token
     * @param array $openIdArr  内容就是每一个用户的openid
     * @return array
     * @author helei
     */
    public function getBatchUserInfo($access_token, array $openIdArr)
    {
        // 处理数据
        if (count($openIdArr) > 100 || count($openIdArr) < 0) {
            return [
                'type'  => 'err',
                'msg'   => '传入的openid数量错误'
            ];
        }

        $reqTmpArr = [];
        foreach ($openIdArr as $openId) {
            $reqTmpArr[]['openid'] = $openId;
            $reqTmpArr[]['lang'] = 'zh-CN';
        }

        $reqArr['user_list'] = $reqTmpArr;

        $url = WxpubUrl::getBatchUserInfoUrl($access_token);
        $curl = new Curl();
        $ret = $curl->post($reqArr)->submit($url);

        return json_decode($ret['body'], true);
    }
}