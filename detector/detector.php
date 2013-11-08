<?php
  /*
  @author: shuwen/songzan
  @desc:   该脚本在iPad、iPhone、iPad(retina)、iPad(retina)、Android设备做过测试，除Android tablet以外，
           测试结果均符合预期，Android tablet返回的是is phone，原因是：Android tablet的ua没有可匹配的规则。
           Docs - http://work.tmall.net/projects/tmall-anywhere/wiki/Check-ua
  */

    $ua = $_SERVER['HTTP_USER_AGENT'];
    $is_tablet = (bool)preg_match('#\b(ipad|tablet|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $ua );
    $is_phone = (bool)preg_match('#\b(ip(hone|od)|android|opera m(ob|in)i|windows (phone|ce)|blackberry'.'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $ua );
    $device = "";
    $is_pc = null;

    if($is_tablet || url("pad") ){
        $device = "tablet";
        $is_phone = false;
        $is_tablet = true;
        $is_pc = false;
    }else if($is_phone){
        $device = "phone";
        $is_phone = true;
        $is_tablet = false;
        $is_pc = false;
    }else{
        $device = "pc";
        $is_phone = false;
        $is_tablet = false;
        $is_pc = true;
    }

    function url($type) {//基于URL约定的终端判断;
        $ttid = $_GET["@ttid"];
        $is = strpos($ttid,$type);
        if($is !== false && $is >= 0) {
            return true;
        } else {
            return false;
        }
    }
?>