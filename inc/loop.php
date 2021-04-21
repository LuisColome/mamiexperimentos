<?php
/**
 * Loop
 *
 * @package 	MamiExperimentos
 * @author      Luis Colomé
 * @since       1.0.0
 * @license     GPL-2.0+
**/

/**
 * Use Archive Loop in every archive page (blog page included)
 *
 */
function ea_use_archive_loop() {

	if( ! is_singular() ) {
		add_action( 'genesis_loop', 'lcm_archive_loop' );
		remove_action( 'genesis_loop', 'genesis_do_loop' );
	}
}
add_action( 'template_redirect', 'ea_use_archive_loop', 20 );

/**
 * Archive Loop
 * Uses template partials from /partials
 */
function lcm_archive_loop() {

	if ( have_posts() ) {

        // We apply the class conditionaly.
        $archive_class =  is_category( array(2,5,28,29,30,31) ) ? 'archive-grid' : 'archive-blog';
		echo '<section class="entradas ' . $archive_class . '">'; 
		do_action( 'genesis_before_while' );

		while ( have_posts() ) {

			the_post();
			do_action( 'genesis_before_entry' );

			// Template part
			$partial = apply_filters( 'ea_loop_partial', 'archive' );
			// conditional template part
			$context = apply_filters( 'ea_loop_partial_context', is_category( array(2,5,28,29,30,31) ) ? 'grid' : '');
			get_template_part( 'partials/' . $partial, $context );

			do_action( 'genesis_after_entry' );

		}

		do_action( 'genesis_after_endwhile' );
		echo '</section>';

	} else {

		do_action( 'genesis_loop_else' );

	}
}