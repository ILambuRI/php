<?php
class Postgresql extends Sql
{
    use tClean;

    protected $link;

    public function __construct()
    {
        $conn_string = "host=" .P_HOST. " port=" .P_PORT. " dbname=" .P_DB. " user=" .P_USER. " password=" .P_PASS;

        if (!$this->link = pg_connect($conn_string))
            throw new Exception(NO_CONN_PG);
    }

    function execute()
    {
        if (!$result = pg_query($this->link, $this->query))
            throw new Exception(NO_RES_PG);
        
        if ($this->switch == 'distinct')
        {
            while ($row = pg_fetch_assoc($result))
            {
                foreach ($row as $val)
                {
                    $data[]= $val;
                }
            }
            pg_free_result($result);
        }
        elseif ($this->switch == 'select')
        {
            while ($row = pg_fetch_assoc($result))
            {
                foreach ($row as $key => $val)
                {
                    $data[][$key] = $val;
                }
            }
            pg_free_result($result);
        }
        else
        {
            $data = SUCCESS;
        }
        echo $this->query . '<br>';
        $this->query = '';
        return $data;
    }
}
