<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeControllerModuls();
class TestController extends ControlManagerBase
{
    protected static $control=null;
    protected $class_name="";
    public static function initController()
    {
        TestController::$control=new TestController();

    }
    function __construct()
    {
        $this->class_name=get_class($this);
        parent::__construct($this->class_name);
        $this->callControlFunction();
    }
    public function test()
    {
        ModelManagerBase::selectQuery(array("EmpFirstName","EmpLastName","EmpPhone","EmpEmail"),"chuntesttable",array(),"Order by EmpPhone asc");
        ViewManagerBase::initRender($this->class_name);
    }

}
TestController::initController();
?>