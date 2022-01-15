<?php

/*loading all custom classes */
include "Templates/Helpers/WPDataHelper.php"; //helper
include "getData.php";
function theme_scripts_method(){

wp_enqueue_script( 'jquery');

}

add_action( 'wp_enqueue_scripts', 'theme_scripts_method' );


function loadFrontend() {
    wp_enqueue_script( 'Verlage_Overview', $_SERVER['REQUEST_URI'].'wp-content/themes/generatepress-child/Frontend/Verlage_Overview.js');

}


/***********************************************Gravity form changes****************************************************** */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;

function ch_phone_format( $phone_formats ) {
    $phone_formats['ch'] = array(
        'label'       => 'Switzerland',
        'mask'        => '',
        'regex'       => '/(\b(0041|0)|\B\+41)(\s?\(0\))?(\s)?[1-9]{2}(\s)?[0-9]{3}(\s)?[0-9]{2}(\s)?[0-9]{2}\b/',
        'instruction' => 'Geben Sie die Ziffern ohne Bindestriche oder Leerzeichen ein.',
    );
 
    return $phone_formats;
}

function address_format( $format, $field ) {
    return 'zip_before_city';
}



add_filter( 'gform_address_display_format', 'address_format', 10, 2 );
add_filter( 'gform_phone_formats', 'ch_phone_format' );
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

/***********************************************************************************************************************************************/
add_action( 'wp_enqueue_scripts', 'loadFrontend' );

?>
