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

    if (get_current_user_id() == 1) { // only show to first admin (e.g. a developer?)

        $color_rgb_1 =  '255,235,59';
        $color_rgb_2 = '0,0,0';
        $transparency_1 = '.314';
        $transparency_2 = '0';

        switch (env('WP_ENV')) { // @todo check for function env()
            case 'stage':
            case 'staging':
                break;
            case 'development':
                $transparency_1 = 0.125;
                $color_rgb_1 = '255,255,255';
                break;
            case 'production':
            default:
                $color_rgb_2 = '255,0,0';
                $transparency_1 = .4;
                $transparency_2 = $transparency_1;
        }

        if ($transparency_1 || $transparency_2) {

            echo '<style>#wpadminbar {
    background-image: linear-gradient(315deg, rgba(' . $color_rgb_1 . ',' . $transparency_1 . ') 0%, rgba(' . $color_rgb_1 . ',' . $transparency_1 . ') 20%, rgba(' . $color_rgb_2 . ',' . $transparency_2 . ') 20%, rgba(' . $color_rgb_2 . ',' . $transparency_2 . ') 40%, rgba(' . $color_rgb_1 . ',' . $transparency_1 . ') 40%, rgba(' . $color_rgb_1 . ',' . $transparency_1 . ') 60%, rgba(' . $color_rgb_2 . ',' . $transparency_2 . ') 60%, rgba(' . $color_rgb_2 . ',' . $transparency_2 . ') 80%, rgba(' . $color_rgb_1 . ',' . $transparency_1 . ') 80%, rgba(' . $color_rgb_1 . ',' . $transparency_1 . ') 100%);
    background-size:125px;
    }

</style>';
        }
    }
}

add_action('admin_head', __NAMESPACE__ . '\\admin_bar_ribbon_style');