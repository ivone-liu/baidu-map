<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/7
 * Time: 8:53
 */

namespace BaiduMap\Eagle;

/**
 * Desc: 轨迹查询
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/trackprocess
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:55
 * Trait Track
 * Class Track
 * @package BaiduMap\Eagle
 */
class Track
{

    private $get_track_url = "http://yingyan.baidu.com/api/v3/track/gettrack";

    public function GetTrack($ak, $service, $entity_name, $start_time, $end_time, $is_processed = 1) {
        $baidu_resp = curl_get($this->get_track_url, [
            'ak'                =>  $this->ak,
            'service_id'        =>  $this->service_id,
            'entity_name'       =>  $entity_name,
            'start_time'        =>  $start_time,
            'end_time'          =>  $end_time,
            'is_processed'      =>  $is_processed
        ]);
        return callbackResponse($baidu_resp);
    }


}