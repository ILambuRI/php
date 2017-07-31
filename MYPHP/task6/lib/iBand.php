<?php
interface iBand
{
    public function getName();
    public function getGenre();
    public function addMusician(iMusician $obj, $obj_name);
    public function getMusician();
}