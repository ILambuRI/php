<?php
trait tArgs
{
    function makeArgs($arr, $quote, $table='')
    {
        for($i = 0, $cnt = count($arr); $i < $cnt; $i++)
        {
            if ($cnt-1 == $i)
            {
                $args .= $table . $quote . $arr[$i] . $quote;
            }
            else
            {
                $args .= $table . $quote . $arr[$i] . $quote . ", ";
            }
            
        }
        return $args;
    }

    function makeArgsSet($db, $arr)
    {
        $pop = $arr;
        $last = array_pop($pop);
        foreach ($arr as $field => $value)
        {
            if ($value == $last)
            {
                if ($db == 'p')
                    $sets .= "\"$field\" = '$value' ";
                if ($db == 'm')
                    $sets .= "`$field` = '$value' ";
            }
            else
            {
                if ($db == 'p')
                    $sets .= "\"$field\" = '$value', ";
                if ($db == 'm')
                    $sets .= "`$field` = '$value', ";
            }
        }
        return $sets;
    }
    
    /*
    function makeArgsPgFields($arr, $table)
    {
        for($i = 0, $cnt = count($arr); $i < $cnt; $i++)
        {
            if ($cnt-1 == $i)
            {
                $args .= $table . ".\"" . $arr[$i] . "\"";
            }
            else
            {
                $args .= $table . ".\"" . $arr[$i] . "\", ";
            }
        }
        return $args;
    }
    */
}
