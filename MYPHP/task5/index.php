<?php
require_once ('config.php');
function __autoload($class){
  require_once('lib/' . $class . '.php');
}

try
{
    session_start();

    /* Cookie */
    $cookie = new Cookie();

    $key_c_del = 'name2';
    $res_c_del = $cookie->deleteData($key_c_del);
    $key_c_save = 'name1'; $val_c_save = 'John';
    $cookie->saveData($key_c_save, $val_c_save);
    $res_c = $cookie->getData($key_c_save);

    /* Session */

    $session = new Session();

    $key_s_del = 'name1';
    $res_s_del = $session->deleteData($key_s_del);
    $key_s_save = 'name2'; $val_s_save = 'Guest';
    $session->saveData($key_s_save, $val_s_save);
    $res_s = $session->getData($key_s_save);

    /* MySQL */

    $my_sql = new MySql();

    $key_m_del = 'task5';
    $res_m_del = $my_sql->deleteData($key_m_del);
    $key_m_save = 'user10'; $val_m_save = 'test5';
    $res_m_save = $my_sql->saveData($key_m_save, $val_m_save);
    $key_m_get = 'test5';
    $res_m = $my_sql->getData($key_m_get);

    /* PostgreSQL */

    $pg_sql = new PostGresql();

    $key_p_del = 'task5';
    $res_p_del = $pg_sql->deleteData($key_p_del);
    $key_p_save = 'user10'; $val_p_save = 'test5';
    $res_p_save = $pg_sql->saveData($key_p_save, $val_p_save);
    $key_p_get = 'test5';
    $res_p = $pg_sql->getData($key_p_get);

}
catch (Exception $e)
{
    $error = $e->getMessage();
}

require_once ('template/index.php');