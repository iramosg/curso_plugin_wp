<?php

/*
Plugin Name: Snappy List Builder
Plugin URI: http://www.igorrg.com.br/
Description: Desenvolvimento de plugin com o curso da Udemy!
Version: 1.0
Author: Igor Ramos @ Nova Código
Author URI: http://www.igorrg.com.br/sobre
License: GPL2
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: snappy-list-builder-2
*/

/* !0. TABLE OF CONTENTS */
/* 

    1. HOOKS
        1.1 - registers all our custom shortcodes
        1.2 - register custom admin column headers
        1.3 - register column admin column data

    2. SHORTCODES
        2.1 - slb_register_shortcodes()
        2.2 - slb_form_shortcode()

    3. FILTERS
        3.1 - slb_subscriber_column_headers()
        3.2 - slb_subscriber_column_data()
        3.2.2 - slb_register_custom_admin_titles()
        3.2.3 - slb_custom_admin_titles()
        3.3 - slb_list_column_headers()
        3.4 - slb_list_column_data()

    4. EXTERNAL SCRIPTS

    5. ACTIONS

    6. HELPERS

    7. CUSTOM POST TYPES

    8. ADMIN PAGES

    9. SETTINGS
*/


/* 1. HOOKS */

//1.1
//Hint: registers all our custom shortcodes on init
add_action('init', 'slb_register_shortcodes');

//1.2
//Hint: registers all our custom shortcodes on init
add_filter('manage_edit-slb_subscriber_columns', 'slb_subscriber_column_headers');
add_filter('manage_edit-slb_list_columns', 'slb_list_column_headers');

//1.3
//Hint: Register custom admin column data
add_filter('manage_slb_subscriber_posts_custom_column', 'slb_subscriber_column_data', 1, 2);
add_action(
    'admin_head-edit.php',
    'slb_register_custom_admin_titles'
);


/* 2. SHORTCODES */

//2.1
function slb_register_shortcodes() {

    add_shortcode('slb_form', 'slb_form_shortcode');
}

//2.2
function slb_form_shortcode($args, $content = "") {

    // Setup out output variable - the form html
    $output = '
        <div class="slb">
            <form id="slb_form" name="slb_form" class="slb_form" method="POST">
                <p class="slb-input-container">
                    <label>Your Name</label><br />
                    <input type="text" name="slb_fname" placeholder="First Name">
                    <input type="text" name="slb_lname" placeholder="Last Name">
                </p>

                <p class="slb-input-container">
                    <label>Your E-mail</label><br />
                    <input type="text" name="slb_email" placeholder="ex. you@email.com">
                </p>';

    // Including content in our form html if content is passed into the function
    if(strlen($content)):
        $output .= '<div class="slb-content">' . wpautop($content) . '</div>';
    endif;

    // Completing our form html
    $output .= '
                <p class="slb-input-container">
                    <input type="submit" name="slb_submit" value="Sign Me Up!">
                </p>
            </form>
        </div>
    ';

    // Return our results/html
    return $output;
}



/* 3. FILTERS */

//3.1
function slb_subscriber_column_headers($columns) {

    //Creating custom column header data
    $columns = array(
        'cb' => '<input type="checkbox">',
        'title' => __('Subscriber Name'),
        'email' => __('Email Address')
    );

    // Return new columns
    return $columns;
}

// 3.2
function slb_subscriber_column_data($column, $post_id) {

    // Setup our return text
    $output = '';

    switch($column) {
        case 'title':
            // Get the custom name data
            $fname = get_field('slb_fname', $post_id);
            $lname = get_field('slb_lname', $post_id);
            $output .= $fname . ' ' . $lname;
            break;
        case 'email':
            // Get the custom email data
            $email = get_field('slb_email', $post_id);
            $output .= $email;
            break;
    }

    // Echo the output
    echo $output;
}

// 3.2.2
// Hint: registers special custom admin title columns
function slb_register_custom_admin_titles() {
    add_filter(
        'the_title',
        'slb_custom_admin_titles',
        99,
        2
    );
}

// 3.2.3
// Hint: handles custom admin title "title" column data for post types without titles
function slb_custom_admin_titles($title, $post_id) {

    global $post;
    $output = $title;

    if( isset($post->post_type) ):
        switch( $post->post_type ) {
            case 'slb_subscriber':
                $fname = get_field('slb_fname', $post_id);
                $lname = get_field('slb_lname', $post_id);
                $output = $fname . ' ' . $lname;
                break;
        }
    endif;

    return $output;
}

//3.3
function slb_list_column_headers($columns) {

    //Creating custom column header data
    $columns = array(
        'cb' => '<input type="checkbox">',
        'title' => __('List Name'),
    );

    // Return new columns
    return $columns;
}

// 3.4
function slb_list_column_data($column, $post_id) {

    // Setup our return text
    $output = '';

    switch($column) {
        case 'example':
            // // Get the custom name data
            // $fname = get_field('slb_fname', $post_id);
            // $lname = get_field('slb_lname', $post_id);
            // $output .= $fname . ' ' . $lname;
            break;
    }

    // Echo the output
    echo $output;
}



/* 4. EXTERNAL SCRIPTS */


/* 5. ACTIONS */


/* 6. HELPERS */


/* 7. CUSTOM POST TYPES */


/* 8. ADMIN PAGES */


/* 9. SETTINGS */

