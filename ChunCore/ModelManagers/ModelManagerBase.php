<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeModelManagerModuls();
class ModelManagerBase extends BaseDatabaseManager
{
    public static  $model_manager=null;
    public static $models=null;
    protected static $base_database_manager=null;
    public  static function initModelManagerBase()
    {
        ModelManagerBase::$base_database_manager=new BaseDatabaseManager();
    }
    public static function initModelManager()
    {
        ModelManagerBase::$model_manager=new ModelManagerBase();
    }
    public static function selectQuery($out_put_fields,$table,$where_clauses,$other_clauses="")
    {
        $query_string="Select ";
        foreach($out_put_fields as $out_put_field)
        {
            $query_string=$query_string.$out_put_field.",";
        }
        $query_string=substr($query_string,0,strlen($query_string)-1);
        $query_string=$query_string." ";
        $query_string=$query_string."From ".$table;
        if(!empty($where_clauses))
        {
            $query_string=$query_string." Where ";
        }
        foreach($where_clauses as $where_clause)
        {
            $query_string=$query_string.$where_clause." ";
        }
        $query_string=$query_string." ".$other_clauses;
        ModelManagerBase::$base_database_manager->queryFromDb($query_string,$table);
    }
    public static function updateQuery($set_fields,$table,$where_clauses)
    {
        $query_string="Update ".$table." SET ";
        foreach($set_fields as $set_field)
        {
            $query_string=$query_string.$set_field.",";
        }
        $query_string=substr($query_string,0,strlen($query_string)-1);
        $query_string=$query_string." ";
        if(!empty($where_clauses))
        {
            $query_string=$query_string." Where ";
        }
        foreach($where_clauses as $where_clause)
        {
            $query_string=$query_string.$where_clause." ";
        }
        ModelManagerBase::$base_database_manager->queryFromDb($query_string,$table);
    }
    public static function deleteQuery($table,$where_clauses)
    {
        $query_string="Delete From ".$table;
        if(!empty($where_clauses))
        {
            $query_string=$query_string." Where ";
        }
        foreach($where_clauses as $where_clause)
        {
            $query_string=$query_string.$where_clause." ";
        }
        ModelManagerBase::$base_database_manager->queryFromDb($query_string,$table);
    }
    public static function insertQuery($insert_fields,$table,$values)
    {
        $query_string="Insert Into ".$table." (";
        foreach($insert_fields as $insert_field)
        {
            $query_string=$query_string.$insert_field.",";
        }
        $query_string=substr($query_string,0,strlen($query_string)-1);
        $query_string=$query_string.") VALUES (";
        foreach($values as $value)
        {
            $query_string=$query_string."'".$value."',";
        }
        $query_string=substr($query_string,0,strlen($query_string)-1);
        $query_string=$query_string.")";
        ModelManagerBase::$base_database_manager->queryFromDb($query_string,$table);


    }


}
ModelManagerBase::initModelManagerBase();
//ModelManagerBase::initModelManager();
?>