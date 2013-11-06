<?php
  /*
  @author: shuwen/songzan
  @desc:   该脚本在iPad、iPhone、iPad(retina)、iPad(retina)、Android设备做过测试，除Android tablet以外，
           测试结果均符合预期，Android tablet返回的是is phone，原因是：Android tablet的ua没有可匹配的规则。
           Docs - http://work.tmall.net/projects/tmall-anywhere/wiki/Check-ua
  */

  $ua = $__SERVER['HTTP_USER_AGENT'];
  $is_tablet = (bool)preg_match('#\b(ipad|tablet|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $ua );
  $is_phone = (bool)preg_match('#\b(ip(hone|od)|android|opera m(ob|in)i|windows (phone|ce)|blackberry'.'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $ua );
  $device = "";
  $is_pc = null;

  if($is_tablet){
    $device = "tablet";
    $is_pc = false;
    $is_phone = false;
  }else if($is_phone){
    $device = "phone";
    $is_pc = false;
    $is_tablet = false;
  }else{
    $device = "pc";
    $is_phone = false;
    $is_tablet = false;
  }

  echo "<input type=\"hidden\" value=\"$device\" id=\"J_device\" data-ua=\"$ua\" style=\"display:none;\">";
?>
