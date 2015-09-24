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
        ModelManagerBase::insertQuery(array("EmpFirstName","EmpLastName","EmpPhone","EmpEmail"),"chuntesttable",array("Bakis","Baki","3346","baki@baki.com"));
        ModelManagerBase::selectQuery(array("EmpFirstName","EmpLastName"),"chuntesttable",array("EmpLastName='Baki'"));
        var_dump(ViewManagerBase::$MODELS["chuntesttable"]);
        ModelManagerBase::deleteQuery("chuntesttable",array("EmpLastName='Baki'"));
        ModelManagerBase::updateQuery(array("EmpFirstName='OH CUHUN'","EmpLastName='LASTCHUB'"),"chuntesttable",array("id=1"));
        ModelManagerBase::selectQuery(array("EmpFirstName","EmpLastName"),"chuntesttable",array("EmpLastName='Baki'"));
        var_dump(ViewManagerBase::$MODELS["chuntesttable"]);

        ViewManagerBase::$MODELS["say"]=$parameter;

        ViewManagerBase::initRender($this->class_name);
    }
}
IndexController::initController();
?>