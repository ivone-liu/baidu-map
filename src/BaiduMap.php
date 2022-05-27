<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/27
 * Time: 10:24
 */

namespace BaiduMap;

use BaiduMap\Path\Rectify;
use BaiduMap\Tools\ValidParams;

class BaiduMap
{

    use ValidParams;

    protected $ak;
    protected $service;

    protected $rectify;

    public function __construct() {
        $this->rectify = new Rectify();
        
    }

    public function setConfig($ak, $service) {
        $this->ak = $ak;
        $this->service = $service;
    }

    /**
     * Desc: 纠偏
     * Author: Ivone <i@ivone.me>
     * Date: 2022/5/27
     * Time: 10:44
     * @param $points
     */
    public function reactifyPath($points) {
        $this->configCheck();
        $this->rectify->Rectify($points);
    }


}