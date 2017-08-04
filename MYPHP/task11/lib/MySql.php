<?php
class MySql extends Sql
{
    use tFetch;

    protected $link;
    protected $db;

    public function __construct()
    {
        if (!$this->link = mysql_connect(M_HOST, M_USER, M_PASS)) 
            throw new Exception(NO_CONN . mysql_error());

        if (!mysql_select_db(M_DB, $this->link))
            throw new Exception(NO_DB . mysql_error());
        
        $this->db = 'm';
    }

    /* Thank You and Eugene for solving the problem :) */
    function screen($field)
    {
        $field = strrpos($field,'`') ? $field : '`' .$field. '`';
        return $field;
    }

    function execute()
    {
        if (!$result = mysql_query($this->query, $this->link))
            throw new Exception(NO_RES . mysql_error());
        
        if (is_resource($result) && $this->switch == 'distinct')
        {
            $data = $this->fetchAssoc($result);
        }
        elseif ($this->switch == 'select' && is_resource($result))
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
