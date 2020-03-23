<?php

if (!function_exists('flei_mime_types')) {
  function flei_mime_types($mimes)
  {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
  }
}
add_filter('upload_mimes', 'flei_mime_types', 99, 1);
