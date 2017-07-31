<?php
class Band implements iBand, Iterator
{
    use tForeachBand;

    protected $musician;
    protected $name;
    protected $genre;
    protected $cnt;

    public function getCnt()
    {
        return $this->cnt;
    }

    public function setGenre($name)
    {
        $this->genre = $name;
        return $this;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addMusician(iMusician $obj, $obj_name)
    {
        $obj->joinedToBand($this);
        $this->musician[$obj_name] = $obj;
        return $this;
    }

    public function getMusician()
    {
        return $this->musician;
    }
}