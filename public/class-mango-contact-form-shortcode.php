<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Mango_Contact_Form
 * @subpackage Mango_Contact_Form/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mango_Contact_Form
 * @subpackage Mango_Contact_Form/public
 * @author     Your Name <email@example.com>
 */
class Mango_Contact_Form_Shortcode {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct(  ) {

		
		

	}
	
	
	public  function show_form($atts, $content = ""){
		
		$content ="";
			ob_start();
			include_once("partials/mango-contact-form-public-display.php");
		  $content = ob_get_contents();
	    ob_end_clean();
		
		
	    return $content;
		
		
	}

  
  
  
  
}