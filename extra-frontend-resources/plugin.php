<?php
set_include_path(get_include_path().PATH_SEPARATOR.dirname(__file__).'/include');
return array(
    'id' =>             'extra-frontend-resources', # notrans
    'version' =>        '1.0.0',
    'name' =>           /* trans */ 'Extra Frontend Resources',
    'author' =>         'Yuan-Yi Chang',
    'description' =>    /* trans */ 'Adding extra frontend resources',
    'url' =>            'http://github.com/changyy/osTicket-plugins-extra-frontend-resources',
    'plugin' =>         'extraFrontendResourcesPlugin.php:ExtraFrontendResourcesPlugin',
);

?>
