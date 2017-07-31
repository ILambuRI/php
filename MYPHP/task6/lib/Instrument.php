<?php
class Instrument implements iInstrument, Iterator
{
    use tForeachInstrument;

    protected $name;
    protected $category;
    protected $holders;
    protected $cnt;

    public function getCnt()
    {
        return $this->cnt;
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

    public function setHolders(Musician $obj)
    {
        $this->holders[]['name'] = $obj->getName();
    }

    public function getHolders()
    {

        return $this->holders;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }
}
