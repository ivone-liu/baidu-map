<?php

namespace BaiduMap\Fence;

/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 10:49
 */
class FenceMake
{

    protected $ak;
    protected $service_id;

    private $circle_fence_url = "http://yingyan.baidu.com/api/v3/fence/createcirclefence";
    private $polygen_fence_url = "http://yingyan.baidu.com/api/v3/fence/createpolygonfence";
    private $line_fence_url = "http://yingyan.baidu.com/api/v3/fence/createpolylinefence";
    private $district_fence_url = "http://yingyan.baidu.com/api/v3/fence/createdistrictfence";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function CreateCircle() {}

    /**
     * Desc: 多边形围栏
     * Author: Ivone <i@ivone.me>
     * Date: 2022/5/5
     * Time: 11:19
     * @param $vertexes
     * @param $fence_name
     * @param $coord_type
     * @return bool|string
     */
    public function CreatePolygen($vertexes, $fence_name = '', $coord_type = 'wgs84') {
        $baidu_resp = curl_send($this->polygen_fence_url, [
            'ak'            =>  $this->ak,
            'service_id'    =>  $this->service_id,
            'fence_name'    =>  $fence_name,
            'vertexes'      =>  $vertexes,
            'coord_type'    =>  $coord_type
        ]);
        return $baidu_resp;
    }

}