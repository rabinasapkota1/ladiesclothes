<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package joyas-shop
 */

get_header();

$layout = joyas_shop_get_option('blog_layout');

/**
* Hook - joyas_shop_container_wrap_start 	
*
* @hooked joyas_shop_container_wrap_start	- 5
*/
 do_action( 'joyas_shop_container_wrap_start', esc_attr( $layout ));

	if ( have_posts() ) :
		echo '<div class="row">';
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'grid');

		endwhile;
		
		/**
		* Hook - joyas_shop_loop_navigation 	
		*
		* @hooked site_loop_navigation	- 10
		*/
		do_action( 'joyas_shop_loop_navigation');
		 echo '</div>';
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
		
/**
* Hook - joyas_shop_container_wrap_end	
*
* @hooked container_wrap_end - 999
*/
 do_action( 'joyas_shop_container_wrap_end', esc_attr( $layout ));
get_footer();
