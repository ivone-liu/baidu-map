<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 15:02
 */

namespace BaiduMap\Fence;

class DelMonitor
{

    protected $ak;
    protected $service_id;

    private $del_monitor_url = "http://yingyan.baidu.com/api/v3/fence/deletemonitoredperson";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function DelMonitor($fence_id, Array $entity) {
        $baidu_resp = curl_post($this->del_monitor_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'fence_id'          =>  $fence_id,
            'monitored_person'  =>  implode(',', $entity)
        ]);
        return json_decode($baidu_resp, true);
    }


}