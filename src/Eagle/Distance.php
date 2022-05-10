<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 10:39
 */

namespace BaiduMap\Eagle;

/**
 * Desc: 轨迹查询 - 获取轨迹里程
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/trackprocess
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:54
 * Trait Distance
 * Class Distance
 * @package BaiduMap\Eagle
 */
class Distance
{

    protected $ak;
    protected $service_id;

    private $get_distance_url = "http://yingyan.baidu.com/api/v3/track/getdistance";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function GetDistance($entity, $start_time, $end_time, $is_processed = 1) {
        $baidu_resp = curl_get($this->get_distance_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'entity_name'       =>  $entity,
            'is_processed'      =>  $is_processed
        ]);
        return callbackResponse($baidu_resp);
    }

}