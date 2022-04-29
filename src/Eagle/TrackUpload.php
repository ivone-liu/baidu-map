<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/4/27
 * Time: 15:06
 */

namespace BaiduMap\Eagle;


use GuzzleHttp\Client;

class TrackUpload
{

    protected $ak;
    protected $service_id;
    protected $entity;

    private $req_url = "http://yingyan.baidu.com/api/v3/track/addpoints";

    public function __construct($ak, $service_id, $entity) {
        $this->ak = $ak;
        $this->service_id = $service_id;
        $this->entity = $entity;
    }

    /**
     * Desc: 加点
     * Author: Ivone <i@ivone.me>
     * Date: 2022/4/27
     * Time: 15:14
     * @param array $point, 经纬度 [longitude, latitude]
     */
    public function addpoint(Array $point, $time, $coord = 'wgs84') {
        $package = [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'entity_name'       =>  $this->entity,
            'latitude'          =>  $point[1],
            'longitude'         =>  $point[0],
            'loc_time'          =>  $time,
            'coord_type_input'  =>  $coord
        ];
        return $this->send($package);
    }

    /**
     * Desc: 批量增加
     * Author: Ivone <i@ivone.me>
     * Date: 2022/4/27
     * Time: 15:23
     * @param array $data
     */
    public function addpoint_batch(Array $data) {

    }

    /**
     * Desc: 暂不需要额外封装
     * Author: Ivone <i@ivone.me>
     * Date: 2022/4/27
     * Time: 15:18
     * @param $
     */
    protected function buildPackage(&$package) {}


    protected function send(Array $package) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->req_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $package);
        $package = curl_exec($ch);
        curl_close($ch);
        return $package;
    }

}