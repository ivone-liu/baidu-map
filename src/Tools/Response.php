<?php
/**
 * Desc:
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/6
 * Time: 10:20
 */

function baiduResponse($response) {
    return $response;
}

function callbackResponse($baidu_response) {
    return json_decode($baidu_response, true);
}