<?php 

class Model
{ 
    protected $args;

    public function __construct()
    {
        $this->setArray(['%TITLE%'=>TITLE,
                       '%INFO%'=>INFO,
                       '%NAME%'=>'',
                       '%NAME_HELP%'=>'',
                       '%SUBJ%'=>'',
                       '%SUBJ_HELP%'=>'',
                       '%EMAIL%'=>'',
                       '%EMAIL_HELP%'=>'',
                       '%MSG%'=>'',
                       '%MSG_HELP%'=>'',
                       '%SEND_SUCCESS%'=>''
                       ]);
    }

    public function setArray(array $arr)
    {	
        if ($_SESSION['mail'])
        {
            $arr['%INFO%'] = SEND_SUCCESS;
            unset($_SESSION['mail']);
        }
        $this->args = $arr;
    }

    public function getArray()
    {	    
        return $this->args;
    }

    public function makeArrArgs()
    {
        $args_default = $this->getArray();
        $args['%NAME%'] = $this->checkForm($_POST['name'], 'str');
        $args['%SUBJ%'] = $this->checkForm($_POST['subj'], 'str');
        $args['%EMAIL%'] = $this->checkForm($_POST['email'], 'email');
        $args['%MSG%'] = $this->checkForm($_POST['msg'], 'text');
        $arr = $args + $args_default;
        $this->setArray($arr);
    }

    public function checkForm($data, $type)
    {
        if (strlen($data) < 3)
            return $data = '';
            
        switch ($type):
        case 'str':
            $quotes = array ("\t", "\n", "\r", "*", "%", "<", ">", "?", "!",
                             "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
            $goodquotes = array ("-", "+", "#");
            $repquotes = array ("\-", "\+", "\#");
            $data = trim(strip_tags($data));
            $data = str_replace($quotes, '', $data);
            $data = str_replace ($goodquotes, $repquotes, $data);
            $data = ereg_replace(" +", " ", $data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
        break;
        case 'text':
            $data = htmlspecialchars(trim(strip_tags($data)));
        break;
        case 'email':
            $data = trim(strip_tags($data));
            $data = filter_var($data, FILTER_VALIDATE_EMAIL);
        break;
        endswitch;

        return $data;		
    }

    public function arrCheck()
    {
        $check = TRUE;
        $arr = $this->getArray();
        $arr_checked = [];
        foreach ($arr as $key => $value) 
        {
            if ($value == '')
            {
                $arr_res_checked = $this->checkValue($key);
                foreach ($arr_res_checked as $key => $value)
                {
                    $arr_checked[$key] = $value;
                }
                if (count($arr_checked) > 1)
                    $check = FALSE;
            }
            else
            {
                $arr_res[$key] = $value;
            }
        }
        $arr = $arr_checked + $arr_res + $arr;
        $this->setArray($arr);
        return $check;
    }

    public function checkValue($key)
    {
        $arr_res = [];
        switch ($key)
        {
            case '%NAME%':
                $arr_res['%NAME_HELP%'] = NO_NAME;
                $arr_res['%INFO%'] = NO_FORM;
            break;
            case '%SUBJ%':
                $arr_res['%SUBJ_HELP%'] = NO_SUBJ;
                $arr_res['%INFO%'] = NO_FORM;
            break;
            case '%EMAIL%':
                $arr_res['%EMAIL_HELP%'] = NO_EMAIL;
                $arr_res['%INFO%'] = NO_FORM;
            break;
            case '%MSG%':
                $arr_res['%MSG_HELP%'] = NO_MSG;
                $arr_res['%INFO%'] = NO_FORM; 
                break;
        }
        return $arr_res;
    }

    public function sendEmail()
    {
        $arr = $this->getArray();

        $subject= $arr['%SUBJ%'];
        $header="Content-type: text/html; charset=windows-1251 \r\n";
        $header.= "From: " .$arr['%EMAIL%']. " \r\n";
        $msg="  <html>
                <body>
                    <br> 
                    <b>From user " .$arr['%NAME%']. " !</b><br>
                    " .$arr['%MSG%']. " <br>
                    IP: " .$_SERVER["REMOTE_ADDR"]. "<br>
                    Date: " .date("F j, Y, g:i a"). "<br>
                </body>
                </html>";
        mail(EMAIL, $subject, $msg, $header);
    }		
}
