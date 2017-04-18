<?php
namespace L2F_Work;
class L2f_Admin_Settings {
		/**
	 * Single ton pattern instance reuse.
	 *
	 * @access  private
	 *
	 * @var L2f_Admin_Settings  $_instance class instance.
	 */
	private static $_instance;
	/**
	 * L2f_Admin_Settings constructor
	 */
	function __construct() {
		add_action( 'admin_menu', array( $this, 'l2f_settings_plugin_menu' ) );
	}

	/**
	 * GET Instance
	 *
	 * Function help to create class instance as per singleton pattern.
	 *
	 * @return L2f_Admin_Settings  $_instance
	 */
	public static function get_instance() {
	    if ( ! isset( self::$_instance ) ) {
	        self::$_instance = new self();
	    }
	    return self::$_instance;
	}

	/**
	 * Function to include settings.
	 */
	function l2f_settings_plugin_menu(){
		add_options_page( 'L2F Settings', 'L2F Settings', 'manage_options', 'l2f_settings', array($this, 'l2f_settings_callback' ));
	}

	/**
	 * Like Like Facebook settings
	 */
	function l2f_settings_callback(){?>
		<div class='wrap'>
			<h1>Like Like Facebook Settings</h1>
			<form name='l2f_settingsfom' method='post'>
				<div class='l2f_settings'>
					<?php 
						$non_usedargs = array('revision', 'nav_menu_item', 'custom_css', 'customize_changeset');	
						$all_post_types = get_post_types(array('show_ui'=> true));
					?>
					<h3>Choose Post Type </h3>
					<?php foreach($all_post_types as $key => $post_type){
						?>
						<label for='post_type_<?php echo $post_type; ?>'><?php echo $post_type; ?></label>
						<input type='checkbox' name='post_type[]' value='<?php echo $post_type; ?>' class='l2f_checkbox'/>
					<?php }?>
					<input type="submit" name="save_settings" class='button button-primary button-large' value='Save'/>
				</div>
			</form>
		</div>
	<?php }
}
