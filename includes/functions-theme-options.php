<?php
/**
 * Theme Options
 *
 * Setup theme specfic settings
 *
 * @package      Responsive_II
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the Responsive_II Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/**
 * Retrieve Theme option settings
 *
 */
function responsive_II_get_options()
{
	// Parse array of option defaults against user-configured Theme options
	$responsive_II_options = Responsive_Options::$static_responsive_II_options;

	if ( !$responsive_II_options ) {
		return Responsive_Options::$static_default_options;
	}

	// Return parsed args array
	return $responsive_II_options;
}

// TODO is this filter actually doing anything?
add_filter( 'responsive_II_options_init', 'responsive_II_get_options' );

/**
 * Get valid layouts
 */
function responsive_II_valid_layouts()
{
	$layouts = array(
		'default'                   => __( 'Default', 'responsive-II' ),
		'content-sidebar-page'      => __( 'Content/Sidebar', 'responsive-II' ),
		'sidebar-content-page'      => __( 'Sidebar/Content', 'responsive-II' ),
		'content-sidebar-half-page' => __( 'Content/Sidebar Half Page', 'responsive-II' ),
		'sidebar-content-half-page' => __( 'Sidebar/Content Half Page', 'responsive-II' ),
		'full-width-page'           => __( 'Full Width Page (no sidebar)', 'responsive-II' )
	);

	return apply_filters( 'responsive_II_valid_layouts', $layouts );
}

/**
 * Set Theme Options
 */
