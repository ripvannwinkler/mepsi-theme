<?php

namespace MEPSI\Widgets;

use Elementor\Plugin;

if (!defined('ABSPATH')) {
    exit;
}

class Bootstrap
{
    protected static $instance = null;

    public static function get_instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    protected function __construct()
    {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'register_categories']);
        add_action('elementor/frontend/after_register_scripts', [ $this, 'register_scripts' ]);
    }
    
    protected function include_widget_files()
    {
        require_once(__DIR__ . "/rainbowDivider.php");
    }

    public function register_categories($elements_manager)
    {
        $elements_manager->add_category(
            'mepsi',
            [
                'title' => __('MEPSI', 'mepsi'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    public function register_widgets()
    {
        $this->include_widget_files();
        Plugin::instance()->widgets_manager->register_widget_type(new RainbowDivider());
    }

    public function register_scripts()
    {
        wp_register_style('rainbow-divider', get_stylesheet_directory_uri() . '/lib/widgets/rainbowDivider.css');
    }
}

Bootstrap::get_instance();
