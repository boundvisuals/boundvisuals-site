<?php

define( 'STOCKHOLM_QODE', true );
define( 'QODE_ROOT', get_template_directory_uri() );
define( 'QODE_ROOT_DIR', get_template_directory() );
define( 'QODE_VAR_PREFIX', 'qode_' );
define( 'QODE_CSS_ROOT', QODE_ROOT . '/css' );
define( 'QODE_CSS_ROOT_DIR', QODE_ROOT_DIR . '/css' );
define( 'QODE_JS_ROOT', QODE_ROOT . '/js' );
define( 'QODE_JS_ROOT_DIR', QODE_ROOT_DIR . '/js' );
define( 'QODE_FRAMEWORK_ROOT', QODE_ROOT . '/framework' );
define( 'QODE_FRAMEWORK_ROOT_DIR', QODE_ROOT_DIR . '/framework' );
define( 'QODE_FRAMEWORK_MODULES_ROOT', QODE_ROOT . '/framework/modules' );
define( 'QODE_FRAMEWORK_MODULES_ROOT_DIR', QODE_ROOT_DIR . '/framework/modules' );
define( 'QODE_PROFILE_SLUG', 'select' );

include_once QODE_FRAMEWORK_ROOT_DIR . '/qode-fallback-helper-functions.php';
include_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode-helper-functions.php';
include_once QODE_FRAMEWORK_ROOT_DIR . '/qode-framework.php';
include_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/toolbar/toolbar-hook.php';
include_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode-dynamic-helper-functions.php';
include_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode-body-classes.php';

if ( file_exists( QODE_ROOT_DIR . '/export' ) && file_exists( QODE_ROOT_DIR . '/export/qode-export.php' ) ) {
	include_once QODE_ROOT_DIR . '/export/qode-export.php';
}

include_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/nav-menu/qode-menu.php';
require_once QODE_ROOT_DIR . '/plugins/class-tgm-plugin-activation.php';
include_once QODE_ROOT_DIR . '/plugins/plugins-activation.php';