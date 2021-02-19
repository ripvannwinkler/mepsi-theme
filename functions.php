<?php

define('THEME_DIR', get_stylesheet_directory());
define('THEME_URI', get_stylesheet_uri());

if (!defined('ABSPATH')) {
    exit;
}

require_once(THEME_DIR . '/lib/widgets/bootstrap.php');
