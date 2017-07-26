<?php
class Fread
{
    private $file;

    function __construct()
    {
    }

    function fileEnter($dir)
    {
        if (is_file($dir))
        {
            if (($this->file = fopen("$dir", "r")))
            {
                $msg = "The file is open for work.";
            }
            else
            {
                $msg = "The file exists, but I can not open it!";
            }
        }
        else
        {
            $msg = "The file does not exist!";
        }
        return $msg;
    }

    function fileString()
    {
        if (!feof($this->file))
        {
            if (($string = fgets($this->file)))
            {
                $msg = $string;
            }
            else
            {
                $msg = "End of file.";
            }
        }
        else
        {
            $msg = "End of file.";
        }
        return $msg;
    }

    function fileChar()
    {
        if (!feof($this->file))
        {
            if (($char = fgetc($this->file)))
            {
                if ($char == "\n")
                {
                    $msg = "<br>";
                }
                else
                {
                $msg = $char;
                }
            }
            else
            {
                $msg = "End of file.";
            }
        }
        else
        {
            $msg = "End of file.";
        }
        return $msg;
    }

    function fileExit()
    {
        if (fclose($this->file))
        {
            $msg = "The file is closed after work.";
        }
        else
        {
            $msg = "Could not close file!";
        }
        return $msg;
    }

    function __destruct()
    {
    } 
}
