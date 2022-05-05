<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 15:05
 */

namespace BaiduMap\Fence;

class Monitor
{

    protected $ak;
    protected $service_id;

    private $all_monitor_url = "http://yingyan.baidu.com/api/v3/fence/listmonitoredperson";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function GetMonitors($fence_id) {
        $baidu_resp = curl_get($this->all_monitor_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'fence_id'          =>  $fence_id
        ]);
        return json_decode($baidu_resp, true);
    }

}