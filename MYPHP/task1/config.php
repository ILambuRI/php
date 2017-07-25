<?php
// const UPL = '/usr/home/user10/public_html/MYPHP/task1/upload';
// const UPL = 'upload';
define('UPL','/usr/home/user10/public_html/MYPHP/task1/upload');

define("ERR", [
    /* Empty table */
    "EMPTY" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>No files!</div>",   
    /* ERRORS */
    "EXIST" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File exist!</div>",
    "INI_SIZE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Too mach size!</div>",
    "FORM_SIZE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Too mach form size!</div>",
    "PARTIAL" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Partial upload</div>",
    "NO_FILE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File not upload!</div>",
    "NO_TMP_DIR" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>TMP not exist!</div>",
    "CANT_WRITE" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File save error!</div>",
    /* */
    "NO_EXIST" => "<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File not exist!</div>"
]);

define("SUCCESS", [
    "DEL" => "<div class='alert alert-success col-md-4 col-md-offset-1' role='alert'>File deleted.</div>",
    "SAVE" => "<div class='alert alert-success col-md-4 col-md-offset-1' role='alert'>File saved.</div>"
]);
