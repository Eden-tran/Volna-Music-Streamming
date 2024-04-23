<?php

function thongbao($txt)
{
    return $thongbao =  '<div class="alert alert-danger">' . $txt . '</div>';
}
function error()
{
    if ($_GET['type'] == 'error') {
        $color = 'red';
    } else {
        $color = '#25a56a';
    }
    if ($_GET['msg']) {
        $error = "<div class=' sign__form sign__form--profile msg'
                style='background-color:  " . $color . " ;'>
                <h3>" . $_GET['msg'] . "</h3>
                </div>";
    }
    return $error;
}
function islogin()
{
    if (isset($_SESSION['status_login']) && $_SESSION['status_login']) {
        return true;
    }
    return false;
}
function chuyentrang($url)
{
    header('location: ' . $url);
    exit;
}
function xemmang($array)
{
    echo '
<pre>', print_r($array), '</pre>';
}
function url($controller = 'home', $action = 'index', $extra = [])
{
    $str = '';
    if ($extra) {
        foreach ($extra as $key => $value) {
            $str .= '&' . $key . '=' . $value . '&';
        }
        $str = rtrim($str, '&');
    }
    return 'index.php?c=' . $controller . '&a=' . $action . $str;
}
function post($key = '')
{
    if ($key == '')
        return $_POST;
    else {
        if (isset($_POST[$key]) && $_POST[$key])
            return is_string($_POST[$key]) ? trim($_POST[$key]) : $_POST[$key];
        return '';
    }
}
function get($key = '')
{
    if ($key == '')
        return $_GET;
    else {
        if (isset($_GET[$key]) && $_GET[$key])
            return is_string($_GET[$key]) ? trim($_GET[$key]) : $_GET[$key];
        return '';
    }
}