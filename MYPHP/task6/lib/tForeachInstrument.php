<?php
trait tForeachInstrument
{
        /* Iterator */
    public function rewind()
    {
        $this->cnt = 1;
        reset($this->holders);
    }
  
    public function current()
    {
        if ($this->cnt == 1)
        {
            $var['instrument_info'] = $this;
            $var['holder'] = current($this->holders);
        }
        else
        {
            $var = current($this->holders);
        }
        return $var;
    }
  
    public function key() 
    {
        $var = key($this->holders);
        return $var;
    }
  
    public function next() 
    {
        $var = next($this->holders);
        if ($var)
        {
            $this->cnt++;
        }
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->holders);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }
}