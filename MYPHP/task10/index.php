<?php
require_once ('config.php');
function __autoload($class){
  require_once('lib/' . $class . '.php');
}

try
{
    /* MySQL */
    $sql = new MySql;

    /* Insert */
    $i_field1 = POLE1;
    $i_field2 = POLE2;
    $i_val1 = 'user10';
    $i_val2 = 'task4';
    $i_res = $sql->ins('m',TABLE_M, $i_field1, $i_field2)->value($i_val1, $i_val2)->execute();

    /* Update */
    $set_args[POLE1] = 'user10';
    $set_args[POLE2] = 'up10';
    $u_field = POLE1;
    $u_val = 'user';
    $u_res = $sql->upd(TABLE_M)->set('m', $set_args)->where('m', $u_field, $u_val)->execute();

    /* Delete */
    $d_field = POLE1;
    $d_val = 'user10';
    $d_res = $sql->del(TABLE_M)->where('m', $d_field, $d_val)->execute();

    /* Select */
    $s_res = $sql->sel('m',POLE1, POLE2)->from(TABLE_M)->execute();
    
    /* Distinct */
    $s_dis = $sql->sel('m')->dis('m', POLE1)->from(TABLE_M)->execute();


    /*----------------------------------------------------------------------------------------*/

    /* PostgreSQL */
    $pg_sql = new Postgresql;

    /* Insert */
    $i_field1_pg = POLE1;
    $i_field2_pg = POLE2;
    $i_val1_pg = 'user10';
    $i_val2_pg = 'task4';
    $i_res_pg = $pg_sql->ins('p',TABLE_P, $i_field1_pg, $i_field2_pg)->value($i_val1_pg, $i_val2_pg)->execute();
    

    /* Update */
    $set_args_pg[POLE1] = 'user10';
    $set_args_pg[POLE2] = 'test10';
    $u_field_pg = POLE1;
    $u_val_pg = 'user';
    $u_res_pg = $pg_sql->upd(TABLE_P)->set('p', $set_args_pg)->where('p', $u_field_pg, $u_val_pg)->execute();

    /* Delete */
    $d_field_pg = POLE1;
    $d_val_pg = 'user10';
    $d_res_pg = $pg_sql->del(TABLE_P)->where('p', $d_field_pg, $d_val_pg)->execute();

    /* Select */
    $s_res_pg = $pg_sql->sel('p',POLE1, POLE2)->from(TABLE_P)->execute();

    /* Distinct */
    $s_dis_p = $sql->sel('m')->dis('p', POLE2)->from(TABLE_M)->execute();
    // echo extension_loaded('pgsql') ? 'yes':'no';
    //pg_query($pg_sql->link, "INSERT INTO pg_test (key, data) VALUES ('user1','test1')");
}
catch (Exception $e)
{
    $error = $e->getMessage();
}

require_once ('template/index.php');
