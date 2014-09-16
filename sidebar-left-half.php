<?php
/**
 * Sidebar Left Half
 *
 * Sidebar Template used by page templates
 *
 * @package      Responsive_II
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the Responsive_II Framework and all modifications
 * should be made in a child theme.
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

responsive_II_widgets_before(); // above widgets container hook ?>
	<div id="widgets" class="widget-area left-half-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php responsive_II_widgets(); // above widgets hook ?>

		<?php if ( !dynamic_sidebar( 'left-sidebar-half' ) ) : ?>
			<aside id="archives" class="widget-wrapper">

				<h3 class="widget-title"><?php _e( 'In Archive', 'responsive-II' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</aside>
			<!-- end of .widget-wrapper -->
		<?php endif; //end of left-sidebar-half ?>

		<?php responsive_II_widgets_end(); // after widgets hook ?>
	</div>
	<!-- end of #widgets -->
<?php responsive_II_widgets_after(); // after widgets container hook ?>