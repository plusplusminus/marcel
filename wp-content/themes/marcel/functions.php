<?php
/* PPM Functions */

add_action( 'wp_enqueue_scripts', 'ppm_scripts_and_styles', 999 );

function ppm_scripts_and_styles() {
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    global $brew_options;
    if (!is_admin()) {

        wp_register_script( 'third-party', get_stylesheet_directory_uri() . '/includes/js/third-party.js', array('jquery'), '3.0.0',true);
        wp_register_script( 'ppm', get_stylesheet_directory_uri() . '/includes/js/ppm.js', array('third-party','jquery'), '3.0.0',true);
        
        
        wp_enqueue_script('third-party');
        wp_enqueue_script('ppm');


    }
}

add_image_size('blog-image',266,266,true);

function child_sections($sections){
    //$sections = array();
    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Theme Options', 'peadig-framework'),
        'desc'          => __('<p class="description">Theme modifications</p>', 'ppm'),
        'fields' => array(
                array(
                        'id'=>'site_logo',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Logo', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Select main logo from media gallery', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),
                array(
                        'id'=>'site_logo_1',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Logo Inverse', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Select inverseo logo from media gallery', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),
                array(
                        'id'=>'site_favicon',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Icon', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Add a website icon', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),  
        )
    );

     $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-heart',
        'title'         => __('Social Profiles', 'ppm-framework'),
        'desc'          => __('<p class="description">Social Network URLS</p>', 'ppm'),
        'fields' => array(
           
            array(
                        'id'=>'twitter_url',
                        'type' => 'text',
                        'title' => __('Twitter', 'redux-framework-demo'),
                        'desc' => __('Enter your twitter handle', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'googleplus_url',
                        'type' => 'text',
                        'title' => __('Google Plus', 'redux-framework-demo'),
                        'desc' => __('Enter your Google+ url', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'address',
                        'type' => 'textarea',
                        'title' => __('Address', 'redux-framework-demo'),
                        'desc' => __('Enter your business address', 'redux-framework-demo'),
                        ),    
             array(
                        'id'=>'telephone',
                        'type' => 'textarea',
                        'title' => __('Telephone Numebrs', 'redux-framework-demo'),
                        'desc' => __('Enter your business telephone numbers', 'redux-framework-demo'),
                        ),
            array(
                    'id'=>'email',
                    'type' => 'text',
                    'title' => __('Email Address', 'redux-framework-demo'),
                    'desc' => __('Enter your business email address', 'redux-framework-demo'),
                    ),   
        )
    );

    return $sections;
}

