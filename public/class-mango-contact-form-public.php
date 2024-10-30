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
class Mango_Contact_Form_Public {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mango_Contact_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mango_Contact_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mango-contact-form-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mango_Contact_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mango_Contact_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		
    wp_enqueue_script("jquery");
		wp_enqueue_script( 'jquery-validation-js','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js' , array(), '1.0.0', true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mango-contact-form-public.js', array( 'jquery' ), $this->version, false );
    wp_localize_script( $this->plugin_name, 'mango_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		
	}
	
	public function contact_form_action(){
		
		 if ( ! isset( $_POST['mango_contact_nonce_field'] ) || ! wp_verify_nonce( $_POST['mango_contact_nonce_field'], 'mango_contact_nonce_action' ) ) {
		   die();
		 }
		
     $contact_name=""; $contact_email=""; $contact_phone=""; $contact_message="";
		
		 if(isset($_POST['contact_name'])){
		 	$contact_name = sanitize_text_field($_POST['contact_name']);
		 }
		 if(isset($_POST['contact_email'])){
		 	$contact_email=	sanitize_text_field($_POST['contact_email']);
		 }
		 if(isset($_POST['contact_phone'])){
		 	$contact_phone=	sanitize_text_field($_POST['contact_phone']);
		 }
		 if(isset($_POST['contact_message'])){		
		 	$contact_message=	htmlentities($_POST['contact_message']);
		 }
		
	  sleep(2);
		
	  $mailer= new Mango_Contact_Form_Mailer(); 
		
		$mailer->setBody($contact_name,$contact_email,$contact_phone,$contact_message);
		
		if($mailer->send()){
			$data = array("result"=>array("status"=>"1","message"=>"Email sended"));
		}
		else{
			$data = array("result"=>array("status"=>"0","message"=>"Error"));
		};
		
		
    header('Content-Type: application/json');
    echo json_encode($data);
		wp_die();
		
		
		
	}
	
	
	public function  add_shortcodes(){
		
		$form_shortcode  = new Mango_Contact_Form_Shortcode();
		add_shortcode( 'contact-form', array($form_shortcode, 'show_form' ) );
		
		
	}

}
