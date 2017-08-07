<?php
require_once ('config.php');
function __autoload($class){
  require_once('lib/' . $class . '.php');
}

try
{
    /* Active Recors */
    $ar = new MyTest(TABLE_M);
    $allfields = $ar->sayAllFields();

    /* Sets */
    $ar->key = 'saveIt';
    $ar->data = 'test';
    $v1_set = $ar->key;
    $v2_set = $ar->data;
    $res_set = $ar->saveIt();

    /* Update */
    $f_u_s = 'key';
    $v_u_s = 'user';
    $f_u = 'data';
    $v_u = 'updUser';
    $res_upd = $ar->takeAnd($f_u_s, $v_u_s)->update($f_u, $v_u);

    /* Insert */
    $f_1 = 'user10';
    $f_2 = 'task11';
    $res_ins = $ar->insert($f_1, $f_2);

    /* Delete */
    $f_d = 'key';
    $v_d = 'user';
    $res_del = $ar->delete($f_d, $v_d);
    
    /* Select */
    $f_s = 'key';
    $v_s = 'user10';
    $res_take = $ar->takeAll($f_s, $v_s);
}
catch (Exception $e)
{
    $error = $e->getMessage();
}

require_once ('template/index.php');
