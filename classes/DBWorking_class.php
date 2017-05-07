<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.04.17
 * Time: 14:10
 */
class DBWorking_class
{
    var $dbconnection, $query, $result;

    function __construct($dbname, $password)
    {
        $this->dbconnection =
            pg_connect("host=localhost port=5432 dbname=".$dbname." user=postgres password=".$password);
        //$this->dbconnection = pg_connect($connectionString);
    }

    public function query($query)
    {
        $arr = array();
        $this->query = $query;
        $this->result = pg_query($this->dbconnection, $this->query);

        while ($line = pg_fetch_array($this->result,null, PGSQL_NUM))
        {
            /*$str = "";
            foreach($line as $item)
            {
                $str = $str.$item;
            }*/
            array_push($arr,$line);
        }
        return $arr;
    }
}

?>