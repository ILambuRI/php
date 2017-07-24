<?php

function upload()
{
    try{
    $fname = UPL . "/" .basename($_FILES['userfile']['name']);
    move_uploaded_file($_FILES['userfile']['tmp_name'], $fname));
    }catch
}

function scan($dir)
{
    
    $files = [];
    $data = scandir($dir);
    foreach ($data as $file){
        if ('.' == $file or '..' == $file) continue;
        $i = filesize($dir . '/' . $file);
        
        if ($i < '1024') {
            $files[$file] = $i . " byte";
        }elseif ($i > '1024' and $i < '1000000'){
            $files[$file] = $i . " kb";
        }else{
            $files[$file] = $i . " Mb";
        }
    }
    return $files;
}

function mkTable($arr)
{
    if (is_array($arr)){
        $i = 1;
        foreach ($arr as $name => $size){
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$name?></td>
            <td><?=$size?></td>
            <td><a href="http://192.168.0.15/~user10/MYPHP/task1/templates/index.php?name=<?=$name?>">Delete</td>
        </tr>
        
        <?php
            $i++;
        }
    }else{
        return false;
    }
}
