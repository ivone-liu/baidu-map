<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 13:43
 */

namespace BaiduMap\Fence;

class FenceDelete
{

    protected $ak;
    protected $service_id;

    private $del_url = "http://yingyan.baidu.com/api/v3/fence/delete";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    /**
     * Desc: 删除围栏
     * Author: Ivone <i@ivone.me>
     * Date: 2022/5/5
     * Time: 13:46
     * @param array $fence_ids
     * @return mixed
     */
    public function DeleteFences(Array $fence_ids) {
        $baidu_resp = curl_post($this->del_url, [
            'ak'             =>  $this->ak,
            'service_id'     =>  $this->service_id,
            'fence_ids'      =>  implode(",", $fence_ids)
        ]);
        return json_decode($baidu_resp, true);
    }

}