<?php
class Cookie implements iWorkData
{
    public function saveData($key, $val)
    {
        setcookie($key, $val);
    }

    public function getData($key)
    {
        return $_COOKIE[$key];
    }

    public function deleteData($key)
    {
        setcookie($key, '', time()-1);
        unset($_COOKIE[$key]);
    }
}
