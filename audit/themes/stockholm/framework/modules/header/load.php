<?php

include_once QODE_FRAMEWORK_MODULES_ROOT_DIR . '/header/header-helper-functions.php';

foreach ( glob( QODE_FRAMEWORK_MODULES_ROOT_DIR . '/header/*/helper-functions.php' ) as $module_load ) {
	include_once $module_load;
}