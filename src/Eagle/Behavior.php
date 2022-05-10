<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:31
 */

namespace BaiduMap\Eagle;

/**
 * Desc: 经验行为分析
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/empiricalbehavior
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:53
 * Trait Behavior
 * Class Behavior
 * @package BaiduMap\Eagle
 */
class Behavior
{

    protected $ak;
    protected $service_id;

    private $create_job_url = "http://yingyan.baidu.com/api/v3/frequentroute/createjob";
    private $get_job_url = "http://yingyan.baidu.com/api/v3/frequentroute/getjob";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function CreateBehaviorJob($entity, $start_time, $end_time, $time_range = 10, $is_processed = 1) {
        $baidu_resp = curl_get($this->get_distance_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'entity_name'       =>  $entity,
            'is_processed'      =>  $is_processed,
            'time_range'        =>  $time_range
        ]);
        return callbackResponse($baidu_resp);
    }

    public function GetBehaviorJob($entity, $start_time, $end_time, $time_range = 10, $is_processed = 1) {
        $baidu_resp = curl_get($this->get_distance_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'entity_name'       =>  $entity,
            'is_processed'      =>  $is_processed,
            'time_range'        =>  $time_range
        ]);
        return callbackResponse($baidu_resp);
    }

}