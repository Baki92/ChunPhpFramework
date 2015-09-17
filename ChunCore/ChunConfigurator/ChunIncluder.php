<?php
class ChunIncluder
{
    public static function includeControllerModuls()
    {
        ChunIncluder::includeConfiguratorModul();
        require_once(CONTROL_MANAGER_PATH."ControlManagerBase".DEFAULT_FILE_EXT);
        require_once(VIEW_MANAGER_PATH."ViewManagerBase".DEFAULT_FILE_EXT);
    }
    public static function includeModelModuls()
    {
        ChunIncluder::includeConfiguratorModul();
    }
    public static function includeViewModuls()
    {
        ChunIncluder::includeConfiguratorModul();
    }
    public static function includeControlManagerModuls()
    {
        ChunIncluder::includeConfiguratorModul();
    }
    public static function includeModelManagerModuls()
    {
        ChunIncluder::includeConfiguratorModul();
    }
    public static function includeViewManagerModuls()
    {
        ChunIncluder::includeConfiguratorModul();
    }
    public static function includeConfiguratorModul()
    {
        require_once("ChunConfigurator.php");
    }

}

?>