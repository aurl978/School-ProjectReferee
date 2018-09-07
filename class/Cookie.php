<?php

class Cookie
{

    public function setCookie($name, $value, $duration_in_day, $path, $domain = null)
    {
        if (isset($domain) AND !empty($domain)) {
            setcookie($name, $value, time() + (86400 * $duration_in_day), $path, $domain);
        } else {
            setcookie($name, $value, time() + (86400 * $duration_in_day), $path);
        }
    }

    public function getCookie($name)
    {
        $cookie = $_COOKIE[$name];
        return $cookie;
    }

    public function deleteCookie($name)
    {
        setcookie($name, '', time() - 3600, '/');

    }

}