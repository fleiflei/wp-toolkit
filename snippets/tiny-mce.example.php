<?php
/**
 * Created by PhpStorm.
 * User: flei
 * Date: 11/02/17
 * Time: 19:58
 */


function flei_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('mce_buttons_2', __NAMESPACE__ . '\\flei_mce_buttons_2');


/*
* Callback function to filter the MCE settings
*/

function flei_mce_before_init_insert_formats($init_array)
{

// Define the style_formats array

    $style_formats = array(
        /*
        * Each array child is a format with it's own settings
        * Notice that each array has title, block, classes, and wrapper arguments
        * Title is the label which will be visible in Formats menu
        * Block defines whether it is a span, div, selector, or inline style
        * Classes allows you to define CSS classes
        * Wrapper whether or not to add a new block-level element around any selected elements
        */

        array(
            'title' => 'Button, grau (default)',
            'selector' => 'a',
            'classes' => 'btn btn-default',
//            'wrapper' => true,
//            'styles' => array(
//                'background' => 'gray',
//                'color' => 'white',
//                'padding' => '5px'
//            )

        ),

        array(
            'title' => 'Button, dunkelgrau',
            'selector' => 'a',
            'classes' => 'btn btn-dark',
//            'wrapper' => true,

        ),

        array(
            'title' => 'Button, hellgrau',
            'selector' => 'a',
            'classes' => 'btn btn-light',
//            'wrapper' => true,

        ),

        array(
            'title' => 'Button, rot',
            'selector' => 'a',
            'classes' => 'btn btn-red',
        ),

        array(
            'title' => 'Button, weiß',
            'selector' => 'a',
            'classes' => 'btn btn-white',
        ),

        array(
            'title' => 'hellgrauer Text',
//            'selector' => 'a',
            'block' => 'span',
            'classes' => 'text-gray-light',
//            'wrapper' => true,

        ),
        array(
            'title' => 'roter Text',
//            'selector' => 'a',
            'block' => 'span',
            'classes' => 'text-brand-primary',
//            'wrapper' => true,

        ),
        array(
            'title' => 'Überschrift ohne Linie',
            'selector' => 'h1,h2,h3,h4,h5,h6,.pseudo-title',
//            'block' => 'span',
            'classes' => 'no-line',
        ),
        array(
            'title' => 'Linie unter Überschrift, linksbündig',
            'selector' => 'h1,h2,h3,h4,h5,h6,.pseudo-title',
//            'block' => 'span',
            'classes' => 'title-line',
//            'wrapper' => true,

        ),
        array(
            'title' => 'Linie unter Überschrift, zentriert',
            'selector' => 'h1,h2,h3,h4,h5,h6,.pseudo-title',
//            'block' => 'span',
            'classes' => 'title-line-centered',
//            'wrapper' => true,

        ),

        array(
            'title' => 'Linie unter Überschrift, rechtsbündig',
            'selector' => 'h1,h2,h3,h4,h5,h6,.pseudo-title',
//            'block' => 'span',
            'classes' => 'title-line-right',
//            'wrapper' => true,
        ),


        array(
            'title' => 'wie Überschrift',
//            'selector' => 'h1,h2,h3,h4,h5,h6',
            'block' => 'span',
            'classes' => 'pseudo-title',
        ),



//        array(
//            'title' => 'Blue Button',
//            'block' => 'span',
//            'classes' => 'blue-button',
//            'wrapper' => true,
//        ),
//        array(
//            'title' => 'Red Button',
//            'block' => 'span',
//            'classes' => 'red-button',
//            'wrapper' => true,
//        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;

}

// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', __NAMESPACE__ . '\\flei_mce_before_init_insert_formats');
