<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/9
 * Time: 15:55
 */

namespace BaiduMap\Fence;

/**
 * Desc: 地理围栏报警
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/geofencealarm
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:56
 * Trait AddMonitor
 * Class AddMonitor
 * @package BaiduMap\Fence
 */
class Warning {

    protected $ak;
    protected $service_id;

    private $query_status_url = "http://yingyan.baidu.com/api/v3/fence/querystatus";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function QueryStatus($fence_ids, $entity) {
        $baidu_resp = curl_get($this->query_status_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'fence_ids'         =>  $fence_ids,
            'monitored_person'  =>  $entity
        ]);
        return callbackResponse($baidu_resp);
    }


}

