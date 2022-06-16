<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/6/6
 * Time: 14:20
 */

namespace BaiduMap\Coord;

class Transfer
{

    protected $ak;

    public function __construct($ak) {
        $this->ak = $ak;
        $this->coords_url = "https://api.map.baidu.com/geoconv/v1/";
    }

    public function BD2WGS84($bd09) {
        curl_get($this->coords_url, [
            'coords'    =>  implode(",", $bd09),
            'ak'        =>  $this->ak,
            'form'      =>  5,
            'to'        =>  1
        ]);
    }


}