register_nav_menus( array( 'secondary-nav' => __( 'Secondary Nav', 'woothemes' ) ) );
register_nav_menus( array( 'home-layout' => __( 'Home Layout', 'woothemes' ) ) );
// Secondary Nav
function secondary_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'The Main Menu', 'bonestheme' ),              // nav name
        'menu_class' => 'nav navbar-nav navbar-right',              // adding custom nav class
        'theme_location' => 'main-nav',                             // where it's located in the theme
        'before' => '',                                             // before the menu
      'after' => '',                                            // after the menu
      'link_before' => '',                                      // before each link
      'link_after' => '',                                       // after each link
      'depth' => 2,                                             // limit the depth of the nav

    ));
} /* end bones main nav */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ppm_';
    $meta_boxes['page_metabox'] = array(
            'id'         => 'service_metabox',
            'title'      => __( 'Page Options', 'cmb' ),
            'pages'      => array( 'page', ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
            'fields'     => array(
                array(
                    'name' => __( 'Page Sub Heading', 'cmb' ),
                    'desc' => __( 'enter the main page sub heading', 'cmb' ),
                    'id'   => $prefix . 'sub_heading',
                    'type' => 'text',
                ),
            )
        );

    $meta_boxes['home_information'] = array(
        'id' => 'home_information',
        'title' => 'Home Options',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __( 'About Page', 'cmb' ),
                'desc' => __( 'enter the about page id', 'cmb' ),
                'id'   => $prefix . 'about_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Autogrammkarten', 'cmb' ),
                'desc' => __( 'enter the Autogrammkarten page id', 'cmb' ),
                'id'   => $prefix . 'auto_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Bike', 'cmb' ),
                'desc' => __( 'enter the about page id', 'cmb' ),
                'id'   => $prefix . 'bike_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Team', 'cmb' ),
                'desc' => __( 'enter the team page id', 'cmb' ),
                'id'   => $prefix . 'team_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Gallery', 'cmb' ),
                'desc' => __( 'enter the gallery page id', 'cmb' ),
                'id'   => $prefix . 'gallery_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Presse', 'cmb' ),
                'desc' => __( 'enter the press page id', 'cmb' ),
                'id'   => $prefix . 'press_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Erfolge', 'cmb' ),
                'desc' => __( 'enter the Erfolge page id', 'cmb' ),
                'id'   => $prefix . 'new_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Club #4', 'cmb' ),
                'desc' => __( 'enter the Club #4 page id', 'cmb' ),
                'id'   => $prefix . 'club_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Kalendar', 'cmb' ),
                'desc' => __( 'enter the Kalendar page id', 'cmb' ),
                'id'   => $prefix . 'kalendar_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Cup Stande', 'cmb' ),
                'desc' => __( 'enter the Kalendar page id', 'cmb' ),
                'id'   => $prefix . 'cup_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Gästebuch', 'cmb' ),
                'desc' => __( 'enter the Gästebuch page id', 'cmb' ),
                'id'   => $prefix . 'gastebuch_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Kontakt', 'cmb' ),
                'desc' => __( 'enter the Kontakt page id', 'cmb' ),
                'id'   => $prefix . 'kontakt_page',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Blog', 'cmb' ),
                'desc' => __( 'enter the Blog page id', 'cmb' ),
                'id'   => $prefix . 'blog_page',
                'type' => 'text',
            ),
            )
        );

    $meta_boxes['mitgliederliste_information'] = array(
        'id' => 'mitgliederliste_information',
        'title' => 'Mitgliederliste Options',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'id', 'value' => array(53) ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __( 'Member List Heading', 'cmb' ),
                'desc' => __( 'enter memebr list description', 'cmb' ),
                'id'   => $prefix . 'member_heading',
                'type' => 'text',
            ),
             array(
                'id'          => $prefix . 'member_list',
                'type'        => 'group',
                'description' => __( 'Generate member information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Member {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Member', 'cmb' ),
                    'remove_button' => __( 'Remove Member', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Title',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                ),
            ),
        
            )
        );

    $meta_boxes['cup_information'] = array(
        'id' => 'cup_information',
        'title' => 'Cup Stande Options',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-cup.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
             array(
                'id'          => $prefix . 'cup_information',
                'type'        => 'group',
                'description' => __( 'Generate member information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Member {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Member', 'cmb' ),
                    'remove_button' => __( 'Remove Member', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Title',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Entry Description',
                        'id'   => 'description',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Entry Download',
                        'id'   => 'url',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                ),
            ),
        
            )
        );
    
    $meta_boxes['sponsoren_information'] = array(
        'id' => 'sponsoren_information',
        'title' => 'Sponsoren Options',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'id', 'value' => array(55) ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __( 'Sponsoren Heading', 'cmb' ),
                'desc' => __( 'enter Sponsoren description', 'cmb' ),
                'id'   => $prefix . 'sponsoren_heading',
                'type' => 'text',
            ),
            array(
                'id'          => $prefix . 'team_information',
                'type'        => 'group',
                'description' => __( 'Generate sponsoren information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Entry', 'cmb' ),
                    'remove_button' => __( 'Remove Entry', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Title',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Description',
                        'description' => 'Write a short description for this entry',
                        'id'   => 'description',
                        'type' => 'textarea_small',
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                    ),
                    array(
                        'name' => 'Web Link',
                        'id'   => 'web_link',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Facebook Link',
                        'id'   => 'facebook_link',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                ),
            ),
            )
        
        );

    $meta_boxes['infoheft_information'] = array(
        'id' => 'infoheft_information',
        'title' => 'Info-Heft  Options',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'id', 'value' => array(59) ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __( 'Info-Heft Heading', 'cmb' ),
                'desc' => __( 'enter Sponsoren description', 'cmb' ),
                'id'   => $prefix . 'sponsoren_heading',
                'type' => 'text',
            ),
            array(
                'id'          => $prefix . 'infoheft_information',
                'type'        => 'group',
                'description' => __( 'Generate sponsoren information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Entry', 'cmb' ),
                    'remove_button' => __( 'Remove Entry', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Download',
                        'id'   => 'url',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                    ),
                ),
            ),
            )
        
        );

    $meta_boxes['contact_information'] = array(
        'id' => 'contact_information',
        'title' => 'Information',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-about.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id'          => $prefix . 'about_information',
                'type'        => 'group',
                'description' => __( 'Generate about information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Entry', 'cmb' ),
                    'remove_button' => __( 'Remove Entry', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Title',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Description',
                        'description' => 'Write a short description for this entry',
                        'id'   => 'description',
                        'type' => 'textarea_small',
                    ),
                    array(
                        'name' => 'Entry Icon',
                        'id'   => 'icon',
                        'type' => 'text',
                    ),
                ),
            ),
            )
        );

    $meta_boxes['team_information'] = array(
        'id' => 'team_information',
        'title' => 'Team Information',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-team.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id'          => $prefix . 'team_information',
                'type'        => 'group',
                'description' => __( 'Generate team information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Entry', 'cmb' ),
                    'remove_button' => __( 'Remove Entry', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Title',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Description',
                        'description' => 'Write a short description for this entry',
                        'id'   => 'description',
                        'type' => 'textarea_small',
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                    ),
                    array(
                        'name' => 'Web Link',
                        'id'   => 'web_link',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Facebook Link',
                        'id'   => 'facebook_link',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                ),
            ),
            )
        );
    
    $meta_boxes['erfolge_information'] = array(
        'id' => 'erfolge_information',
        'title' => 'Team Information',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-erfolge.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id'          => $prefix . 'erfolge_information',
                'type'        => 'group',
                'description' => __( 'Generate team information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Entry', 'cmb' ),
                    'remove_button' => __( 'Remove Entry', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                    array(
                        'name' => 'Entry Title',
                        'id'   => 'title',
                        'type' => 'text',
                        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                    ),
                    array(
                        'name' => 'Description',
                        'description' => 'Write a short description for this entry',
                        'id'   => 'description',
                        'type' => 'textarea_small',
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                    ),
                ),
            ),
            )
        );

    $meta_boxes['auto_information'] = array(
        'id' => 'auto_information',
        'title' => 'Autogrammkarten',
        'pages' => array('page'), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-auto.php' ),
        'context' => 'normal', //  'normal', 'advanced', or 'side'
        'priority' => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'id'          => $prefix . 'auto_information',
                'type'        => 'group',
                'description' => __( 'Generate about information', 'cmb' ),
                'options'     => array(
                    'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add Another Entry', 'cmb' ),
                    'remove_button' => __( 'Remove Entry', 'cmb' ),
                    'sortable'      => true, // beta
                ),
                // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                'fields'      => array(
                     array(
                        'name' => 'Autogrammkarten Image',
                        'id'   => 'image',
                        'type' => 'file',
                    ),
                ),
            ),
            )
        );

    return $meta_boxes;
}
add_filter('redux/options/brew_options/sections', 'child_sections');

