<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 11:22
 */

namespace BaiduMap\Fence;

/**
 * Desc: 地理围栏管理 - 更新围栏
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/geofence
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:56
 * Trait AddMonitor
 * Class AddMonitor
 * @package BaiduMap\Fence
 */
class FenceUpdate
{
    protected $ak;
    protected $service_id;

    private $polygon_fence_url = "http://yingyan.baidu.com/api/v3/fence/updatepolygonfence";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    /**
     * Desc: 更细你多边形围栏
     * Author: Ivone <i@ivone.me>
     * Date: 2022/5/5
     * Time: 11:26
     * @param $fence_id
     * @param $fence_name
     * @param $vertexes
     * @param $coord_type
     * @return bool|string
     */
    public function UpdatePolygen($fence_id, $fence_name, $vertexes, $coord_type = 'wgs84') {
        $baidu_resp = curl_post($this->polygon_fence_url, [
            'ak'            =>  $this->ak,
            'service_id'    =>  $this->service_id,
            'fence_id'      =>  $fence_id,
            'fence_name'    =>  $fence_name,
            'vertexes'      =>  $vertexes,
            'coord_type'    =>  $coord_type
        ]);
        return callbackResponse($baidu_resp);
    }

}