<?php
class Postgresql extends Sql
{
    use tClean;

    public function __construct()
    {
        //$conn_string = "host=localhost port=5432 dbname=user1 user=user1 password=user1z";
        $conn_string = "host=" .P_HOST. " port=5432 dbname=" .P_DB. " user=" .P_USER. " password=" .P_PASS;
        if(!$this->link = pg_connect($conn_string))
        {
            throw new Exception(NO_CONN_PG);
        }
        
    }

    function execute()
    {
        parent::execute();
        $sql    = $this->getQuery();
        if (!$result = mysql_query($sql, $this->link))
        {
            throw new Exception(NO_RES . mysql_error());
        }

        $data = [];
        if (is_resource($result))
        {
            while ($row = mysql_fetch_assoc($result))
            {
                foreach ($row as $key => $val)
                {
                    $data[][$key] = $val;
                }
            }
            mysql_free_result($result);
        }
        else
        {
            $data = $result;
        }
        $this->cleanProperties();
        return $data;
    }
}
