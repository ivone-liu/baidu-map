<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/5
 * Time: 13:47
 */

namespace BaiduMap\Fence;

class Fence
{

    protected $ak;
    protected $service_id;

    private $fence_url = "http://yingyan.baidu.com/api/v3/fence/list";

    public function __construct($ak, $service_id) {
        $this->ak = $ak;
        $this->service_id = $service_id;
    }

    /**
     * Desc: 查询围栏
     * Author: Ivone <i@ivone.me>
     * Date: 2022/5/5
     * Time: 13:49
     * @param array $fence_ids
     * @return mixed
     */
    public function GetFences(Array $fence_ids) {
        $baidu_resp = curl_get($this->fence_url, [
            'ak'             =>  $this->ak,
            'service_id'     =>  $this->service_id,
            'fence_ids'      =>  implode(",", $fence_ids)
        ]);
        return callbackResponse($baidu_resp);
    }

}