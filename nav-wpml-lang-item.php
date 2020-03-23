<?php

if (function_exists('icl_get_languages')):
  add_filter('wp_nav_menu_items', 'add_lang_menu_item', 10, 2);

  function add_lang_menu_item($items, $args)
  {
    $languages = icl_get_languages('skip_missing=1');

    if ($args->theme_location == 'primary_navigation' && 1 < count($languages)) {
      $items .= '<li class="language">';

      $counter = 0;
      foreach ($languages as $l) {
        $counter++;
        $items .= '<a href="'.$l['url'].'"';

        $items .= ($l['active'] ? ' class="active"' : '');

        $items .= '>'.$l['code'].'</a>';
        //            $items .= ($counter < count($languages)?' | ':'');

        //            if(!$l['active']) $langs[] = '<a href="'.$l['url'].'">'.$l['translated_name'].'</a>';
        //            if (!$l['active']) $items .= '<li id="menu-item-lang-switch" class="menu-item menu-item-type-custom"><a href="' . $l['url'] . '">' . $l['native_name'] . '</a></li>';
      }
      $items .= '</li>';
    }

    return $items;
  }
endif;
