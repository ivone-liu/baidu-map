<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 11:22
 */

namespace BaiduMap\Fence;

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
    public function UpdatePolygen($fence_id, $fence_name, $vertexes, $coord_type) {
        $baidu_resp = curl_send($this->polygon_fence_url, [
            'ak'            =>  $this->ak,
            'service_id'    =>  $this->service_id,
            'fence_id'      =>  $fence_id,
            'fence_name'    =>  $fence_name,
            'vertexes'      =>  $vertexes,
            'coord_type'    =>  $coord_type
        ]);
        return $baidu_resp;
    }

}