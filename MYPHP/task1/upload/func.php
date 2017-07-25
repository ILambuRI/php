<?php

function upload()
{
    if (!is_dir(UPL))
        mkdir(UPL);
    try {
        $status =[];
        $fname = $_FILES["userfile"]["name"];
        if (file_exists(UPL . "/" . $fname))
            throw new Exception(ERR['EXIST']);
        if ($_FILES["userfile"]["error"] != UPLOAD_ERR_OK)
            errorCheck($_FILES["userfile"]["error"]);
        if (file_exists($_FILES["userfile"]["tmp_name"])) {
            move_uploaded_file($_FILES["userfile"]["tmp_name"], UPL . "/" . $fname);
            $status['success'] = true;
            $status['message'] = SUCCESS['SAVE'];
        }
    } catch (Exception $e) {
        $status['success'] = false;
        $status['message'] = $e->getMessage();
        return $status;
    }
    return $status;
}

function dirScan($dir)
{
    
    $files = [];
    $data = scandir($dir);
    foreach ($data as $file) {
        if (is_file(UPL . "/" . $file)) {
            $i = filesize($dir . '/' . $file);
            $files[$file]['name'] = $file;
        
            if ($i < '1024') {
                $files[$file]['size'] = $i . " byte";
            } elseif ($i > '1024' and $i < '1048576') {
                $s = $i / 1024;
                $files[$file]['size'] = (int)$s . " kb";
            } else {
                $s =($i / 1024) / 1024;
                $files[$file]['size'] = (int)$s . " Mb";
            }
        }
    }
    return $files;
}

function mkTable($arr = [])
{
    if (count($arr)) {
        ob_start();
        $i = 1;
        foreach ($arr as $fname => $file) {
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$file['name']?></td>
            <td><?=$file['size']?></td>
            <td><a href="index.php?name=<?=$file['name']?>">Delete</td>
        </tr>
        <?php
            $i++;
        }
        $content = ob_get_clean();
        return $content;
    } else {
        return ERR['EMPTY'];
    }
}

function delFile($file)
{
    if (is_file(UPL . "/" . $file)) {
        unlink(UPL . "/$file");
        $massage = SUCCESS['DEL'];
    } else {
        $massage = ERR['NO_EXIST'];
    }
    return $massage;
}

function errorCheck($error)
{
    switch ($error) {
    case UPLOAD_ERR_INI_SIZE:
        throw new Exception(ERR['INI_SIZE']);
    break;
    case UPLOAD_ERR_FORM_SIZE:
        throw new Exception(ERR['FORM_SIZE']);
    break;
    case UPLOAD_ERR_PARTIAL:
        throw new Exception(ERR['PARTIAL']);
    break;
    case UPLOAD_ERR_NO_FILE:
        throw new Exception(ERR['NO_FILE']);
    break;
    case UPLOAD_ERR_NO_TMP_DIR:
        throw new Exception(ERR['NO_TMP_DIR']);
    break;
    case UPLOAD_ERR_CANT_WRITE:
        throw new Exception(ERR['CANT_WRITE']);
    break;
    }
}