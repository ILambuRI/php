<?php
require_once ('config.php');
function __autoload($class){
  require_once('lib/' . $class . '.php');
}

try
{
    /* MySQL */
    $pdo = new Db('MS');

    /* Insert */
    $i_field1 = POLE1;
    $i_field2 = POLE2;
    $i_val1 = ':key';
    $i_val2 = ':data';
    $i_params = [':key'=>'user10', ':data'=>'MStask12'];
    $i_res = $pdo->ins(TABLE_M, $i_field1, $i_field2)
                 ->value($i_val1, $i_val2)->execute($i_params);

    /* Update */
    $set_args[POLE1] = ':field1';
    $set_args[POLE2] = ':field2';
    $u_field = POLE1;
    $u_val = "'userMS'";
    $u_params = [':field1'=>'updPDO', ':field2'=>'PDOtest'];
    $u_res = $pdo->upd(TABLE_M)->set($set_args)
                 ->where($u_field, $u_val)->execute($u_params);
    
    /* Delete */
    $d_field = POLE1;
    $d_val = ':val';
    $d_params = [':val'=>'userMS'];
    $d_res = $pdo->del(TABLE_M)->where($d_field, $d_val)->execute($d_params);

    /* Select */
    $pdo_res = $pdo->sel(POLE1, POLE2)->from(TABLE_M)->execute([]);


    /* PGS */
    $pdo_p = new Db('PGS');

    /* Insert */
    $i_field1_p = POLE1;
    $i_field2_p = POLE2;
    $i_val1_p = ':key';
    $i_val2_p = ':data';
    $i_params_p = [':key'=>'user10', ':data'=>'PGtask12'];
    $i_res_p = $pdo_p->ins(TABLE_P, $i_field1_p, $i_field2_p)
                 ->value($i_val1_p, $i_val2_p)->execute($i_params_p);

    /* Update */
    $set_args_p[POLE1] = ":field1";
    $set_args_p[POLE2] = ":field2";
    $u_field_p = POLE1;
    $u_val_p = "'userPG'";
    $u_params_p = [':field1'=>'updPDO', ':field2'=>'PDOtest'];
    $u_res_p = $pdo_p->upd(TABLE_P)->set($set_args_p)
                 ->where($u_field_p, $u_val_p)->execute($u_params_p);
    
    /* Delete */
    $d_field_p = POLE1;
    $d_val_p = ':val';
    $d_params_p = [':val'=>'userPG'];
    $d_res_p = $pdo_p->del(TABLE_P)->where($d_field_p, $d_val_p)->execute($d_params_p);

    /* Select */
    $pdo_res_p = $pdo_p->sel(POLE1, POLE2)->from(TABLE_P)->execute([]);
}
catch (PDOException $e)
{
    $pdo_error = 'Problems with the PDO: ' .$e->getMessage(). ' Code: ' .$e->getCode(). ' On line:' . $e->getLine();
}
catch (Exception $e)
{
    $error = $e->getMessage();
}

require_once ('template/index.php');
