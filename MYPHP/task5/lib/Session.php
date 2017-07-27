<?php
class Session implements iWorkData
{
    public function saveData($key, $val)
    {
        session_start();
        $_SESSION[$key] = $val;
    }

    public function getData($key)
    {
        return $_SESSION[$key];
    }
    
    public function deleteData($key)
    {
        session_start();
        unset($_SESSION[$key]);
    }
}
