<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'func.inc.php';

if (isset($_POST['url'])) {
    $url = trim($_POST['url']);

    if (empty($url)) {
        echo "error_no_url";
    } elseif (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo "error_invalid_url";
    } elseif (is_shortened($url)) {
        echo "error_shortened_url";
    } else {


        while (!code_exists($code = shorten())) {
            if(!url_exists($url)){
            echo "http://wwww.samphiltech.com/" . generate($url, $code);
            }  else {
                echo "http://wwww.samphiltech.com/" . get_code($url);
            }
            break 1;
        }
    }
}


