<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/6
 * Time: 14:31
 */

namespace BaiduMap\Eagle;

class Analyze
{

    protected $ak;
    protected $service_id;

    private $create_job_url = "http://yingyan.baidu.com/api/v3/frequentroute/createjob";
    private $get_job_url = "http://yingyan.baidu.com/api/v3/frequentroute/getjob";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function CreateJob($entity_name, $start_time, $end_time, $time_range = '1440', $is_processed = 1, $coord_type_output = 'wgs84') {
        $baidu_resp = curl_get($this->create_job_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'entity_name'       =>  $entity_name,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'time_range'        =>  $time_range,
            'is_processed'      =>  $is_processed,
            'coord_type_output' =>  $coord_type_output
        ]);
        return callbackResponse($baidu_resp);
    }

    public function GetJob($entity_name, $start_time, $end_time, $time_range = '1440', $is_processed = 1, $coord_type_output = 'wgs84') {
        $baidu_resp = curl_get($this->get_job_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'entity_name'       =>  $entity_name,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'time_range'        =>  $time_range,
            'is_processed'      =>  $is_processed,
            'coord_type_output' =>  $coord_type_output
        ]);
        return callbackResponse($baidu_resp);
    }

}