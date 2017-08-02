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
        parent::execute();
        $sql    = $this->getQuery();
        if (!$result = mysql_query($sql, $this->link))
            throw new Exception(NO_RES . mysql_error());

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
            $data = SUCCESS;
        }
        $this->cleanProperties();
        return $data;
    }
}
