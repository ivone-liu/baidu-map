<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/4/27
 * Time: 15:06
 */

namespace BaiduMap\Eagle;

use GuzzleHttp\Client;

/**
 * Desc: 轨迹上传
 *       https://lbsyun.baidu.com/index.php?title=yingyan/api/v3/trackupload
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/10
 * Time: 16:55
 * Trait TrackUpload
 * Class TrackUpload
 * @package BaiduMap\Eagle
 */
class TrackUpload
{
    private $req_single_url = "http://yingyan.baidu.com/api/v3/track/addpoint";
    private $req_mutil_url = "http://yingyan.baidu.com/api/v3/track/addpoints";


    /**
     * Desc: 加点
     * Author: Ivone <i@ivone.me>
     * Date: 2022/4/27
     * Time: 15:14
     * @param array $point, 经纬度 [longitude, latitude]
     */
    public function addpoint($ak, $service, $entity, Array $point, $time, $coord = 'wgs84') {
        $package = [
            'ak'                =>  $ak,
            'service_id'        =>  $service,
            'entity_name'       =>  $entity,
            'latitude'          =>  $point[1],
            'longitude'         =>  $point[0],
            'loc_time'          =>  $time,
            'coord_type_input'  =>  $coord
        ];
        $baidu_resp = curl_post($this->req_single_url, $package);
        return callbackResponse($baidu_resp);
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




}