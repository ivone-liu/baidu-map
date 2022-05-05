<?php

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

function curl_get($url, Array $package) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt_array($curl, $package);
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
}