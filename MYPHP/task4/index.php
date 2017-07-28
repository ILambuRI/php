<?php
require_once ('config.php');
function __autoload($class){
  require_once('lib/' . $class . '.php');
}

try
{
    
    //$sql = new MySql;
    /* Select */
    //$res = $sql->sel('key','data')->from('MY_TEST')->execute();
    //print_r($res);
    //echo "<br><br><br>";
    /* Insert */
    //$res = $sql->ins('MY_TEST','key','data')->value('user10','testuser')->execute();
    //var_dump($res);
    //echo "<br><br><br>";
    /* Update */
    //$set_args['key'] = 'user1';
   //$set_args['data'] = 'test1';
    //$res = $sql->upd('MY_TEST')->set($set_args)->where('key','user')->execute();
    //var_dump($res);
    //echo "<br><br><br>";
    /* Delete */
    //$res = $sql->del('MY_TEST')->where('key','user11')->execute();
    //var_dump($res);
    //echo "<br><br><br>";
    $sql = new Postgresql();


}
catch (Exception $e)
{
    $error = $e->getMessage();
}

echo $error;

require_once ('template/index.php');
