<?php
/**
 * @author: helei
 * @createTime: 2016-06-16 13:30
 * @description: 微信的菜单类型 当前共有10种
 */

namespace Wxpub\Weixin\Menu;


use Wxpub\Contracts\DataStruct;

class MenuType extends DataStruct
{
    // 点击推事件
    const CLICK = 'click';

    // 跳转URL
    const VIEW = 'view';

    // 扫码推事件
    const SCAN_CODE_PUSH = 'scancode_push';

    // 扫码推事件且弹出“消息接收中”提示框
    const SCAN_CODE_WAIT_MSG = 'scancode_waitmsg';

    // 弹出系统拍照发图
    const PIC_SYS_PHOTO = 'pic_sysphoto';

    // 弹出拍照或者相册发图
    const PIC_PHOTO_OR_ALBUM = 'pic_photo_or_album';

    // 弹出微信相册发图器
    const PIC_WEIXIN = 'pic_weixin';

    // 弹出地理位置选择器
    const LOCATION_SELECT = 'location_select';

    // 下发消息（除文本消息）
    const MEDIA_ID = 'media_id';

    // 跳转图文消息URL
    const VIEW_LIMITED = 'view_limited';
}