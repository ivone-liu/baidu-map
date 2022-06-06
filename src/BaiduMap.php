<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/27
 * Time: 10:24
 */

namespace BaiduMap;

use BaiduMap\Eagle\Track;
use BaiduMap\Eagle\TrackUpload;
use BaiduMap\Path\Rectify;
use BaiduMap\Tools\ValidParams;

class BaiduMap
{

    use ValidParams;

    protected $ak;
    protected $service;

    protected $rectify;
    protected $getTrack;
    protected $uploadSingleTrack;

    public function __construct() {
        $this->rectify = new Rectify();
        $this->getTrack = new Track();
        $this->uploadSingleTrack = new TrackUpload();
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
        $this->rectify->Rectify($this->ak, $points);
    }

    public function getBaiduPath($entity_name, $start_time, $end_time) {
        $this->configCheck();
        $this->getTrack->GetTrack($this->ak, $this->service, $entity_name, $start_time, $end_time);
    }

    public function uploadSingleTrack($point, $time) {
        $this->configCheck();
        $this->uploadSingleTrack->addpoint($this->ak, $this->service, $entity_name, $start_time, $end_time);
    }

}