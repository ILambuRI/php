<?php
class Sql
{
    use tArgs;
    use tJoinSwitch;

    protected $switch;
    protected $query = '';

    function sel($fields)
    {
        $this->query .= "SELECT $fields ";
        $this->switch = 'select';

        return $this;
    }

    function dis($field)
    {
        if($this->db == 'm')
            $this->query .= "DISTINCT `$field` ";

        if($this->db == 'p')
            $this->query .= "DISTINCT $field ";
        
        $this->switch = 'distinct';
        return $this;
    }

    function ins($table, $fields)
    {   
        $this->query .= "INSERT INTO $table ($fields) ";

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

    function where($field, $value)
    {
        $this->query .= "WHERE `$field` = '$value' ";

        return $this;
    }

    function set($args)
    {
        $sets = $this->makeArgsSet('m', $args);

        $this->query .= "SET  $sets";
        return $this;
    }

    function value($values)
    {
        $args = $this->makeArgs($values, "'");
        $this->query .= "VALUES ($args) ";

        return $this;
    }

    function join($type, $table)
    {
        $this->query .= $this->joinSwitch($type, $table);
        return $this;
    }

    function on($condition)
    {
        $this->query .= "ON $condition ";
        return $this;
    }

    function group($field)
    {
        $field = $this->screen($field);
        $this->query .= "GROUP BY $field ";
        return $this;
    }

    function having($cond, $field, $op)
    {
        $field = $this->screen($field);
        $this->query .= "HAVING $cond($field) $op ";
        return $this;
    }

    function order($field)
    {
        $field = $this->screen($field);
        $this->query .= "ORDER BY $field ";
        return $this;
    }

    function limit(...$nums)
    {
        foreach ($nums as $value)
        {
            if (!abs((int)$value)) 
                throw new Exception(NO_INT_LIMIT);
        }
        
        $num = implode(",", $nums);
        $this->query .= "LIMIT $num ";
        return $this;
    }

    function fakeExecute()
    {
        return $this->query;
    }
}
