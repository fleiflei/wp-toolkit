<?php
/**
 * Various Functions and Tools
 *
 */

namespace Flei;

function emailize($text, $link_class = '')
{
  $regex = '/(\S+@\S+\.\S+)/';
  $replace = '<a href="mailto:$1"'.($link_class ? ' class="'.$link_class.'"' : '').'>$1</a>';

  return preg_replace($regex, $replace, $text);
}

function urlize($text, $link_class = '', $target = '_blank', $url_only = false)
{
  $regex = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
  $replace = '<a href="http$2://$4" '.($target ? ' target="'.$target.'"' : '').' title="$0"'.($link_class ? ' class="'.$link_class.'"' : '').'>$4</a>';
  if ($url_only) {
    $replace = 'http$2://$4';
  }

  return preg_replace($regex, $replace, $text);
}

/**
 *
 * Handy function to directly get the url from wp_get_attachment_image_src() without having to go through the array
 *
 * @param $attachment_id
 * @param null $size
 * @param null $icon
 *
 * @return bool|mixed
 */
function flei_get_attachment_src_url($attachment_id, $size = null, $icon = null)
{
  if (is_array($attachment_id) && isset($attachment_id['ID'])) {
    $attachment_id = $attachment_id['ID'];
  }

  $src_array = wp_get_attachment_image_src($attachment_id, $size, $icon);
  if (is_array($src_array)) {
    return $src_array[0];
  }

  return false;
}
