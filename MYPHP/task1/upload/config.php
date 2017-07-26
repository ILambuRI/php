<?php
/* Folder */
define('UPL','upload');
//define('UPL','/usr/home/user10/public_html/MYPHP/task1/upload');

/* Empty table */
define("EMPTY_TAB","<div class='alert alert-warning col-md-2 col-md-offset-5' role='alert'>No files!</div>");

/* Errors on save*/
define("EXIST","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File exist!</div>");
define("INI_SIZE","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Too mach form size!</div>");
define("FORM_SIZE","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Too mach form size!</div>");
define("PARTIAL","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Partial upload</div>");
define("NO_FILE","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File not upload!</div>");
define("NO_TMP_DIR","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>TMP not exist!</div>");
define("CANT_WRITE","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File save error!</div>");

/* Errors on delete*/
define("NO_PERMS","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File perms denied!</div>");
define("NOT_DEL","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Can't delete this!</div>");
define("NO_EXIST","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>File not exist!</div>");
define("NO_EXIST_FOLDER","<div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>Folder not exist!</div>");

/* Success msg */
define("DEL","<div class='alert alert-success col-md-4 col-md-offset-1' role='alert'>File deleted.</div>");
define("SAVE","<div class='alert alert-success col-md-4 col-md-offset-1' role='alert'>File saved.</div>");