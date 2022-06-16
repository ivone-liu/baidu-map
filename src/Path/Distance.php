<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/6/16
 * Time: 14:29
 */

namespace BaiduMap\Path;

class Distance
{

    protected $ak;
    protected $service;
    protected $entity;

    private $track_url = "http://yingyan.baidu.com/api/v3/track/getdistance";

    public function __construct($ak, $service, $entity) {
        $this->ak = $ak;
        $this->service = $service;
        $this->entity = $entity;
    }

    public function Distance($start_time, $end_time) {
        $baidu_resp = curl_get($this->track_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service,
            'entity_name'       =>  $this->entity,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'is_processed'      =>  1
        ]);
        return callbackResponse($baidu_resp);
    }


}