/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// let's create the function for the custom type
function gallery_cpt() { 
    // creating (registering) the custom type 
    register_post_type( 'gallery', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Galleries', 'bonestheme' ), /* This is the Title of the Group */
            'singular_name' => __( 'Gallery', 'bonestheme' ), /* This is the individual type */
            'all_items' => __( 'All Galleries', 'bonestheme' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
            'add_new_item' => __( 'Add New Gallery', 'bonestheme' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
            'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
            'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
            'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
            'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
            'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'description' => __( 'This is the example custom post type', 'bonestheme' ), /* Custom Type Description */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => get_template_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
            'rewrite'   => array( 'slug' => 'gallery', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'custom_type', /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title','editor','thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
    /* this adds your post categories to your custom post type */
    register_taxonomy_for_object_type( 'category', 'custom_type' );
    /* this adds your post tags to your custom post type */
    register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'gallery_cpt');

// let's create the function for the custom type
function press_cpt() { 
    // creating (registering) the custom type 
    register_post_type( 'press', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Presse', 'bonestheme' ), /* This is the Title of the Group */
            'singular_name' => __( 'Presse', 'bonestheme' ), /* This is the individual type */
            'all_items' => __( 'All Presse', 'bonestheme' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
            'add_new_item' => __( 'Add New Presse', 'bonestheme' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
            'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
            'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
            'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
            'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
            'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'description' => __( 'This is the example custom post type', 'bonestheme' ), /* Custom Type Description */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => get_template_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
            'rewrite'   => array( 'slug' => 'press', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'custom_type', /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title','editor','thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
    /* this adds your post categories to your custom post type */
    register_taxonomy_for_object_type( 'category', 'custom_type' );
    /* this adds your post tags to your custom post type */
    register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'press_cpt');


if ( ! function_exists( 'image_menu' ) ) {
    function image_menu ( $menu_name,$span=2,$offset='' ) {
        global $pid;
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $count = 0;
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            foreach ( (array) $menu_items as $key => $menu_item ) {
                $pid = $menu_item->object_id;
                include(locate_template(get_page_template_slug($pid)));

            }
        }
    }
}

if (!function_exists('wp_get_gallery_content'))
{
    function wp_get_gallery_content($type=0)
    { 
        global $post;
        $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
        $args = array(
            'order'          => 'ASC',
            'post_type'      => 'attachment',
            'post_parent'    => $post->ID,
            'post_mime_type' => 'image',
            'numberposts'    => -1,
            'orderby' => 'menu_order',
            //'exclude'=>$post_thumbnail_id
        );

        $attachments = get_posts($args);  
        ?>
            <div id="slider" class="objects">
                
                <?php foreach ($attachments as $attachment) { $count++; ?>
                    <div class="object">
                        <?php $image_attributes = wp_get_attachment_image_src( $attachment->ID,'large'); ?>
                        <?php $image_attributes_1 = wp_get_attachment_image_src( $attachment->ID,'full'); ?>
                        <a href="<?php echo $image_attributes_1[0];?>" rel="prettyphoto">
                            <img class="img-responsive" src="<?php echo $image_attributes[0]; ?>">
                        </a>
                    </div>
                    
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        
        <?php wp_reset_query();
    }
}

?>