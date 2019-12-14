<?php
    // Add Scripts
    function sbd_add_scripts(){
        //Add main CSS
        wp_enqueue_style('sbd-main-style', plugin_url(). '/simple-bitcoin-donation-widget/css/style.css');
        // Add Main JS
        //wp_enqueue_script('yts-main-script', plugins_url(). '/simple-bitcoin-donation-widget/js/main.js');

        // Add Google Script
        //wp_register_script('google', 'https://apis.google.com/js/platform.js');
        //wp_enqueue_script('google');
    }

    add_action('wp_enqueue_scripts', 'sdb_add_scripts');
?>
