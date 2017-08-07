<?php
class Fread
{
    protected $file;
    protected $dir;

    function __construct($dir)
    {
        $this->dir = $dir;
    }

    function fileString($num)
    {
        if (!abs((int)$num))
            throw new Exception(NOT_INT);

        if(!is_readable($this->dir))
            throw new Exception(NOT_EXIST);

        $num -= 1;
        $file = file($this->dir);
        foreach ($file as $key => $value)
        {
            if ($key == $num)
                $data = $value;
        }

        if (!$data)
            return $data = NO_STRING;

        return $data;
    }

    function rewriteStr($num, $str_replace)
    {
        $num -= 1;
        $str_replace .= PHP_EOL;
        if (!is_writable($this->dir))
            throw new Exception(NOT_WRITE);

        $file = file($this->dir);
        if (!$file[$num])
            throw new Exception(NO_STRING);

        foreach ($file as $key => $value)
        {
            if ($key == $num)
                $file[$key] = $str_replace;
        }
        
        return $file;
    }

    function fileChar($num, $char)
    {
        if (!abs((int)$num) and !abs((int)$char))
            throw new Exception(NOT_INT);

        if(!is_readable($this->dir))
            throw new Exception(NOT_EXIST);

        $num -= 1; $char -= 1; 
        $file = file($this->dir);
        foreach ($file as $key => $value)
        {
            if ($key == $num)
            {
                $data = $value[$char];
            }
        }

        if (!$data)
            return $data = NO_CHAR;

        return $data;
    }

    function rewriteChar($num, $num_char, $char_replace)
    {
        $num -= 1; $num_char -= 1;
        if (!is_writable($this->dir))
            throw new Exception(NOT_WRITE);
        if (strlen($char_replace) > 1 || strlen($char_replace) < 1)
            throw new Exception(NO_MORE_CHAR);

        $file = file($this->dir);
        foreach ($file as $key => $value)
        {
            if ($key == $num)
            {
                if (!$char = $value[$num_char])
                    throw new Exception(NO_CHAR);
                // $file[$key] = str_replace($char, $char_replace, $file[$key]);
                $new_str = $value;
                $new_str[$num_char] = $char_replace;
                $file[$key] = $new_str;
            }
        }
        
        return $file;
    }

    function saveIt($arr)
    {
        if (!count($arr))
            return $msg = RW_ERROR;

            if(!file_put_contents($this->dir, implode("", $arr)))
            {
                $msg = RW_ERROR;
            }
            else
            {
                $msg = RW_SAVE;
            }
        
        return $msg;
    }

    function allTextString()
    {
        $i = 1;
        while (NO_STRING !== ($str = $this->fileString($i)))
        {            
            $text_str .= $str . '<br>';
            $i++;
        }

        return $text_str;
    }

    function allTextChar()
    {
        $i_s = 1;
        while (NO_STRING !== ($str = $this->fileString($i_s)))
        {
            $i_c = 1;
            while (NO_CHAR !== ($char = $this->fileChar($i_s, $i_c)))
            {
                $text_char .= $char;
                $i_c++;
            }

            $text_char .= '<br>';
            $i_s++;
        }

        return $text_char;
    }
}