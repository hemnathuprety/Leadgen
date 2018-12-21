<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('assets_uri')) {
    function assets_uri($uri = "", $theme = "default")
    {
        $CI =& get_instance();

        return $CI->config->base_url("themes/{$theme}/" . $uri);

    }
}

if (!function_exists('admin_url')) {

    function admin_url($uri = '', $protocol = NULL)
    {
        return get_instance()->config->site_url("admin/" . $uri, $protocol);
    }
}

if (!function_exists('base_url')) {

    function base_url($uri = '', $protocol = NULL)
    {
        return get_instance()->config->site_url($uri, $protocol);
    }

}
if (!function_exists('images_uri')) {
    function images_uri($uri = "")
    {
        $CI =& get_instance();

        return $CI->config->base_url("uploads/" . $uri);

    }

}