<?php
include 'lib/Fread.php';
include 'config.php';

$file = new Fread;

/* String */
echo $file->fileEnter(FILE) . "<br><br>";

while ("End of file." != ($s = $file->fileString()))
{
    echo $s . "<br>";
}

echo "<br>" . $file->fileExit() . "<br><br>";

/* Char */
echo $file->fileEnter(FILE) . "<br><br>";

while ("End of file." != ($s = $file->fileChar()))
{
    echo $s;
}

echo "<br><br>" . $file->fileExit() . "<br><br>";




include 'template/index.php';
