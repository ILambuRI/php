<?php
class Session implements iWorkData
{
    public function saveData($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public function getData($key)
    {
        return $_SESSION[$key];
    }
    
    public function deleteData($key)
    {
        if ($_SESSION[$key])
        {
            unset($_SESSION[$key]);
            return SUCCESS;
        }
        return NO_CHANG;
    }
}
