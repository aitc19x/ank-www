<?php

$url = htmlspecialchars($_SERVER['PATH_INFO']);
$url = substr($url, 1);
$url = explode("/", $url);

$abbr = array(
    "" => "/",
    "qq" => "https://wpa.qq.com/msgrd?v=3&uin=2401361847",
    "2019nyuubugrp" => "https://shang.qq.com/wpa/qunwpa?idkey=b7047ff3406d0c47f327c0abbb3e8196a51eab3b59ce8d5643fe22ac78fdf378",
    "twitter" => "https://twitter.com/ank19x"
);

http_response_code(302);
header("Location: " . $abbr[$url[0]]);