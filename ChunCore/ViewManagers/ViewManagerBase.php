<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeViewManagerModuls();
class ViewManagerBase
{
    protected $views_paths="";
    protected $view_controller_name="";
    protected $view_folder="";
    protected $view_name="";
    protected $reques_url="";
    protected $view_path="";
    protected $url_affter_parse="";
    protected $url_parts=null;

    public static  $view_manager=null;
    public static $MODELS=null;

    function __construct($_view_controller_name)
    {
        $this->view_controller_name=$_view_controller_name;
        $this->parseControlName();
        $this->renderPage();
    }
    public static function initRender($_view_controller_name)
    {
        ViewManagerBase::$view_manager=new ViewManagerBase($_view_controller_name);
    }
    private function parseControlName()
    {
        $parse_index=strpos($this->view_controller_name,CONTROL_NAME_SECOND_PART);
        $this->view_name=substr($this->view_controller_name,0,$parse_index);
        $this->parseViewName();
    }
    private function parseViewName()
    {
        $this->reques_url=$_SERVER['REQUEST_URI'];
        $find_string=$this->view_controller_name.DEFAULT_FILE_EXT;
        $parse_index=(strpos($this->reques_url,$find_string)+(strlen($find_string)+1));
        $this->url_affter_parse=substr($this->reques_url,$parse_index);
        $this->setViewName();

    }
    private function setViewName()
    {
        $this->url_parts=array();
        array_push($this->url_parts,$this->url_affter_parse);
        if(strpos($this->url_affter_parse,EXPLODE_DELIMITER_FOR_URL)!=-1)
        {
            $this->url_parts=explode(EXPLODE_DELIMITER_FOR_URL,$this->url_affter_parse);
        }
        $this->view_name=$this->url_parts[0];
    }
    private  function renderPage()
    {
        $this->view_path="../"."Views"."/".$this->view_name."/".$this->view_name.DEFAULT_FILE_EXT;
        $models=ViewManagerBase::$MODELS;
        include($this->view_path);
    }
}
?>