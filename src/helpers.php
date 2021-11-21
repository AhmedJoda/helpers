<?php


if (!function_exists('check_file_exist')) {
    function check_file_exist($url)
    {
        $handle = @fopen($url, 'r');
        if (!$handle) {
            return false;
        } else {
            return true;
        }
    }
}

if (!function_exists('get_url')) {
    function get_url($path)
    {
        if (check_file_exist(url("/storage/app/$path")))
            return "/storage/app/$path";
        else
            return "/upload/$path";
    }
}

if (!function_exists('add_query_string')) {
    function add_query_string($key, $value)
    {
        return request()->getPathInfo() . (request()->getQueryString() ? ('?' .  http_build_query(request()->except($key)) . "&$key=" . $value) : ("?$key=" . $value));
    }
}
