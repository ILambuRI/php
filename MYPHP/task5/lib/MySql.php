<?php
include 'iWorkData.php';
class MySql implements iWorkData
{
    public function __construct()
    {
        if (!$this->link = mysql_connect('localhost', 'user1', 'tuser1')) 
        {
            echo "No connect MySql!";
            exit();
        }

        if (!mysql_select_db('user1', $this->link))
        {
                echo "No connect DB!";
                    exit();
        }
    }

    public function saveData($key, $val)
    {
        $sql    = 'SELECT * FROM MY_TEST';
        $result = mysql_query($sql, $this->link);

        if (!$result)
        {
                echo "No result!";
                    echo 'MySQL Error: ' . mysql_error();
                    exit;
        }


        while ($row = mysql_fetch_assoc($result))
        {
            echo $row['key'] . "<br>";
            echo $row['data'] . "<br>";
        }

    }

    public function getData($key)
    {
        return $_COOKIE[$key];
    }

    public function deleteData($key)
    {
        setcookie($key, '', time()-1);
        unset($_COOKIE[$key]);
    }
}

$msql = new MySql();
$msql->saveData(1,1);
