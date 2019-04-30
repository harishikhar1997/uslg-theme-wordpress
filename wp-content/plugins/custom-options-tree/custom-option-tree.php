<?php
/*
Plugin Name: Common Settings
Plugin URI:  
Description: Common Settings
Version: 1.1.2
Author: MB
Author URI:  
Text Domain : mb
*/


// Make sure we don't expose any info if called directly
if ( basename( $_SERVER['PHP_SELF'] ) == basename( __FILE__ ) ) {
	die( 'Sorry, but you cannot access this page directly.' );
}

add_action('admin_menu', 'add_custom_option_tree');
function add_custom_option_tree() {
	add_theme_page('Common Settings', 'Common Settings', 'manage_options', 'edit-custom-option-tree', 'mb_display');
}
 
/**
 * Retrieves plugin options if they exist or returns default values if not
 *
 * @since Custom Options Tree 1.0
 *
 * @return array of Custom Options Trees.
 */
 function mb_getoptions() {
	 if( get_option( 'mb_options' ) === false ) {
		$mb_options['header_phone'] = '';
		$mb_options['footer_image_path'] = '';
		$mb_options['copy_right'] = '';
		$mb_options['facebook'] = '';
		$mb_options['twitter'] = '';
		$mb_options['linkedin'] = '';
		$mb_options['instagram'] = '';
		$mb_options['google_plus'] = '';
		$mb_options['fax'] = '';
		$mb_options['email'] = '';

	 }
	 else {
		$mb_options = get_option( 'mb_options' );
		if( !isset( $mb_options['header_phone'] ) ){
			$mb_options['header_phone'] = "";
		}
		 
		if( !isset( $mb_options['copy_right'] ) ){
			$mb_options['copy_right'] = "";
		}
	
		if( !isset( $mb_options['facebook'] ) ){
			$mb_options['facebook'] = "";
		}
		if( !isset( $mb_options['twitter'] ) ){
			$mb_options['twitter'] = "";
		}
		if( !isset( $mb_options['linkedin'] ) ){
			$mb_options['linkedin'] = "";
		}
		if( !isset( $mb_options['instagram'] ) ){
			$mb_options['instagram'] = "";
		}
		if( !isset( $mb_options['google_plus'] ) ){
			$mb_options['google_plus'] = "";
		}
		if( !isset( $mb_options['fax'] ) ){
			$mb_options['fax'] = "";
		}
		if( !isset( $mb_options['email'] ) ){
			$mb_options['email'] = "";
		}
		
	 }
	 return $mb_options;
	 
 }

 function mb_display() {
	if( isset( $_GET[ 'tab' ] ) ) {  
		$active_tab = $_GET[ 'tab' ];  
    } else {
		$active_tab = 'tab_header';
	} 
 ?>
	<div class="wrap">
        <h1 class="main-title">Custom Theme Option Settings</h1>
		<p class="description" >Add theme options to your theme hassle free</p>
            <?php settings_errors(); ?> 
		 
        <div class="custom_option">
			<form method="post" action="options.php"  class="customtheme"> 
				<?php
					settings_fields( 'mb_options' ); 
					do_settings_sections( 'mb_socialmedia' ); 
					 
				?>
				<input type="submit" name="submit" value="Save Setting" class="button-primary" />
			</form> 
		</div>
	</div>
 <?php }

 add_action( 'admin_init', 'mb_register_settings' );

 function mb_register_settings(){
	/**
	 * Registers Header section for Custom theme option
	 */
	register_setting( 'mb_options', 'mb_options', 'mb_validate_options' );
	
	

	 
	/**
	 * Adds a settings social media section
	 */
	add_settings_section( 'mb_section', 'Common Settings', 'mb_socialmediatext', 'mb_socialmedia' );
	
	/**
	 * Adds a setting field  facebook link
	 */
	add_settings_field( 'mb_facebooklink', 'Facebook', 'mb_facebooklink', 'mb_socialmedia', 'mb_section' );
	
	/**
	 * Adds a setting field  twitter link
	 */
	add_settings_field( 'mb_twitterlink', 'Twitter', 'mb_twitterlink', 'mb_socialmedia', 'mb_section' );
	
	/**
	 * Adds a setting field  linkedin link
	 */
	add_settings_field( 'mb_linkedinlink', 'Linkedin', 'mb_linkedinlink', 'mb_socialmedia', 'mb_section' );
	
	/**
	 * Adds a setting field  instagram link
	 */
	add_settings_field( 'mb_instagramlink', 'Instagram', 'mb_instagramlink', 'mb_socialmedia', 'mb_section' );
	
	/**
	 * Adds a setting field  google plus link
	 */
	add_settings_field( 'mb_googlepluslink', 'Google +', 'mb_googlepluslink', 'mb_socialmedia', 'mb_section' ); 
	
	/**
	 * Adds a setting field  header logo image selection
	 */
	add_settings_field( 'mb_headerlogo', 'Phone', 'mb_headerlogo', 'mb_socialmedia', 'mb_section' );
	
	
	/**
	 * Adds a setting field  Footer Copy right text selection	
	 */
	add_settings_field( 'mb_copyrighttext', 'Footer Copy Right Text', 'mb_copyrighttext', 'mb_socialmedia', 'mb_section' );

	/**
	 * Adds a setting field  Fax
	 */
	add_settings_field( 'mb_faxtext', 'Fax', 'mb_faxtext', 'mb_socialmedia', 'mb_section' );

	/**
	 * Adds a setting field  Email
	 */
	add_settings_field( 'mb_emailtext', 'Email', 'mb_emailtext', 'mb_socialmedia', 'mb_section' );
	
}


