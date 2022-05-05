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
     * @param array $fense_ids
     * @return mixed
     */
    public function DeleteFenses(Array $fense_ids) {
        $baidu_resp = curl_send($this->del_url, [
            'ak'             =>  $this->ak,
            'service_id'     =>  $this->service_id,
            'fence_ids'      =>  implode(",", $fense_ids)
        ]);
        return json_decode($baidu_resp, true);
    }

}