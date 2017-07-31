<?php
require_once ('config.php');
function __autoload($class){
  require_once('lib/' . $class . '.php');
}

    $gitara = new Instrument();
    $gitara->setName('Gitara')->setCategory('Bass');

    $electro_gitara = new Instrument();
    $electro_gitara->setName('Electro-gitara')->setCategory('High');

    $baraban = new Instrument();
    $baraban->setName('Baraban')->setCategory('Fon');

    $vasya = new Musician();
    $vasya
    ->setName('Vasya Pupkin')
    ->setMusicianType('Gitarist')
    ->addInstrument($gitara)
    ->addInstrument($electro_gitara);

    $petya = new Musician();
    $petya
    ->setName('Petya Petrovich')
    ->setMusicianType('FullStack musician')
    ->addInstrument($gitara)
    ->addInstrument($electro_gitara)
    ->addInstrument($baraban);

    $john = new Musician();
    $john
    ->setName('John Guest')
    ->setMusicianType('Barabanshik')
    ->addInstrument($baraban);


    $brigada = new Band();
    $brigada
    ->setName('Brigada')
    ->setGenre('Rock')
    ->addMusician($john, 'john')
    ->addMusician($petya, 'petya')
    ->addMusician($vasya, 'vasya');

    foreach ($brigada->getMusician() as $obj_name=>$obj)
    {
        $$obj_name = $obj;
    }

    $golos = new Instrument();
    $golos->setName('Golos')->setCategory('Pesnya');    

    $mitya = new Musician();
    $mitya
    ->setName('Mitya Golos')
    ->setMusicianType('Pevec')
    ->addInstrument($golos);

    $igor = new Musician();
    $igor
    ->setName('Igor Golosok')
    ->setMusicianType('Pevec')
    ->addInstrument($golos)
    ->addInstrument($gitara);

    $raduga = new Band();
    $raduga
    ->setName('Raduga')
    ->setGenre('Pop')
    ->addMusician($john, 'john')
    ->addMusician($petya, 'petya')
    ->addMusician($vasya, 'vasya')
    ->addMusician($igor, 'igor')
    ->addMusician($mitya, 'mitya');

require_once ('template/index.php');