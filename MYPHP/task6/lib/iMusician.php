<?php
interface iMusician
{
    public function addInstrument(iInstrument $obj);
    public function getInstrument();
    public function joinedToBand(iBand $nameBand);
    public function getMusicianType();
}