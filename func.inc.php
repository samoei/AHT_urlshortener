<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'db.inc.php';

function is_shortened($url) {
    return (preg_match("/samphiltech\.com/i", $url)) ? true : false;
}

function shorten() {
    $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    return substr(str_shuffle($charset), 0, 6);
}

function code_exists($code) {
    $code = mysql_real_escape_string($code);
    $code_exist = mysql_query("SELECT COUNT(`id`) FROM `aht13_urlshortener` WHERE `code`='$code'LIMIT 1");
    return (mysql_result($code_exist, 0) == 1) ? true : false;
}

function url_exists($url) {
    $code = mysql_real_escape_string($url);
    $url_exist = mysql_query("SELECT COUNT(`id`) FROM `aht13_urlshortener` WHERE `url`='$url'LIMIT 1");
    return (mysql_result($url_exist, 0) == 1) ? true : false;
}

function generate($url, $code) {
    $url = mysql_real_escape_string($url);
    $code = mysql_real_escape_string($code);

    $query = "INSERT INTO `aht13_urlshortener` VALUES('','$url','$code')";
    mysql_query($query);

    return $code;
}

function resolve_code($code) {
    $code = mysql_real_escape_string($code);
    if (code_exists($code)) {
        $url_query = mysql_query("SELECT `url` FROM `aht13_urlshortener` WHERE `code`='$code'");
        $link = mysql_result($url_query, 0, 'url');
        header('Location: ' . $link);
    }
}

function get_code($url) {
    $url = mysql_real_escape_string($url);

    $url_query = mysql_query("SELECT `code` FROM `aht13_urlshortener` WHERE `url`='$url'");
    $code = mysql_result($url_query, 0, 'code');
    return $code;
}
