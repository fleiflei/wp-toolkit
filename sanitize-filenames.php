<?php

add_filter('sanitize_file_name', 'flei_sanitize_filename');

/**
 * Removes/replaces special characters from filenames while uploading in order
 * to avoid problems with filenames with special characters on some systems.
 *
 * This is yet a rather blunt solution, converting any filename into
 * "typical WP slug style" strings AND REMOVING some characters..
 *
 * There are solutions using iconv('UTF-8','ASCII//TRANSLIT', $file) which
 * apparently do not work the same on all systems, due to PHP inconsistencies
 *
 * @param $file
 *
 * @return string
 */

function flei_sanitize_filename($file)
{
  $ext = end(explode('.', $file));
  $file = str_replace('.'.$ext, '', $file);

  return remove_accents($file).'.'.$ext;
}
