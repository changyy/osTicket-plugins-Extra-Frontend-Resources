<?php

require_once(INCLUDE_DIR.'class.plugin.php');
require_once('config.php');

class ExtraFrontendResourcesPlugin extends Plugin {
    var $config_class = 'ExtraFrontendResourcesPluginConfig';
    static $frontendResources = '';

    function bootstrap() {
        $config = $this->getConfig();
        if ($config->get('enable-staff')) {
            // Add Staff Extra Frontend resouces
            ExtraFrontendResourcesPlugin::$frontendResources = $config->get('staff-resouces');
            if (strlen(ExtraFrontendResourcesPlugin::$frontendResources) > 0) {
                // `include/staff/header.inc.php:58`: add `Signal::send('staff.header.extra')`
                Signal::connect('staff.header.extra', function($extra) {
                    global $thisstaff, $ost;
                    if (!$thisstaff || !$thisstaff->isAdmin())
                        return;

                    if ($ost) {
                        $ost->addExtraHeader(ExtraFrontendResourcesPlugin::$frontendResources);
                    }
                });
            }
        }
    }

    function enable() {
        return parent::enable();
    }
}
