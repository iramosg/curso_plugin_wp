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

    2. SHORTCODES
        2.1 - slb_register_shortcodes()
        2.2 - slb_form_shortcode()

    3. FILTERS

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


/* 4. EXTERNAL SCRIPTS */


/* 5. ACTIONS */


/* 6. HELPERS */


/* 7. CUSTOM POST TYPES */


/* 8. ADMIN PAGES */


/* 9. SETTINGS */

