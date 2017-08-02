<?php 
final class Model
{
    protected static $options = '';
    protected static $li = '';
    protected $args;

    public function __construct()
    {
    }

    public static function getSelect($size, $class, $name, $multiple=false)
    {
        $str = '<select ';
        if ($multiple)
            $str .= 'multiple ';
        if ($size)
            $str .= 'size=\'' .$size. '\' ';
        if ($class)
            $str .= 'class=\'' .$class. '\' ';
        if($name)
            $str .= 'name=\'' .$name. '[]\' ';
        $str .= '>';

        $str .= static::$options;
        static::$options = '';

        $str .= SEL_END;

        return $str;
    }
    

    function setOption($value, $name, $opt_name, $dis_sel=false)
    {
        $str .= '<option ';
        if ($dis_sel == 'disabled')
            $str .= 'disabled ';
        if ($dis_sel == 'selected')
            $str .= 'selected ';
        if ($value)
            $str .= 'value=\'' .$value. '\' ';
        if ($name)
            $str .= 'name=\'' .$name. '\' ';
        $str .= '>';

        if (!$opt_name)
            throw new Exception(NO_OPT_NAME);

        $str .= $opt_name . OPT_END;

        static::$options .= $str;
        return $this;
    }

    public static function getOl($type, $start, $class, $reversed=false)
    {
        $str = '<ol ';
        if ($reversed)
            $str .= 'reversed ';
        if ($start)
        {
            $str .= 'start=\'' .$start. '\' ';
            if (!abs((int)$start))
                throw new Exception(NO_OL_INT);
        }
        if ($type)
            $str .= 'type=\'' .$type. '\' ';
        if($class)
            $str .= 'class=\'' .$class. '[]\' ';
        $str .= '>';

        $str .= static::$li;
        static::$li = '';

        $str .= '</ol>';

        return $str;
    }

    function setLi($name)
    {
        $str .= '<li>';

        if (!$name)
            throw new Exception(NO_LI_NAME);

        $str .= $name . '</li>';

        static::$li .= $str;
        return $this;
    }

}
