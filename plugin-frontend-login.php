<?php
/**
 * Plugin Name:       Frontend Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Practicing plugin development
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Alec Nino
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 /*function plugin_test(){
     echo "<br>";
     echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/LesJAjQf0-g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
 }

 add_action("wp_head","plugin_test");
 */

 //API
require_once plugin_dir_path(__FILE__)."/includes/API/api-registro.php";

//Shortcode
require_once plugin_dir_path(__FILE__)."/public/shortcode/form-signup.php";
require_once plugin_dir_path(__FILE__)."/public/shortcode/form-login.php";