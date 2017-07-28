<?php
class Sql
{
    use tArgs;

    protected $sel;
    protected $ins;
    protected $upd;
    protected $del;
    protected $set;
    protected $from;
    protected $where;
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

    function sel(...$fields)
    {
        if ($field == '*')
        {
            throw new Exception(NOT_USE_IT);
        }
        $field = $this->makeArgs($fields, "`");
        $this->sel = "SELECT $field ";
        return $this;
    }

    function ins($table, ...$fields)
    {   
        $field = $this->makeArgs($fields, "`");
        $this->ins = "INSERT INTO $table ($field) ";
        return $this;
    }

    function upd($table)
    {
        $this->upd = "UPDATE $table ";
        return $this;
    }

    function del($table)
    {
        $this->del = "DELETE FROM $table ";
        return $this;
    }

    function from($table)
    {
        $this->from = "FROM $table ";
        return $this;
    }

    function where($field,$value)
    {
        $this->where = "WHERE `$field` = '$value' ";
        return $this;
    }

    function set(array $args)
    {
            $pop = $args;
            $last = array_pop($pop);
            foreach ($args as $field => $value)
            {
                if ($value == $last)
                {
                    $sets .= "`$field` = '$value' ";
                }
                else
                {
                    $sets .= "`$field` = '$value',";
                }
            }
            $this->set = "SET  $sets";
        return $this;
    }

    function value(...$values)
    {
        $value = $this->makeArgs($values, "'");
        $this->select = "VALUE ($value) ";
        return $this;
    }

    function execute()
    {
        foreach ($this as $key => $value) 
        {
            if ('query' == $key or 'link' == $key) continue;
            $this->setQuery($this->getQuery() . $value);
        }
        echo $this->query;
    }
}