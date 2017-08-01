<?php
class Cookie implements iWorkData
{
    public function saveData($key, $val)
    {
        setcookie($key, $val);
        $_COOKIE[$key] = $val;
    }

    public function getData($key)
    {
        if ($_COOKIE[$key])
            return $_COOKIE[$key];
    }

    public function deleteData($key)
    {
        if ($_COOKIE[$key])
        {
            unset($_COOKIE[$key]);
            return SUCCESS;
        }
        return NO_CHANG;
    }
}
