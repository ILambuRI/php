<?php 
final class Model
{
    protected static $options = '';
    protected static $li = '';
    protected static $dl = '';
    protected static $input = '';
    protected static $tr = '';
    protected static $td = '';

    public function __construct()
    {
    }

    public static function arrToAtr($arr)
    {
        $str = '';
        
        foreach ($arr as $key => $value)
        {
            $str .= $key.'=' . '\'' . $value . '\' ';
        }

        return $str;
    }

    function setTd($name, $th=false)
    {
        if (!$name)
            throw new Exception(NO_NAME . 'td!');

        if ($th)
        {
            static::$td .= '<th>' .$name. '</th>';
        }
        else
        {
            static::$td .= '<td>' .$name. '</td>';
        }

        return $this;
    }

    function setTr()
    {
        if (!static::$td)
            throw new Exception(NO_BUILD . 'td!');

        static::$tr .= '<tr>' .static::$td. '</tr>';
        static::$td = '';
    }

    public static function getTable($atr=false)
    {
        $str = '<table ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!static::$tr)
            throw new Exception(NO_BUILD . 'td and tr!');
        
        $str .= static::$tr;
        static::$tr = '';

        $str .= '</table>';

        return $str;
    }

    public static function getSelect($multiple=false, $atr=false)
    {
        $str = '<select ';

        if ($multiple)
            $str .= 'multiple ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!static::$options)
            throw new Exception(NO_BUILD . 'options!');
        
        $str .= static::$options;
        static::$options = '';

        $str .= SEL_END;

        return $str;
    }
    

    function setOption($opt_name, $atr=false, $dis_sel=false)
    {
        $str .= '<option ';

        if ($dis_sel == 'disabled')
            $str .= 'disabled ';
        if ($dis_sel == 'selected')
            $str .= 'selected ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);
        
        $str .= '>';

        if (!$opt_name)
            throw new Exception(NO_NAME . 'option!');

        $str .= $opt_name . OPT_END;

        static::$options .= $str;
        return $this;
    }

    public static function getOl($atr=false, $reversed=false)
    {
        $str = '<ol ';

        if ($reversed)
            $str .= 'reversed ';

        if($atr['start'])
        {
            if (!abs((int)$atr['start']))
                throw new Exception(NO_OL_INT);
        }

        if (is_array($atr))
            $str .= static::arrToAtr($atr);
        
        $str .= '>';

        if (!static::$li)
            throw new Exception(NO_BUILD . 'li\'s!');

        $str .= static::$li;
        static::$li = '';

        $str .= '</ol>';

        return $str;
    }

    public static function getUl($atr)
    {
        $str = '<ul ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!static::$li)
            throw new Exception(NO_BUILD . 'li\'s!');

        $str .= static::$li;
        static::$li = '';

        $str .= '</ul>';

        return $str;
    }

    function setLi($name, $atr=false)
    {
        $str .= '<li ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!$name)
            throw new Exception(NO_NAME . 'li!');

        $str .= $name . '</li>';

        static::$li .= $str;
        return $this;
    }

    public static function getDl($atr=false)
    {
        $str = '<dl ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!static::$dl)
            throw new Exception(NO_BUILD . 'dt and dd!');

        $str .= static::$dl;
        static::$dl = '';

        $str .= '</dl>';

        return $str;
    }

    function setDt($name, $atr=false)
    {
        $str .= '<dt ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!$name)
            throw new Exception(NO_NAME . 'dt!');

        $str .= $name . '</dt>';

        static::$dl .= $str;
        return $this;
    }

    function setDd($name, $atr=false)
    {
        $str .= '<dd ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!$name)
            throw new Exception(NO_NAME . 'dd!');

        $str .= $name . '</dd>';

        static::$dl .= $str;
        return $this;
    }

    public static function getForm($atr=false)
    {
        $str = '<form ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);

        $str .= '>';

        if (!static::$input)
            throw new Exception(NO_BUILD . 'input!');

        $str .= static::$input;
        static::$input = '';

        $str .= '</form>';

        return $str;
    }
    
    function setInput($txt_name, $end, $atr=false, $check=false)
    {
        $str .= '<input ';

        if (is_array($atr))
            $str .= static::arrToAtr($atr);
        
        if($check)
            $str .= 'checked ';

        $str .= '> ';

        if ($txt_name)
            $str .= $txt_name . $end;

        static::$input .= $str;
        return $this;
    }
}