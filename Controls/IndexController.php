<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeControllerModuls();
class IndexController extends ControlManagerBase
{
    protected static $control=null;
    protected $class_name="";
    public static function initController()
    {
        IndexController::$control=new IndexController();

    }
    function __construct()
    {
        $this->class_name=get_class($this);
        parent::__construct($this->class_name);
        $this->callControlFunction();
    }
    protected function testWriteOut($text="")
    {
        echo $text;
    }
    protected function index($parameter="")
    {
        ViewManagerBase::$MODELS["say"]=$parameter;
        ViewManagerBase::initRender($this->class_name);
    }
}
IndexController::initController();
?>