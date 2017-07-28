<?php
trait tArgs
{
    function makeArgs($arr, $quote)
    {
        for($i = 0, $cnt = count($arr); $i < $cnt; $i++)
        {
            if ($cnt-1 == $i)
            {
                $args .= $quote . $arr[$i] . $quote;
            }
            else
            {
                $args .= $quote . $arr[$i] . $quote . ",";
            }
            
        }
        return $args;
    }
}