<?php
include 'config.php';
include 'lib/Fread.php';

$file = new Fread;

/* b) */
/* String */
ob_start();
echo "<p>" . $file->fileEnter(FILE) . "</p>";

$string = 'Lorem ipsum text2';
$string_r = 'text2';

echo "Replase string: " . $string . "<br>";
echo "On string: " . $string_r . "<br>";
$arr = $file->rewriteStr($string, $string_r);
echo $file->saveIt($arr) . "<br>";

echo "<br><p>" . $file->fileExit() . "</p>";

$Bstring = ob_get_contents();
ob_clean();

/* Char */
echo "<p>" . $file->fileEnter(FILE) . "</p>";

$string = 'LorEm ipsum tExt5';
$char = 't';
$char_r = 'T';
echo "Replase char in string: " . $string . "<br>";
echo "Char: " . $char . "<br>";
echo "On char: " . $char_r . "<br>";
$arr = $file->rewriteChar($string, $char, $char_r);
echo $file->saveIt($arr) . "<br>";

echo "<br><p>" . $file->fileExit() . "</p>";

$Bchar = ob_get_contents();
ob_clean();


/* a) */
/* String */
echo "<p>" . $file->fileEnter(FILE) . "</p>";


while (END != ($s = $file->fileString()))
{
    echo $s;
}

echo "<br><p>" . $file->fileExit() . "</p>";

$Astring = ob_get_contents();
ob_clean();

/* Char */
echo "<p>" . $file->fileEnter(FILE) . "</p>";

while (END != ($s = $file->fileChar()))
{
    echo $s;
}

echo "<br><br><p>" . $file->fileExit() . "</p>";

$Achar = ob_get_contents();

ob_end_clean();

include 'template/index.php';