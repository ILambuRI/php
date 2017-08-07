<?php
include 'config.php';
include 'lib/Fread.php';

$file = new Fread(FILE);

try
{
    /* b) */
    /* String */
    $num = 2;
    $str = 'I AM REPLACE IT !';
    $arr = $file->rewriteStr($num, $str);
    $b_str = $file->saveIt($arr);

    /* Char */
    $num_str = 1;
    $num_char = 7;
    $char = 'C';
    $arr = $file->rewriteChar($num_str, $num_char, $char);
    $b_char = $file->saveIt($arr);

    /* a) */
    /* String */
    $Astring = $file->fileString(15);

    /* Char */
    $Achar = $file->fileChar(3, 13);

    /* All text - String */
    $text_str = $file->allTextString();

    /* All text - Char */
    $text_char = $file->allTextChar();

}
catch(Exception $e)
{
  $error = $e->getMessage();	           
}

include 'template/index.php';