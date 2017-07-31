<?php
trait tForeachMusician
{
    /* Iterator */
    public function rewind()
    {
        $this->cnt = 1;
        reset($this->instrument);
    }
  
    public function current()
    {
        if ($this->cnt == 1)
        {
            $var['musician_info'] = $this;
            $var['instrument'] = current($this->instrument);
        }
        else
        {
            $var = current($this->instrument);
        }
        return $var;
    }
  
    public function key() 
    {
        $var = key($this->instrument);
        return $var;
    }
  
    public function next() 
    {
        $var = next($this->instrument);
        if ($var)
        {
            $this->cnt++;
        }
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->instrument);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }
}