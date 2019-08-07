<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/config/db.php");

function insert_msg(string $msg) {
    global $sql_host, $sql_username, $sql_password;
    $conn = new mysqli($sql_host, $sql_username, $sql_password);
    $timestamp = time();
    $sql = "INSERT INTO ank.livechat (t, msg) VALUES (" . $timestamp . ", '" . $msg . "')";
    $ret = $conn->query($sql);
    $conn->close();
    return $ret;
}

function gc_msg() {
    global $sql_host, $sql_username, $sql_password;
    $conn = new mysqli($sql_host, $sql_username, $sql_password);
    $sql_get_last = "SELECT * FROM ank.livechat ORDER BY t DESC LIMIT 19, 20";
    $bottom = $conn->query($sql_get_last)->fetch_assoc()["t"];
    $sql_del = "DELETE FROM ank.livechat WHERE t < " . $bottom;
    $ret = $conn->query($sql_del);
    $conn->close();
    return $ret;
}

function get_msg(int $last_time) {
    gc_msg();
    global $sql_host, $sql_username, $sql_password;
    $conn = new mysqli($sql_host, $sql_username, $sql_password);
    $sql = "SELECT * FROM ank.livechat";
    $res = $conn->query($sql);
    $conn->close();
    $ret = array();
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            if ($row["t"] >= $last_time) {
                array_push($ret, $row["msg"]);
            }
        }
    }
    return $ret;
}