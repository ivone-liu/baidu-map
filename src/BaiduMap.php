<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/27
 * Time: 10:24
 */

namespace BaiduMap;

use BaiduMap\Path\Rectify;

class BaiduMap
{

    protected $ak;
    protected $service;

    public function setConfig($ak, $service) {
        $this->ak = $ak;
        $this->service = $service;
    }

    protected function configCheck() {
        if (empty($this->ak) || empty($this->service)) {
            return "配置错误,请传入必要参数!";
        }
    }

    public function reactifyPath($points, Rectify $rectify) {
        $this->configCheck();
        $rectify->Rectify($points);
    }


}