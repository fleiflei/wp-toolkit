<?php

if (function_exists('icl_get_languages')):
    add_filter('wp_nav_menu_items', 'add_lang_menu_item', 10, 2);

    function add_lang_menu_item($items, $args)
    {
        $languages = icl_get_languages('skip_missing=1');

        if ($args->theme_location == 'primary_navigation' && 1 < count($languages)) {
            $items .= '<li class="language">';

            $counter = 0;
            foreach ($languages as $idx => $l) {
                $counter++;
                $items .= '<a href="' . $l['url'] . '"';

                $items .= ($l['active'] ? ' class="active"' : '');

                $items .= '>' . $l['code'] . '</a>';

                if ($counter < (count($languages))) {
                    $items .= ' | ';
                }
            }
            $items .= '</li>';
        }

        return $items;
    }
endif;
