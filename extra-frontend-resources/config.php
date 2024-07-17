<?php

require_once(INCLUDE_DIR.'/class.plugin.php');
require_once(INCLUDE_DIR.'/class.forms.php');

class ExtraFrontendResourcesPluginConfig extends PluginConfig {

    // Provide compatibility function for versions of osTicket prior to
    // translation support (v1.9.4)
    function translate() {
        if (!method_exists('Plugin', 'translate')) {
            return array(
                function($x) { return $x; },
                function($x, $y, $n) { return $n != 1 ? $y : $x; },
            );
        }
        return Plugin::translate('extra-frontend-resources');
    }

    function getOptions() {
        list($__, $_N) = self::translate();
        return array(
            'enable-staff' => new BooleanField(array(
                'id' => 'enableStaffFrontend',
                'label' => $__('Enable Staff Frontend Resources'),
                'default' => true,
                'configuration' => array(
                    'desc' => $__('Enable Staff Frontend Extra Frontend Resouces'))
            )),
            'staff-resouces' => new TextareaField(array(
                'id' => 'staffFrontendExtraResouces',
                'label' => $__('Staff Frontend Resources Definition'),
                'configuration' => array('html'=>false, 'rows'=> 10, 'cols'=> 80),
                'hint' => $__(htmlspecialchars('Use "<script></script>", "<style></style>" or "<link>". Place one resource entry per line')),
                'default' => '',
            )),
        );
    }

    function pre_save(&$config, &$errors) {
        list($__, $_N) = self::translate();
        global $msg;
        if (!$errors)
            $msg = $__('Configuration updated successfully');
        return !$errors;
    }
}

?>