function responsive_II_theme_options_set()
{

	/**
	 * Creates and array of sections and each section again conatains array of options.
	 *
	 * @key This must match the id of the section you want the options to appear in
	 *
	 * Attributes of each sections :-
	 * @title - Title of the section. This text is used to be displyed as the section name in the theme theme option page.
	 * @fields - This is an array of option fields inside a section.
	 *
	 * Attributes of each fields :-
	 * @title Title on the left hand side of the options
	 * @subtitle Displays underneath main title on left hand side
	 * @heading Right hand side above input
	 * @type The type of input e.g. text, textarea, checkbox
	 * @id The options id
	 * @description Instructions on what to enter in input
	 * @placeholder The placeholder for text and textarea
	 * @options array used by select dropdown lists
	 */
	$options = array(
		'theme_elements'   => array(
			'title'  => __( 'Theme Elements', 'responsive-II' ),
			'fields' => array(
				array(
					'title'       => __( 'Disable breadcrumb list?', 'responsive-II' ),
					'type'        => 'checkbox',
					'id'          => 'breadcrumb',
					'description' => __( 'Check to disable', 'responsive-II' ),
					'default'     => false,
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Use minified CSS', 'responsive-II' ),
					'type'        => 'checkbox',
					'id'          => 'minified_css',
					'description' => __( 'Check to disable', 'responsive-II' ),
					'default'     => false,
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Disable Call to Action Button?', 'responsive-II' ),
					'type'        => 'checkbox',
					'id'          => 'cta_button',
					'description' => __( 'Check to disable', 'responsive-II' ),
					'default'     => false,
					'validate'    => 'checkbox'
				)
			)
		),
		'logo_upload'      => array(
			'title'  => __( 'Logo Upload', 'responsive-II' ),
			'fields' => array(
				array(
					'title'       => __( 'Custom Header', 'responsive-II' ),
					'type'        => 'description',
					'id'          => 'logo_upload_desc',
					'description' => __( 'Need to replace or remove default logo?', 'responsive-II' ) . ' <a href="' . admin_url( 'themes.php?page=custom-header' ) . '">' . __( 'Click here', 'responsive-II' ) . '</a>',
					'default'     => ''
				)
			)
		),
		'home_page'        => array(
			'title'  => __( 'Home Page', 'responsive-II' ),
			'fields' => array(
				array(
					'title'       => __( 'Enable Custom Front Page', 'responsive-II' ),
					'type'        => 'checkbox',
					'id'          => 'front_page',
					'description' => sprintf( __( 'Overrides the WordPress %1sfront page option%2s', 'responsive-II' ), '<a href="options-reading.php">', '</a>' ),
					'default'     => 1,
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Headline', 'responsive-II' ),
					'subtitle'    => '',
					'heading'     => '',
					'type'        => 'text',
					'id'          => 'home_headline',
					'description' => __( 'Enter your headline', 'responsive-II' ),
					'placeholder' => __( 'Hello, World!', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Subheadline', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'home_subheadline',
					'description' => __( 'Enter your subheadline', 'responsive-II' ),
					'placeholder' => __( 'Your H2 subheadline here', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Content Area', 'responsive-II' ),
					'type'        => 'editor',
					'id'          => 'home_content_area',
					'description' => __( 'Enter your content', 'responsive-II' ),
					'placeholder' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'editor'
				),
				array(
					'title'       => __( 'Call to Action (URL)', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'cta_url',
					'description' => __( 'Enter your call to action URL', 'responsive-II' ),
					'placeholder' => '#nogo',
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Call to Action (Text)', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'cta_text',
					'description' => __( 'Enter your call to action text', 'responsive-II' ),
					'placeholder' => __( 'Call to Action', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'text'
				),
				array(
					'title'       => __( 'Featured Content', 'responsive-II' ),
					'subtitle'    => '<a class="help-links" href="' . esc_url( 'http://cyberchimps.com/guide/responsive/' ) . '" title="' . esc_attr__( 'See Docs', 'responsive-II' ) . '" target="_blank">' .
						__( 'See Docs', 'responsive-II' ) . '</a>',
					'type'        => 'editor',
					'id'          => 'featured_content',
					'description' => __( 'Paste your shortcode, video or image source', 'responsive-II' ),
					'placeholder' => '<img class="aligncenter" src="' . get_template_directory_uri() . '"/core/images/featured-image.png" width="440" height="300" alt="" />',
					'default'     => '',
					'validate'    => 'editor'
				)
			)
		),
		'layouts'          => array(
			'title'  => __( 'Default Layouts', 'responsive-II' ),
			'fields' => array(
				array(
					'title'    => __( 'Default Static Page Layout', 'responsive-II' ),
					'type'     => 'select',
					'id'       => 'static_page_layout_default',
					'options'  => responsive_II_valid_layouts(),
					'default'  => 'default',
					'validate' => 'select'
				),
				array(
					'title'    => __( 'Default Single Blog Post Layout', 'responsive-II' ),
					'type'     => 'select',
					'id'       => 'single_post_layout_default',
					'options'  => responsive_II_valid_layouts(),
					'default'  => 'default',
					'validate' => 'select'
				),
				array(
					'title'    => __( 'Default Blog Posts Index Layout', 'responsive-II' ),
					'type'     => 'select',
					'id'       => 'blog_posts_index_layout_default',
					'options'  => responsive_II_valid_layouts(),
					'default'  => 'default',
					'validate' => 'select'
				)
			)
		),
		'social'           => array(
			'title'  => __( 'Social Icons', 'responsive-II' ),
			'fields' => array(
				array(
					'title'       => __( 'Twitter', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'twitter_uid',
					'description' => __( 'Enter your Twitter URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Facebook', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'facebook_uid',
					'description' => __( 'Enter your Facebook URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'LinkedIn', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'linkedin_uid',
					'description' => __( 'Enter your LinkedIn URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'YouTube', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'youtube_uid',
					'description' => __( 'Enter your YouTube URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'StumbleUpon', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'stumbleupon_uid',
					'description' => __( 'Enter your StumbleUpon URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'RSS Feed', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'rss_uid',
					'description' => __( 'Enter your RSS Feed URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'checkbox'
				),
				array(
					'title'       => __( 'Google+', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'googleplus_uid',
					'description' => __( 'Enter your Google+ URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Instagram', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'instagram_uid',
					'description' => __( 'Enter your Instagram URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'Pinterest', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'pinterest_uid',
					'description' => __( 'Enter your Pinterest URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				// TODO removed as no font icon for this yet
				//				array(
				//					'title'       => __( 'Yelp!', 'responsive-II' ),
				//					'type'        => 'text',
				//					'id'          => 'yelp_uid',
				//					'description' => __( 'Enter your Yelp! URL', 'responsive-II' ),
				//					'default'     => '',
				//					'validate'    => 'url'
				//				),
				array(
					'title'       => __( 'Vimeo', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'vimeo_uid',
					'description' => __( 'Enter your Vimeo URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				),
				array(
					'title'       => __( 'foursquare', 'responsive-II' ),
					'type'        => 'text',
					'id'          => 'foursquare_uid',
					'description' => __( 'Enter your foursquare URL', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'url'
				)
			)
		),
		'css'              => array(
			'title'  => __( 'CSS Styles', 'responsive-II' ),
			'fields' => array(
				array(
					'title'       => __( 'Custom CSS Styles', 'responsive-II' ),
					'subtitle'    => '<a class="help-links" href="https://developer.mozilla.org/en/CSS" title="CSS Tutorial" target="_blank">' . __( 'CSS Tutorial', 'responsive-II' ) . '</a>',
					'type'        => 'textarea',
					'id'          => 'responsive_II_inline_css',
					'description' => __( 'Enter your custom CSS styles.', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'css'
				)
			)
		),
		'scripts'          => array(
			'title'  => __( 'Scripts', 'responsive-II' ),
			'fields' => array(
				array(
					'title'       => __( 'Custom Scripts for Header and Footer', 'responsive-II' ),
					'subtitle'    => '<a class="help-links" href="http://codex.wordpress.org/Using_Javascript" title="Quick Tutorial" target="_blank">' . __( 'Quick Tutorial', 'responsive-II' ) . '</a>',
					'heading'     => __( 'Embeds to header.php &darr;', 'responsive-II' ),
					'type'        => 'textarea',
					'id'          => 'responsive_II_inline_js_head',
					'description' => __( 'Enter your custom header script.', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'js'
				),
				array(
					'heading'     => __( 'Embeds to footer.php &darr;', 'responsive-II' ),
					'type'        => 'textarea',
					'id'          => 'responsive_II_inline_js_footer',
					'description' => __( 'Enter your custom footer script.', 'responsive-II' ),
					'default'     => '',
					'validate'    => 'js'
				)
			)
		)

	);

	$options = apply_filters( 'responsive_II_option_options_filter', $options );

	$theme_options = new Responsive_Options( $options );

	return $theme_options;
}

add_action( 'after_setup_theme', 'responsive_II_theme_options_set' );
