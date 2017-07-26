<?php
class Sql
{
    protected $sel;
    protected $ins;
    protected $upd;
    protected $del;
    protected $from;
    protected $where;
    protected $set;
    protected $value;
    protected $query;

    function setQuery($str)
    {
        $this->query = $str;
    }

    function getQuery()
    {
        return $this->query;
    }

    function sel($field)
    {
        $this->sel = "SELECT $field";
        return $this;
    }

    function ins($table, $field)
    {
         $this->ins = "INSERT INTO $table (" . $field . ")";
         return $this;      
    }

    function upd($table)
    {
        $this->upd = "UPDATE $table";
        return $this;
    }

    function del($table)
    {
        $this->del = "DELETE FROM $table";
        return $this;
    }

    function from($table)
    {
        $this->from = "FROM $table";
        return $this;
    }

    function where($field,$value)
    {
        $this->where = "WHERE $field = $value";
        return $this;
    }

    function set($field, $value)
    {
        $this->set = "SET $field = $value";
        return $this;
    }

    function value($value)
    {
        $this->select = "VALUE (" . $value . ")";
        return $this;
    }

    function execute()
    {
        foreach ($this as $key => $value) 
        {
            if ('query' == $key) continue;
            $this->setQuery($this->getQuery() . $value);
        }
    }
}
