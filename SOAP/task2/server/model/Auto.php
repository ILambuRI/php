<?php
class Auto
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function getAllDistinct()
    {
        $result[] = $this->db->execute('SELECT DISTINCT mark FROM auto', []);
        $result[] = $this->db->execute('SELECT DISTINCT model FROM auto', []);
        $result[] = $this->db->execute('SELECT DISTINCT year FROM auto', []);
        $result[] = $this->db->execute('SELECT DISTINCT engine FROM auto', []);
        $result[] = $this->db->execute('SELECT DISTINCT color FROM auto', []);
        $result[] = $this->db->execute('SELECT DISTINCT speed FROM auto', []);

        return json_encode($result);
    }

    public function getAutoList()
    {
        $result = $this->db->execute('SELECT id, mark, model FROM auto', []);
        return json_encode($result);
    }

    public function getAutoById($id)
    {
        $id = json_decode($id);
        if ($id)
        {
            $sql = 'SELECT mark, model, year, engine, color, speed, price FROM auto WHERE id = :id';
            $result = $this->db->execute($sql, ['id' => $id]);
        }
        else
        {
            $result = new SoapFault("getAutoById()", ERR_TO_CLIENT_NO_ID);
        }
        
        return json_encode($result);
    }

    public function getAutoByParams($params)
    {
        $params = json_decode($params, true);

        if ($params['year'])
        {
            $sql = 'SELECT id, mark, model, year, engine, color, speed, price FROM auto WHERE year = :year';

            if (count($params) > 1)
            {
                foreach ($params as $key => $value)
                {
                    if ($key == 'year') continue;
                    $sql .= ' AND ' .$key. ' = :' .$key;
                }
            }

            $result = $this->db->execute($sql, $params);
        }
        else
        {
            $result = new SoapFault("getAutoByParams()", ERR_TO_CLIENT_NO_YEAR);
        }
        
        return json_encode($result);
    }

    public function addOrder($params)
    {
        $params = json_decode($params,true);
        if(is_array($params))
        {
            $sql = 'INSERT INTO `order`(`auto_id`, `firstname`, `lastname`, `payment`)
            VALUES ('.$params['auto_id'].',\''.$params['firstname'].'\',\''.$params['lastname'].'\',\''.$params['payment'].'\')';

            $result = $this->db->execute($sql, []);
        }
        else
        {
            $result = new SoapFault("addOrder()", ERR_TO_CLIENT_NO_ARRAY);
        }

        return json_encode($result);
    }

}