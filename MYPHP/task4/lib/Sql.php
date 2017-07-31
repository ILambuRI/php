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
    protected $value;
    protected $where;
    protected $query;
    
    function setQuery($str)
    {
        $this->query = $str;
    }

    function getQuery()
    {
        return $this->query;
    }

    function sel($db, ...$fields)
    {
        if ($field == '*')
            throw new Exception(NOT_USE_IT);

        if($db == 'p')
            $field = $this->makeArgs($fields, "\"", TABLE_P . ".");
            // $field = $this->makeArgsPgFields($fields, TABLE_P);

        if($db == 'm')
            $field = $this->makeArgs($fields, "`");

        $this->sel = "SELECT $field ";
        return $this;
    }

    function ins($db, $table, ...$fields)
    {   
        if($db == 'p')
            $field = $this->makeArgs($fields, "\"");

        if($db == 'm')
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

    function where($db,$field,$value)
    {
        if($db == 'p')
            $this->where = "WHERE \"$field\" = '$value' ";

        if($db == 'm')
            $this->where = "WHERE `$field` = '$value' ";

        return $this;
    }

    function set($db, $args)
    {
        if ($db == 'm')
            $sets = $this->makeArgsSet('m', $args);

        if ($db == 'p')
            $sets = $this->makeArgsSet('p', $args);

        $this->set = "SET  $sets";
        return $this;
    }

    function value(...$values)
    {
        $value = $this->makeArgs($values, "'");
        $this->select = "VALUES ($value) ";
        return $this;
    }

    function execute()
    {
        foreach ($this as $key => $value) 
        {
            if ('query' == $key or 'link' == $key)
                continue;

            $this->setQuery($this->getQuery() . $value);
        }
    }
}