<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/25
 * Time: 14:20
 */

namespace BaiduMap\Path;

class Rectify
{

    protected $ak;

    private $track_url = "http://api.map.baidu.com/rectify/v1/track";

    public function __construct($ak) {
        $this->ak = $ak;
    }

    public function Rectify(Array $ponits) {
        $baidu_resp = curl_post($this->track_url, [
            'ak'                =>  $this->ak,
            'rectify_option'    =>  "need_mapmatch:1|transport_mode:driving|denoise_grade:1|vacuate_grade:1",
            'monitored_person'  =>  json_encode($ponits)
        ]);
        return callbackResponse($baidu_resp);
    }

}