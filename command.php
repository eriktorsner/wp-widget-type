<?php

if ( ! class_exists( 'WP_CLI' ) ) {
	return;
}

/**
 * List widget types.
 *
 */
$listWidgets = function($args, $assoc_args)
{
    $widgetTypes = $GLOBALS['wp_widget_factory']->widgets;

    $ret = [];
    foreach ($widgetTypes as $widgetType) {
        $className = get_class($widgetType);
        $ret[$className] = [
            'class_name' => $className,
            'id_base' => $widgetType->id_base,
        ];
    }

    print_r($assoc_args);
    $format = isset($assoc_args['format']) ? $assoc_args['format'] : 'table';
    WP_CLI\Utils\format_items($format, $ret, array( 'class_name', 'id_base'));
};


WP_CLI::add_command( 'widget-type list', $listWidgets);


