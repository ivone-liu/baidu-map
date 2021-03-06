<?php

// POST请求
function curl_post($url, Array $package) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $package);
    $package = curl_exec($ch);
    curl_close($ch);
    return $package;
}

// GET请求
function curl_get($url, Array $package) {
    $params = "";
    foreach ($package as $key=>$item) {
        $params .= $key . "=" . $item . "&";
    }
    $params = substr($params,0,strlen($params)-1);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_URL, $url . "?" . $params);
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
}

// 文件下载
function download($url, $path = './storage/baidu-map/') {
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $file_info = parse_url($url);
    $name = basename($file_info['path']);
    try {
        $file=file_get_contents($url);
        file_put_contents($path.$name, $file);
        return [1, $path.$name];
    } catch (\Exception $e) {
        return [0, $e->getMessage()];
    }

}