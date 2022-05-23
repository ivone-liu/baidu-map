<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/23
 * Time: 9:42
 */

namespace BaiduMap\Fence;

class DelFence
{

    protected $ak;
    protected $service_id;

    private $add_monitor_url = "http://yingyan.baidu.com/api/v3/fence/delete";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function DelFence($fence_id) {
        $baidu_resp = curl_post($this->add_monitor_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'fence_ids'         =>  $fence_id
        ]);
        return callbackResponse($baidu_resp);
    }


}