//Fax Text Funxtion
function mb_faxtext() {
	$options = mb_getoptions();
	$mb_fax = $options['fax'];
?>
	<p><input class="text-box" type="text" placeholder="&copy; 2018 Wordpress" name="mb_options[fax]" value="<?php echo esc_attr($mb_fax); ?>">
	</p>
<?php
}


//emai; Text Funxtion
function mb_emailtext() {
	$options = mb_getoptions();
	$mb_email = $options['email'];
?>
	<p><input class="text-box" type="text" placeholder="&copy; 2018 Wordpress" name="mb_options[email]" value="<?php echo esc_attr($mb_email); ?>">
	</p>
<?php
}

//Header Logo Function 
function mb_headerlogo () {
	$options = mb_getoptions();	
	$mb_headerlogo = $options['header_phone'];
?>
 
 	<p><input class="text-box" type="text" name="mb_options[header_phone]" value="<?php echo esc_attr($mb_headerlogo); ?>">
	</p>
	<?php  
}

//Footer Copyright Text Funxtion
function mb_copyrighttext() {
	$options = mb_getoptions();
	$mb_copyright = $options['copy_right'];
?>
	<p><input class="text-box" type="text" placeholder="&copy; 2018 Wordpress" name="mb_options[copy_right]" value="<?php echo esc_attr($mb_copyright); ?>">
	</p>
<?php
}


//Social Media Facebook Function
function mb_facebooklink() {
	$options = mb_getoptions();
	$mb_facebookurl = $options['facebook'];
?>
	<p>
		<input class="text-box" type="text" placeholder="http://facebook.com/yourprofileurl" name="mb_options[facebook]" value="<?php echo esc_attr($mb_facebookurl); ?>">
		
	</p>
<?php }

//Social Media Twitter Function
function mb_twitterlink() {
	$options = mb_getoptions();
	$mb_twitterurl = $options['twitter'];
?>
	<p>
		<input class="text-box" type="text" placeholder="http://twitter.com/yourprofileurl" name="mb_options[twitter]" value="<?php echo esc_attr($mb_twitterurl); ?>">
		
	</p>
<?php }

//Social Media Linkedin Function
function mb_linkedinlink() {
	$options = mb_getoptions();
	$mb_linkedinurl = $options['linkedin'];
?>
	<p>
		<input class="text-box" type="text" placeholder="https://www.linkedin.com/yourprofileurl" name="mb_options[linkedin]" value="<?php echo esc_attr($mb_linkedinurl); ?>">
		
	</p>
<?php }

//Social Media Instagram Function
function mb_instagramlink() {
	$options = mb_getoptions();
	$mb_instagramurl = $options['instagram'];
?>
	<p>
		<input class="text-box" type="text" placeholder="https://www.instagram.com/yourprofileurl" name="mb_options[instagram]" value="<?php echo esc_attr($mb_instagramurl); ?>">
	
	</p>
<?php }

