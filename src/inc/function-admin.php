<?php
/**
 * @package coffeecoffee
 *
 * ====================
 * ADMIN PAGE
 * ====================
 */

function coffee_add_admin_page()
{
    add_menu_page('Coffee, Coffee Theme Options', 'Coffee, Coffee', 'manage_options', 'flapjack-coffee', 'coffee_theme_create_page', '', 110);
}

add_action('admin_menu', 'coffee_add_admin_page');

/**
 * Generate the admin page
 */
function coffee_theme_create_page()
{

}
