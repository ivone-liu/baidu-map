<?php

/**
 * Desc: 解压zip文件
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/9
 * Time: 15:00
 * @param $zip_file zip文件路径
 * @param $extract_path 解压路径
 * @return int|boolean
 */
function unzip($zip_file, $extract_path = './storage/baidu-map/extract/') {
    if (!is_dir($extract_path)) {
        mkdir($extract_path, 0777, true);
    }
    $zip = new ZipArchive();
    if($zip->open($zip_file) === true) {
        $zip->extractTo($extract_path);
        $zip->close();
        return 1;
    } else {
        return 0;
    }
}

/**
 * Desc: 读取文件
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/9
 * Time: 15:14
 * @param $extract_path
 * @return array
 */
function getDirFiles($extract_path = './storage/baidu-map/extract/') {
    if (!is_dir($extract_path)) {
        mkdir($extract_path, 0777, true);
    }
    $files = [];
    $handler = opendir($extract_path);
    while (($filename = readdir($handler)) !== false) {
        if ($filename != "." && $filename != "..") {
            array_push($files, $filename);
        }
    }
    closedir($handler);
    return $files;
}

/**
 * Desc: 读取文件内容
 * Author: Ivone <i@ivone.me>
 * Date: 2022/5/9
 * Time: 15:16
 * @param $file
 * @param $file_path
 * @return false|string
 */
function fileRead($file, $file_path = './storage/baidu-map/extract/') {
    $result = [];
    $handle = @fopen($file_path . $file, "r");
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            array_push($result, $buffer);
        }
        fclose($handle);
    }
    return $result;
}