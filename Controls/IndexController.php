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
    protected function index($parameter="")
    {
        ModelManagerBase::insertQuery(array("EmpFirstName","EmpLastName","EmpPhone","EmpEmail"),"chuntesttable",array("Bakis","Baki","3346","baki@baki.com"));
        ModelManagerBase::deleteQuery("chuntesttable",array("EmpLastName='Baki'"));
        ModelManagerBase::updateQuery(array("EmpFirstName='CUHUN'","EmpLastName='Framework'"),"chuntesttable",array("id=1"));

        ModelManagerBase::selectQuery(array("EmpFirstName","EmpLastName","EmpPhone","EmpEmail"),"chuntesttable",array(),"Order by EmpPhone asc");
        ViewManagerBase::initRender($this->class_name);
    }
}
IndexController::initController();
?>