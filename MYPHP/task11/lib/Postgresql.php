<?php
class Postgresql extends Sql
{
    use tFetch;

    protected $link;
    protected $db;

    public function __construct()
    {
        $conn_string = "host=" .P_HOST. " port=" .P_PORT. " dbname=" .P_DB. " user=" .P_USER. " password=" .P_PASS;

        if (!$this->link = pg_connect($conn_string))
            throw new Exception(NO_CONN_PG);
        
        $this->db = 'p';
    }

    /* Thank You and Eugene for solving the problem :) */
    function screen($field)
    {
        $field = strrpos($field,'"') ? $field : '"' .$field. '"';
        return $field;
    }

    function execute()
    {
        if (!$result = pg_query($this->link, $this->query))
            throw new Exception(NO_RES_PG);
        
        if ($this->switch == 'distinct')
        {
            $data = $this->fetchAssoc($result);
        }
        elseif ($this->switch == 'select')
        {
            $data = $this->fetchAssoc($result);
        }
        else
        {
            $data = SUCCESS;
        }

        // echo $this->query . '<br>';
        $this->query = '';
        return $data;
    }
}
