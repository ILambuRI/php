<?php
// const UPL = '/usr/home/user10/public_html/MYPHP/task1/upload';
// const UPL = 'upload';
define('UPL','upload');

define("ERR", [
    /* Пустая таблица */
    "EMPTY" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Пока нет файлов!</div>",   
    /* При загрузке */
    "EXIST" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Файл с таким названием уже существует!</div>",
    "INI_SIZE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Превышен максимально допустимый размер</div>",
    "FORM_SIZE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Превышено значение формы MAX_FILE_SIZE</div>",
    "PARTIAL" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Файл загружен частично</div>",
    "NO_FILE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Файл не был загружен</div>",
    "NO_TMP_DIR" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Отсутствует временная папка</div>",
    "CANT_WRITE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Не удалось записать файл не диск</div>",
    /* При удалении */
    "NO_EXIST" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Файла не существует!</div>"
]);

define("SUCCESS", [
    "DEL" => "<div class='alert alert-success col-md-4 col-md-offset-1' role='alert'>Файл был удален.</div>",
    "SAVE" => "<div class='alert alert-success col-md-4 col-md-offset-1' role='alert'>Файл был записан!</div>"
]);
