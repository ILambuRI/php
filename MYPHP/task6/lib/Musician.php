<?php
class Musician implements iMusician, Iterator
{
    use tForeachMusician;

    protected $name;
    protected $instrument;
    protected $type;
    protected $band;
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

    public function assingToBand(iBand $obj)
    {
        $this->band[] = $obj;
        return $this;
    }

    public function getNameBand()
    {
        $band_name = [];
        foreach ($this->band as $obj)
        {
            $band_name[] = $obj->getName();
        }
        $band_name = implode(', ', $band_name);
        return $band_name;
    }

    public function setMusicianType($name)
    {
        $this->type = $name;
        return $this;
    }

    public function getMusicianType()
    {
        return $this->type;
    }

    public function addInstrument(iInstrument $obj)
    {
        $obj->setHolders($this);
        $this->instrument[] = $obj;
        return $this;
    }

    public function getInstrument()
    {
        return $this->instrument;
    }
}