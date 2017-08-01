    <?php 

    class Model
    { 
        protected $args;

        public function __construct()
        {

        }

        public static function selectMulti($multiple=false, $size, $class, $name, $arr)
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
                    
            foreach ($arr as $key => $val)
            {
                $str .= '<option ';
                if ($key == 'disabled')
                    $str .= $key . ' ';
                if ($key == 'selected')
                    $str .= $key . ' ';
                if ($key == 'value')
                    $str .= 'value=\'' .$val. '\' ';
                if ($key == 'name')
                    $str .= ''
                $str .= '>';
            }
            
               // <option value="American">American flamingo</option>
                
            $str .= '</select>';

            return $str;
        }
    }

    $arr = [array('selected'=>true, 'value'=>123),
            array ('disabled'=>true, 'value'=>321)
           ];

$str = Model::selectMulti(true, 2, 'class', 'name', $arr);
echo $str;
