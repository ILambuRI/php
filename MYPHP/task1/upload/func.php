<?php

function upload()
{
    $status =[];
    if (!is_dir(UPL))
        mkdir(UPL);
    try
    {
        $fname = $_FILES["userfile"]["name"];
        if (file_exists(UPL . "/" . $fname))
            throw new Exception(EXIST);
        if ($_FILES["userfile"]["error"] != UPLOAD_ERR_OK)
            errorCheck($_FILES["userfile"]["error"]);
        if (file_exists($_FILES["userfile"]["tmp_name"]))
        {
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"], UPL . "/" . $fname))
            {
                $status['success'] = true;
                $status['message'] = SAVE;
            }
        }
    }
    catch (Exception $e)
    {
        $status['success'] = false;
        $status['message'] = $e->getMessage();
        return $status;
    }
    return $status;
}

function dirScan($dir)
{
    $files = [];
    if (is_dir($dir))
    {
        $data = scandir($dir);
        foreach ($data as $file)
        {
            if (is_file($dir . "/" . $file))
            {
                $i = filesize($dir . '/' . $file);
                $files[$file]['name'] = $file;
            
                if ($i < '1024')
                {
                    $files[$file]['size'] = $i . " byte";
                }
                elseif ($i > '1024' and $i < '1048576')
                {
                    $s = $i / 1024;
                    $files[$file]['size'] = (int)$s . " kb";
                }
                else
                {
                    $s =($i / 1024) / 1024;
                    $files[$file]['size'] = (int)$s . " Mb";
                }
            }
        }
    }
    return $files;
}

function mkTable($arr = [])
{
    if (count($arr))
    {
        $content = [];
        ob_start();
        $i = 1;
        foreach ($arr as $fname => $file)
        {
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
        $content['cnt'] = $i-1;
        $content['tab'] = ob_get_clean();
    }
    else
    {
        $content['cnt'] = 0;
        $content['err'] = EMPTY_TAB;
        return $content;
    }
    return $content;
}

function delFile($file, $dir)
{
    if (is_dir($dir))
    {
        $fdir = $dir . "/" . $file;
        if (is_file($fdir))
        {
            if (644 <= substr(sprintf('%o', fileperms($fdir)), -3))
            {
                if (unlink($fdir))
                {
                    $massage = DEL;
                }
                else
                {
                    $massage = NOT_DEL;
                }
            }
            else
            {
                $massage = NO_PERMS;
            }
        }
        else
        {
            $massage = NO_EXIST;
        }
    }
    else
    {
        $massage = NO_EXIST_FOLDER;
    }
    return $massage;
}

function errorCheck($error)
{
    switch ($error)
    {
    case UPLOAD_ERR_INI_SIZE:
        throw new Exception(INI_SIZE);
    break;
    case UPLOAD_ERR_FORM_SIZE:
        throw new Exception(FORM_SIZE);
    break;
    case UPLOAD_ERR_PARTIAL:
        throw new Exception(PARTIAL);
    break;
    case UPLOAD_ERR_NO_FILE:
        throw new Exception(NO_FILE);
    break;
    case UPLOAD_ERR_NO_TMP_DIR:
        throw new Exception(NO_TMP_DIR);
    break;
    case UPLOAD_ERR_CANT_WRITE:
        throw new Exception(CANT_WRITE);
    break;
    }
}