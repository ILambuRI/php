<?php
class MySql extends Sql
{
    use tClean;

    protected $link;

    public function __construct()
    {
        if (!$this->link = mysql_connect(M_HOST, M_USER, M_PASS)) 
            throw new Exception(NO_CONN . mysql_error());

        if (!mysql_select_db(M_DB, $this->link))
            throw new Exception(NO_DB . mysql_error());
    }

    function execute()
    {
        if (!$result = mysql_query($this->query, $this->link))
            throw new Exception(NO_RES . mysql_error());
        
        if (is_resource($result) && $this->switch == 'distinct')
        {
            while ($row = mysql_fetch_assoc($result))
            {
                foreach ($row as $val)
                {
                    $data[]= $val;
                }
            }
            mysql_free_result($result);
        }
        elseif ($this->switch == 'select' && is_resource($result))
        {
            while ($row = mysql_fetch_assoc($result))
            {
                foreach ($row as $key => $val)
                {
                    $data[][$key]= $val;
                }
            }
            mysql_free_result($result);
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
