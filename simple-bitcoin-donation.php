<?php
    /*
    Plugin Name: Simple Bitcoin Donation Widget
    Plugin URI: http://santech.ph
    Description: Display donation image and text for bitcoin donations
    Version: 1.0.11
    Author: Mr. Smith
    Author URI: http://santach.ph
    */

    // Exits if access directly
    if(!defined('ABSPATH')) {
        exit;
    }

    //Load the scripts
    require_once(plugin_dir_path(__FILE__).'/includes/simple-bitcoin-donation-scripts.php');

    //Load the class
    require_once(plugin_dir_path(__FILE__).'/includes/simple-bitcoin-donation-class.php');

    // Register Widget
    function register_simple_bitcoin_donation_button(){
        register_widget('Simple_Bitcoin_Donation_Widget');
    }

    // Hook in function
    add_action('widgets_init', 'register_simple_bitcoin_donation_widget');
?>
