<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/6
 * Time: 10:13
 */

namespace BaiduMap\Eagle;

/**
 * Desc: 批量导出轨迹
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/trackexport
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:54
 * Trait ExportTrack
 * Class ExportTrack
 * @package BaiduMap\Eagle
 */
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
            'end_time'          =>  $end_time,
            'coord_type_output' =>  $coord_type_output
        ]);
        return callbackResponse($baidu_resp);
    }

    public function GetExportJob($job_id) {
        $baidu_resp = curl_get($this->get_job_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id
        ]);
        $resp = callbackResponse($baidu_resp);
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

    public function HandleJob($url) {
        $preg = "/\S+\/(\S+)\.zip.*/";
        preg_match($preg, $url, $file_name);
        $zip_file = $file_name[1] . ".zip";
        $json_file = $file_name[1] . ".json";
        if (!file_exists('./storage/baidu-map/'.$zip_file)) {
            $download = download($url);
            if ($download[0] == 0) {
                return $download[1];
            }
        }
        if (!file_exists('./storage/baidu-map/'.$json_file)) {
            unzip($zip_file);
        }
        $data = [
            'name'      =>  $json_file,
            'path'      =>  './storage/baidu-map/extract/',
            'detail'    =>  fileRead($json_file)
        ];

        return $data;
    }

}