//Social Media Google Plus Function
function mb_googlepluslink() {
	$options = mb_getoptions();
	$mb_googleplusurl = $options['google_plus'];
?>
	<p>
		<input class="text-box" type="text" placeholder="https://plus.google.com/xxxxxxxxx/posts" name="mb_options[google_plus]" value="<?php echo esc_attr($mb_googleplusurl); ?>">
	
	</p>
<?php }

function mb_headertext() {
	
}
function mb_footertext() {
	
}

function mb_socialmediatext() {
	
}
function mb_globaltext(){

}
/**
 * Validates the form submission by user
 *
 * @since Custom Options Tree 1.0
 */
function mb_section($input) {
	$input['header_phone'] = esc_url( $input['header_phone'] );
	$input['copy_right'] = esc_url( $input['copy_right'] );
	$input['url'] = esc_url( $input['url'] );
	$input['facebook'] = esc_url( $input['facebook'] );
	$input['twitter'] = esc_url( $input['twitter'] );
	$input['linkedin'] = esc_url( $input['linkedin'] );
	$input['instagram'] = esc_url( $input['instagram'] );
	$input['google_plus'] = esc_url( $input['google_plus'] );
	$input['fax'] = esc_url( $input['fax'] );
	$input['email'] = esc_url( $input['email'] );
	return $input;
}

/**
 *
 * @since Custom Options Tree 1.0
 */
 
 
function mb_showheaderphone() {
	$options = mb_getoptions();	
	$mb_headerimage = $options['header_phone'];
	 
   return $mb_headerimage;
	 
}

function mb_fax() {
	$options = mb_getoptions();	
	$mb_crtext = $options['fax']; ?>
	<?php echo $mb_crtext; ?><?php 
}

function mb_email() {
	$options = mb_getoptions();	
	$mb_crtext = $options['email']; ?>
	<?php echo $mb_crtext; ?><?php 
} 

function mb_copyright() {
	$options = mb_getoptions();	
	$mb_crtext = $options['copy_right']; ?>
	<?php echo $mb_crtext; ?><?php 
}
 
function mb_facebook() {
	$options = mb_getoptions();
	$mb_fblink = $options['facebook'];  
	 return $mb_fblink;
}

function mb_twitter() {
	$options = mb_getoptions();
	$mb_twlink = $options['twitter'];
	return $mb_twlink;
}

function mb_linkedin() {
	$options = mb_getoptions();
	$mb_ldlink = $options['linkedin']; 
	return $mb_ldlink;
}

function mb_instagram() {
	$options = mb_getoptions();
	$mb_iglink = $options['instagram']; 
	return $mb_iglink;
}

function mb_googleplus() {
	$options = mb_getoptions();
	$mb_gplink = $options['google_plus']; 
	return $mb_gplink;
}
 



//Add js in plugin

add_action( 'admin_print_scripts', 'mb_customthemeoption_scripts' );
/**
 * Enqueues Custom Options Tree javascript files
 *
 * @since Custom Options Tree 1.0
 */
function mb_customthemeoption_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'mb_customthemeoption_js', plugins_url('js/customoptiontree.js' , __FILE__ ), array( 'jquery', 'media-upload', 'thickbox' ) );
}

add_action( 'admin_print_styles', 'mb_customtheme_styles_admin' );
/**
 * enqueues 'Custom Options Tree' and 'WordPress thickbox' styles in admin and front end
 *
 * Conditionaly checks and inserts hover.css if required
 *
 * @since Custom Options Tree 1.0
 */
function mb_customtheme_styles_admin() {
	wp_enqueue_style( 'thickbox' );
	wp_enqueue_style( 'stylesheet', plugins_url('css/customoptiontree.css' , __FILE__ ), array(), '', false );
}

register_deactivation_hook('__FILE__', 'mb_customtheme_uninstall');
/**
 * removes Custom Options Tree options upon deactivation
 *
 * @since Custom Options Tree 1.0
 */
function mb_customtheme_uninstall() {
	delete_option('mb_options');
}
