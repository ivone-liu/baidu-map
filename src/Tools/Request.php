<?php

function curl_send(Array $package) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->req_single_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $package);
    $package = curl_exec($ch);
    curl_close($ch);
    return $package;
}