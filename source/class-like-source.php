<?php
namespace L2F_Work;
class L2f_Like_Source {
	/**
	 * Single ton pattern instance reuse.
	 *
	 * @access  private
	 *
	 * @var L2f_Like_Source  $_instance class instance.
	 */
	private static $_instance;
	/**
	 * L2f_Like_Source constructor
	 */
	function __construct() {
		add_action( 'the_content', array( $this, 'l2f_add_like_btn' ) );
	}

	/**
	 * GET Instance
	 *
	 * Function help to create class instance as per singleton pattern.
	 *
	 * @return L2f_Like_Source  $_instance
	 */
	public static function get_instance() {
	    if ( ! isset( self::$_instance ) ) {
	        self::$_instance = new self();
	    }
	    return self::$_instance;
	}

	/**
	 * Function to print like button like Facebook.
	 */
	function l2f_add_like_btn(){?>
		<div class='l2f_fb_like'> 
			<div class='different_reaction_btn'>
				
			</div>
			<a href='#' class='l2f_fb_like_link'>Like</a>
		</div>
	<?php }
}
