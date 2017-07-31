<?php
trait tForeachBand
{
    /* Iterator */
    public function rewind()
    {
        $this->cnt = 1;
        reset($this->musician);
    }
  
    public function current()
    {
        if ($this->cnt == 1)
        {
            $var['band_info'] = $this;
            $var['musician'] = current($this->musician);
        }
        else
        {
            $var = current($this->musician);
        }
        return $var;
    }
  
    public function key() 
    {
        $var = key($this->musician);
        return $var;
    }
  
    public function next() 
    {
        $var = next($this->musician);
        if ($var)
        {
            $this->cnt++;
        }
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->musician);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }
}