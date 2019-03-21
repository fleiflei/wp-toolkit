<?php

/**
 * Is supposed to give visual feedback on which environment you are using. Shows the WP admin bar with red/yellow ribbon background when User ID == 1 && WP_ENV == production
 *
 * @Todo: this needs more explanation
 * @Todo: maybe include a backend option page for setting the criteria for showing colors
 *
 */

function admin_bar_ribbon_style()
{

    $show_ribbon_admin_bar = apply_filters('flei/toolkit/ribbon_admin_bar/enable', get_current_user_id() == 1);

    if ($show_ribbon_admin_bar) { // only show to first admin (e.g. a developer?)

        $danger_theme = apply_filters('flei/toolkit/ribbon_admin_bar/themes/danger', array(
            'rgba_1' => '255,255,255,.5',
            'rgba_2' => '255,0,0,.4',
        ));

        $warning_theme = apply_filters('flei/toolkit/ribbon_admin_bar/themes/warning', array(
            'rgba_1' => '255,235,59,.45',
            'rgba_2' => '0,0,0,0',
        ));

        $notice_theme = apply_filters('flei/toolkit/ribbon_admin_bar/themes/notice', array(
            'rgba_1' => '255,255,255,.125',
            'rgba_2' => '0,0,0,0',
        ));

        $current_theme = $danger_theme;

        $env = 'production';

        if (function_exists('env') && env('WP_ENV')) {
            $env = env('WP_ENV');
        }

        $env = apply_filters('flei/toolkit/ribbon_admin_bar/env', $env);

        switch ($env) {
            case 'stage':
            case 'staging':
                $current_theme = $warning_theme;
                break;
            case 'development':
                $current_theme = $notice_theme;
                break;
            case 'production':
            default:
                // leave unchanged
        }

        $current_theme =  apply_filters('flei/toolkit/ribbon_admin_bar/themes/current', $current_theme);

        echo '<style>#wpadminbar {
    background-image: linear-gradient(315deg, rgba(' . $current_theme['rgba_1'] . ') 0%, rgba(' . $current_theme['rgba_1'] . ') 20%, rgba(' . $current_theme['rgba_2'] . ') 20%, rgba(' . $current_theme['rgba_2'] . ') 40%, rgba(' . $current_theme['rgba_1'] . ') 40%, rgba(' . $current_theme['rgba_1'] . ') 60%, rgba(' . $current_theme['rgba_2'] . ') 60%, rgba(' . $current_theme['rgba_2'] . ') 80%, rgba(' . $current_theme['rgba_1'] . ') 80%, rgba(' . $current_theme['rgba_1'] . ') 100%);
    background-size:125px;
    }
</style>';
    }
}

add_action('wp_print_scripts', __NAMESPACE__ . '\\admin_bar_ribbon_style');