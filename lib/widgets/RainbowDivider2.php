<?php

namespace MEPSI\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
}

class RainbowDivider extends Widget_Base
{
    public static $slug = 'rainbow-divider';

    public function get_name()
    {
        return self::$slug;
    }

    public function get_title()
    {
        return __('Rainbow Divider', self::$slug);
    }

    public function get_icon()
    {
        return 'eicon-divider';
    }

    public function get_categories()
    {
        return [ 'mepsi' ];
    }

    public function get_style_depends()
    {
        return [ 'rainbow-divider' ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'settings_section',
            [
                'label' => __('Settings', 'mepsi'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' => __('Divider Width', 'mepsi'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'size_units' => [ '%', 'px', 'vw' ],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rainbow-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label' => __('Alignment', 'mepsi'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'center',
                'options' => [
                    'left' => [
                        'title' => __('Left', 'mepsi'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'mepsi'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'mepsi'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rainbow-divider' => 'margin: 0 auto; margin-{{VALUE}}: 0;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        echo '<div class="rainbow-divider"></div>';
    }
}
