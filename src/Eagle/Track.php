<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/7
 * Time: 8:53
 */

namespace BaiduMap\Eagle;

class Track
{

    protected $ak;
    protected $service_id;

    private $get_track_url = "http://yingyan.baidu.com/api/v3/track/gettrack";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function GetTrack($entity_name, $start_time, $end_time, $is_processed = 1) {
        $baidu_resp = curl_get($this->get_track_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'entity_name'       =>  $entity_name,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'is_processed'      =>  $is_processed
        ]);
        return callbackResponse($baidu_resp);
    }


}