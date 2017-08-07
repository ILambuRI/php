<?php
class Db extends Sql
{
    protected $dbh;

    function __construct($db_name)
    {
        if ($db_name == 'MS')
        {
            $this->dbh = new PDO('mysql:host=' .M_HOST. ';dbname=' . M_DB, M_USER, M_PASS);
            $this->db = 'm';
        }
        if ($db_name == 'PGS')
        {
            $this->dbh = new PDO('pgsql:host=' .P_HOST. ';port=' .P_PORT. ';dbname=' .P_DB, P_USER, P_PASS);
            $this->db = 'p';
        }
    }

    public function execute($params)
    {
        if ($this->switch == 'select' || $this->switch == 'distinct')
        {
            $sth = $this->dbh->prepare($this->query);
            $sth->execute();
            $arr = $sth->fetchAll(PDO::FETCH_ASSOC);

            $this->query = '';
            return $arr;
        }
        else
        {
            $sth = $this->dbh->prepare($this->query);
            $sth->execute($params);
            
            $this->query = '';
            if ($rows = $sth->rowCount())
            {
                return $data = SUCCESS . $rows . ' line(s) have been changed.';
            }
            else
            {
                return $data = NOTHING;
            }
        }
    }
}