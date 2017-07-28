<?php
trait tClean
{
    function cleanProperties()
    {
        foreach ($this as $key => $value) 
        {
            if ('link' == $key) continue;
            $this->$key = '';
        }
    }
}