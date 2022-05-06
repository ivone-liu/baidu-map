<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/6
 * Time: 10:13
 */

namespace BaiduMap\Eagle;

class ExportTrack
{

    protected $ak;
    protected $service_id;

    private $create_job_url = "http://yingyan.baidu.com/api/v3/export/createjob";
    private $get_job_url = "http://yingyan.baidu.com/api/v3/export/getjob";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    public function CreateExportJob($start_time, $end_time, $coord_type_output = "wgs84") {
        $baidu_resp = curl_post($this->create_job_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time
        ]);
        return callbackResponse($baidu_resp);
    }

    public function GetExportJob($job_id) {
        $baidu_resp = curl_post($this->get_job_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id
        ]);
        return callbackResponse($baidu_resp);
        if ($resp['total'] < 1) {
            return;
        }
        $file = '';
        foreach ($resp['jobs'] as $job) {
            if ($job['job_id'] == $job_id && $job['job_status'] == 'done') {
                $file = $job['file_url'];
                break;
            }
        }
        return $file;
    }

    protected function HandleJob($url) {
        $local_file = download($url);
    }

}