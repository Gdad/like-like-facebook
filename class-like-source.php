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
		add_action('wp_enqueue_scripts', array( $this, 'l2f_add_scipts' ) );

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
     * Function to add script.
     */
    function l2f_add_scipts(){
        wp_register_script('l2f-script', plugin_dir_url(__FILE__).'assets/js/script.js', array ('jquery'), false);
    }

	/**
	 * Function to print like button like Facebook.
	 */
	function l2f_add_like_btn( $content ) {
	    ob_start();
        wp_enqueue_script( 'l2f-script' );
	    $class = apply_filters( 'llf_add_btn_class','l2f_fb_like' );?>
        <div class='<?php echo esc_html( $class );?>'>
            <div class='different_reaction_btn'>

            </div>
            <a href='#' class='l2f_fb_like_link'>Like</a>
        </div>
        <?php
        $content .= ob_get_contents();
        ob_end_clean();
        return $content;
	}
}
