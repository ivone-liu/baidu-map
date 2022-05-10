<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 15:02
 */

namespace BaiduMap\Fence;

/**
 * Desc: 地理围栏管理 - 删除监控
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/geofence
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:56
 * Trait AddMonitor
 * Class AddMonitor
 * @package BaiduMap\Fence
 */
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
        return callbackResponse($baidu_resp);
    }


}