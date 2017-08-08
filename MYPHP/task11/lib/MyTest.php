<?php
class MyTest extends MySql
{
    protected $field_cnt = 0; 
    protected $table; 
    protected $all_fields = '';
    protected $field;
    protected $result;

    public function __construct($table)
    {
        $this->table = $table;
        parent::__construct();

        $result = mysql_query("SHOW COLUMNS FROM $table");
        if (!$result)
            throw new Exception(NO_RES . mysql_error());
        
        if (mysql_num_rows($result) > 0) 
        {
            while ($row = mysql_fetch_assoc($result))
            {
                foreach ($row as $key => $value)
                {
                    if ($key == 'Field')
                    {
                        $this->all_fields[] = $value;
                        $this->field[$value] = '';
                        $this->field_cnt++;
                    }
                }
            }
            $this->setAllField();
        }
    }

    function __set($key, $val)
    {
        if (!array_key_exists($key, $this->field))
            throw new Exception(NOT_EXIST . $key);
        
        $this->field[$key] = $val;
    }

    function __get($key)
    {
        if (!array_key_exists($key, $this->field))
            throw new Exception(NOT_EXIST . $key);

        return $this->field[$key];
    }

    protected function setAllField()
    {
        $this->all_fields = $this->makeArgs($this->all_fields, "`");
    }

    function sayAllFields()
    {
        $str = $this->field_cnt . ' fields in ' .$this->table. ': (' .$this->all_fields. ')<br>';

        return $str;
    }

    function takeAll($field, $val)
    {
        $this->result = $this->sel($this->all_fields)->from($this->table)->where($field, $val)->execute();

        $result = $this->result;
        $this->result = [];
        return $result;
    }

    function takeAnd($field, $val)
    {
        $this->result = $this->sel($this->all_fields)->from($this->table)->where($field, $val)->execute();

        return $this;
    }

    function update($f, $v)
    {
        if(!is_array($this->result))
            return $msg = NOT_UPD;

        foreach ($this->result as $field)
        {
            if ($field[$f] && $field[$f] !== $v)
            {
                $args[$f] = $v;
                $res = $this->upd($this->table)->set($args)->where(key($field), $field[key($field)])->execute();
            }
        }

        $this->result = [];
        return $res;
    }

    function insert(...$values)
    {
        if ($this->field_cnt !== count($values))
            throw new Exception(NO_VALUES . $this->sayAllFields());

        $res = $this->ins($this->table, $this->all_fields)->value($values)->execute();

        $this->result = [];
        return $res;
    }

    function delete($field, $value)
    {
        $res = $this->del($this->table)->where($field, $value)->execute();
        
        return $res;
    }

    function saveIt()
    {
        foreach ($this->field as $f => $v)
        {
            if ($v == '')
                throw new Exception(NOT_SET . $f);

            $fields[]= $this->screen($f);
            $values[] = $v;
        }

        $fields = implode(',', $fields);
        $res = $this->ins($this->table, $fields)->value($values)->execute();

        foreach ($this->field as $f => $v)
        {
            $this->field[$f] = '';
        }

        return $res;
    }
}