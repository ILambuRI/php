<?php
class PostGresql implements iWorkData
{   
    protected $link;

    public function __construct()
    {
        $conn_string = "host=" .P_HOST. " port=" .P_PORT. " dbname=" .P_DB. " user=" .P_USER. " password=" .P_PASS;

        if (!$this->link = pg_connect($conn_string))
            throw new Exception(NO_CONN_PG);
    }


    public function saveData($key, $val)
    {
        $sql = "INSERT INTO " .TABLE_P. "(\"" .POLE1. "\", \"" .POLE2. "\") 
                VALUES ('" .$key. "', '" .$val. "')";

        if (!$result = pg_query($this->link, "$sql"))
            throw new Exception(NO_RES_PG);
        
        return SUCCESS;
    }

    public function getData($key)
    {
        $sql = "SELECT " .TABLE_P. ".\"" .POLE1. "\", " .TABLE_P. ".\"" .POLE2. "\" 
                FROM " .TABLE_P. " 
                WHERE \"" .POLE2. "\" = '" .$key. "'";

        if (!$result = pg_query($this->link, "$sql"))
            throw new Exception(NO_RES_PG);

        while ($row = pg_fetch_assoc($result))
        {
            foreach ($row as $key => $val)
            {
                $data[][$key] = $val;
            }
        }

        pg_free_result($result);
        return $data;
    }

    public function deleteData($key)
    {
        $sql = "DELETE FROM " .TABLE_P. " WHERE \"" .POLE2. "\" = '" .$key. "'";

        if (!$result = pg_query($this->link, "$sql"))
            throw new Exception(NO_RES_PG);
        
        return SUCCESS;
    }
}
