<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/27
 * Time: 10:43
 */

namespace BaiduMap\Tools;

trait ValidParams
{

    public function configCheck() {
        if (empty($this->ak) || empty($this->service)) {
            return "配置错误,请传入必要参数!";
        }
    }

}