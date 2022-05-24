<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/24
 * Time: 10:02
 */

namespace BaiduMap\Fence;

class BindFence
{

    protected $ak;
    protected $service_id;

    private $bind_url = "http://yingyan.baidu.com/api/v3/fence/addmonitoredperson";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function Bind($fence_id, $entity_name) {
        $baidu_resp = curl_post($this->bind_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'fence_id'          =>  $fence_id,
            'monitored_person'  =>  $entity_name
        ]);
        return callbackResponse($baidu_resp);
    }


}