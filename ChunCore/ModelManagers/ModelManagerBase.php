<?php
require_once("../ChunCore/ChunConfigurator/ChunIncluder.php");
ChunIncluder::includeModelManagerModuls();
$mb=new ModelManagerBase();
class ModelManagerBase
{
    function __construct()
    {
        echo "Im Base model manager";
    }
}
?>