<?php
class MySql implements iWorkData
{   
    protected $link;

    public function __construct()
    {
        if (!$this->link = mysql_connect(M_HOST, M_USER, M_PASS)) 
        {
            throw new Exception(NO_CONN . mysql_error());
        }

        if (!mysql_select_db(M_DB, $this->link))
        {
            throw new Exception(NO_DB . mysql_error());
        }
    }


    public function saveData($key, $val)
    {
        $sql = "INSERT INTO " .TABLE_M. "(`" .POLE1. "`, `" .POLE2. "`) 
                VALUES ('" .$key. "', '" .$val. "')";

        if (!$result = mysql_query($sql, $this->link))
            throw new Exception(NO_RES . mysql_error());
        
        return SUCCESS;
    }

    public function getData($key)
    {
        $sql = "SELECT `" .POLE1. "`, `" .POLE2. "` 
                FROM " .TABLE_M. " 
                WHERE `" .POLE1. "` = '" .$key. "'";

        if (!$result = mysql_query($sql, $this->link))
            throw new Exception(NO_RES . mysql_error());

        while ($row = mysql_fetch_assoc($result))
        {
            foreach ($row as $key => $val)
            {
                $data[][$key] = $val;
            }
        }

        mysql_free_result($result);
        return $data;
    }

    public function deleteData($key)
    {
        $sql = "DELETE FROM " .TABLE_M. " WHERE `" .POLE1. "` = '" .$key. "'";

        if (!$result = mysql_query($sql, $this->link))
            throw new Exception(NO_RES . mysql_error());
        
        return SUCCESS;
    }
}
