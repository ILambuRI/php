<?php
class Fread
{
    protected $file;
    protected $dir;

    function __construct()
    {
    }

    function fileEnter($dir)
    {
        $this->dir = $dir;
        if (is_file($dir))
        {
            if (($this->file = fopen($dir, 'c+')))
            {
                $msg = OPEN;
            }
            else
            {
                $msg = EXIST_NOT_OPEN;
            }
        }
        else
        {
            $msg = NOT_EXIST;
        }
        return $msg;
    }

    function fileString()
    {
        if (!feof($this->file))
        {
            if (($string = fgets($this->file)))
            {
                $msg = $string . "<br>";
            }
            else
            {
                $msg = END;
            }
        }
        else
        {
            $msg = END;
        }
        return $msg;
    }

    function rewriteStr($str, $str_replace)
    {
        $file = [];
        $str .= PHP_EOL;
        $str_replace .= PHP_EOL;
        if (is_writable($this->dir))
        {
            $file = file($this->dir);
            foreach ($file as $key => $value)
            {
                if ($value == $str)
                    $file[$key] = $str_replace;
            }
        } 
        return $file;
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
                $msg = END;
            }
        }
        else
        {
            $msg = END;
        }
        return $msg;
    }

    function rewriteChar($str, $char, $char_replace)
    {
        $file = [];
        $str .= PHP_EOL;
        if (is_writable($this->dir))
        {
            $file = file($this->dir);
            foreach ($file as $key => $value)
            {
                if ($value == $str)
                {
                    $file[$key] = str_replace($char, $char_replace, $str);
                }
            }
        }
        return $file;
    }

    function saveIt($arr)
    {
        if (count($arr))
        {
            if(!fputs($this->file, implode("", $arr)))
            {
                $msg = RW_ERROR;
            }
            else
            {
                $msg = RW_SAVE;
            }
        }
        else
        {
            $msg = RW_ERROR;
        }
        return $msg;
    }

    function fileExit()
    {
        if (fclose($this->file))
        {
            $msg = CLOSE;
        }
        else
        {
            $msg = NOT_CLOSE;
        }
        return $msg;
    }

    function __destruct()
    {
    } 
}