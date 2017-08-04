<?php
trait tFetch
{
    function fetchAssoc($result)
    {
        if($this->db == 'p')
            $function = 'pg_fetch_assoc';
        if($this->db == 'm')
            $function = 'mysql_fetch_assoc';

        if ($this->switch == 'distinct')
        {
            while ($row = $function($result))
            {
                foreach ($row as $val)
                {
                    $data[]= $val;
                }
            }
            $function($result);
        }

        if ($this->switch == 'select')
        {
            while ($row = $function($result))
            {
                foreach ($row as $key => $val)
                {
                    $data[][$key]= $val;
                }
            }
            $function($result);
        }

        return $data;
    }
}