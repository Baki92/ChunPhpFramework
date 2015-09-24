<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeConfiguratorModul();
ChunIncluder::includeViewManagerModuls();
class BaseDatabaseManager
{
    private $connection=null;
    function __construct()
    {
        $this->initConnection();
    }
    private function initConnection()
    {
        //echo DATABASE_HOST;
        $this->connection=new mysqli(DATABASE_HOST,DATABASE_USER_NAME,DATABASE_PASSWORD,DATABASE_NAME);
        if($this->connection->connect_error)
        {
            die("Connection failed:".$this->connection->connect_error);
        }
    }
    public function queryFromDb($query_string,$table_name="default")
    {
       ViewManagerBase::$MODELS[$table_name]=array();
       $result=$this->connection->query($query_string);
       if(!empty($result->num_rows)) {
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   array_push(ViewManagerBase::$MODELS[$table_name], $row);
               }
           }
       }


    }
}
?>