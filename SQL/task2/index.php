<?php
set_time_limit(720);
$link = pg_connect("host=localhost port=5432 dbname=user10 user=user10 password=user10v");

$sql = "CREATE TABLE \"task2\" (
        \"id\" integer NOT NULL,
            \"name\" varchar(255) NOT NULL,
                \"desc\" TEXT NOT NULL
            ) WITH (
                  OIDS=FALSE)";




//pg_query($link, $sql);
function randomText($max)
{
    $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP12313******"; 
    $size=StrLen($chars)-1; 
    $password=null; 

    while($max--)
        $password.=$chars[rand(0,$size)];
    return $password;
}

//for ($i=1; $i < 500001; $i++)
if(false)
{
    $name = randomText(100);
    $text = randomText(300);

    $sql = "INSERT INTO task2 (\"id\",\"name\",\"desc\") VALUES ('$i', '$name', '$text')";

    pg_query($link, $sql);
}
