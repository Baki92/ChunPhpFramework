<?php
class ChunIncluder
{
    public static function includeControllerModuls()
    {
        ChunIncluder::includeConfiguratorModul();
        require_once(CONTROL_MANAGER_PATH."ControlManagerBase".DEFAULT_FILE_EXT);
        require_once(VIEW_MANAGER_PATH."ViewManagerBase".DEFAULT_FILE_EXT);
        ChunIncluder::includeModelModuls();
    }
    public static function includeModelModuls()
    {
        ChunIncluder::includeConfiguratorModul();
        ChunIncluder::includeModelManagerModuls();
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
        require_once(MODEL_MANAGER_PATH."ModelManagerBase".DEFAULT_FILE_EXT);
        ChunIncluder::includeDatabaseManagerModuls();
    }
    public static function includeViewManagerModuls()
    {
        ChunIncluder::includeConfiguratorModul();
    }
    public static function includeDatabaseManagerModuls()
    {
        require_once(DATABASE_MANAGER_PATH."BaseDatabaseManager".DEFAULT_FILE_EXT);
    }
    public static function includeConfiguratorModul()
    {
        require_once("ChunConfigurator.php");
    }

}

?>