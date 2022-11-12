<?php

namespace classes\Utils;

class Device {

    public function getDeviceType() {
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if(stripos($useragent, 'mobile') !== FALSE){
            return $mobile = 1;
        }
        else {
            return $mobile = 0;
        }
    }
}