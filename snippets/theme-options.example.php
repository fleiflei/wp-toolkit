<?php

/**
 * Theme Options
 * Available in WP Backend through Design > Customize
 *
 * use get_theme_mod('option_name') to retrieve options
 *
 */

namespace Roots\Sage\Init;

function flei_customize_register($wp_customize)
{
  /**
   * Project Settings
   */

  // first declare settings
  $wp_customize->add_setting(
    'flei_projects_page_id',
    [
      'default'   => 0,
      'transport' => 'refresh',
    ]
  );

  $wp_customize->add_setting(
    'flei_social_fb_url',
    [
      'default'   => 0,
      'transport' => 'refresh',
    ]
  );

  $wp_customize->add_setting(
    'flei_social_xing_url',
    [
      'default'   => 0,
      'transport' => 'refresh',
    ]
  );

  $wp_customize->add_setting(
    'flei_social_linkedin_url',
    [
      'default'   => 0,
      'transport' => 'refresh',
    ]
  );

  // declare sections
  $wp_customize->add_section(
    'flei_projects_section',
    [
      'title'    => __('Projekte', 'flei'),
      'priority' => 30,
    ]
  );

  $wp_customize->add_section(
    'flei_social_section',
    [
      'title'    => __('Social Media', 'flei'),
      'priority' => 30,
    ]
  );

  // add control elements to sections
  $wp_customize->add_control(
    new \WP_Customize_Control(
      $wp_customize,
      'flei_projects_page_id',
      [
        'label'    => __('Seite "Projekte":', 'flei'),
        'section'  => 'flei_projects_section',
        'settings' => 'flei_projects_page_id',
        'type'     => 'dropdown-pages',
      ]
    )
  );

  $wp_customize->add_control(
    new \WP_Customize_Control(
      $wp_customize,
      'flei_social_fb_url',
      [
        'label'    => __('URL Facebook', 'flei'),
        'section'  => 'flei_social_section',
        'settings' => 'flei_social_fb_url',
        'type'     => 'text',
      ]
    )
  );

  $wp_customize->add_control(
    new \WP_Customize_Control(
      $wp_customize,
      'flei_social_xing_url',
      [
        'label'    => __('URL XING', 'flei'),
        'section'  => 'flei_social_section',
        'settings' => 'flei_social_xing_url',
        'type'     => 'text',
      ]
    )
  );

  $wp_customize->add_control(
    new \WP_Customize_Control(
      $wp_customize,
      'flei_social_linkedin_url',
      [
        'label'    => __('URL LinkedIn', 'flei'),
        'section'  => 'flei_social_section',
        'settings' => 'flei_social_linkedin_url',
        'type'     => 'text',
      ]
    )
  );
}

add_action('customize_register', __NAMESPACE__.'\\flei_customize_register');
