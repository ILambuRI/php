<?php
class Sql
{
    use tArgs;

    protected $switch;
    protected $query = '';

    function sel($db, ...$fields)
    {
        if ($field == '*')
            throw new Exception(NOT_USE_IT);

        if($db == 'p')
            $field = $this->makeArgs($fields, "\"", TABLE_P . ".");

        if($db == 'm')
            $field = $this->makeArgs($fields, "`");

        $this->query .= "SELECT $field ";
        $this->switch = 'select';
        return $this;
    }

    function dis($db, $field)
    {
        if($db == 'm')
            $this->query .= "DISTINCT `$field` ";

        if($db == 'p')
            $this->query .= "DISTINCT $field ";
        
        $this->switch = 'distinct';
        return $this;
    }

    function ins($db, $table, ...$fields)
    {   
        if($db == 'p')
            $field = $this->makeArgs($fields, "\"");

        if($db == 'm')
            $field = $this->makeArgs($fields, "`");

        $this->query .= "INSERT INTO $table ($field) ";
        return $this;
    }

    function upd($table)
    {
        $this->query .= "UPDATE $table ";
        return $this;
    }

    function del($table)
    {
        $this->query .= "DELETE FROM $table ";
        return $this;
    }

    function from($table)
    {
        $this->query .= "FROM $table ";
        return $this;
    }

    function where($db,$field,$value)
    {
        if($db == 'p')
            $this->query .= "WHERE \"$field\" = '$value' ";

        if($db == 'm')
            $this->query .= "WHERE `$field` = '$value' ";

        return $this;
    }

    function set($db, $args)
    {
        if ($db == 'm')
            $sets = $this->makeArgsSet('m', $args);

        if ($db == 'p')
            $sets = $this->makeArgsSet('p', $args);

        $this->query .= "SET  $sets";
        return $this;
    }

    function value(...$values)
    {
        $value = $this->makeArgs($values, "'");
        $this->query .= "VALUES ($value) ";
        return $this;
    }
}
