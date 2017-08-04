<?php
trait tJoinSwitch
{
    function joinSwitch($type, $table)
    {
        $str = '';
        switch ($type)
        {
            case 'i':
                $str .= "INNER JOIN $table ";
            break;
            case 'c':
                $str .= "CROSS JOIN $table ";
            break;
            case 'n':
                $str .= "NATURAL JOIN $table ";
            break;
            case 'f':
                $str .= "FULL JOIN $table ";
            break;
            case 'l':
                $str .= "LEFT JOIN $table ";
            break;
            case 'r':
                $str .= "RIGHT JOIN $table ";
            break;
            case 'fo':
                $str .= "FULL OUTER JOIN $table ";
            break;
            case 'lo':
                $str .= "LEFT OUTER JOIN $table ";
            break;
            case 'ro':
                $str .= "RIGHT OUTER JOIN $table ";
            break;
            default:
                throw new Exception(NO_TYPE_JOIN);
            break;
        }
        return $str;
    }
}