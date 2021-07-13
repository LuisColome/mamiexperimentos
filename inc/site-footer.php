<?php
/**
 * Site Footer
 *
 * @package      MamiExperimentos
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Site Footer
 */
function lcm_site_footer() {
	echo '<div class="footer-left">';
		echo '<p class="copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '. Desarrollado por <a href="https://luiscolome.com/">Luis Colome</a> con <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E97171" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> y <a href="https://wordpress.org/">WordPress</a>.</p>';
		//echo '<p class="footer-links"><a href="' . home_url( 'aviso-legal' ) . '">Aviso Legal</a> <a href="' . home_url( 'politica-de-cookies' ) . '">Política de cookies</a> <a href="' . home_url( 'politica-de-privacidad' ) . '">Política de privacidad</a></p>';
	echo '</div>';
	// echo '<a class="backtotop" href="#">Back to top' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'genesis_footer', 'lcm_site_footer' );
remove_action( 'genesis_footer', 'genesis_do_footer' );

/**
 * Back to top link
 * 
 */
function lcm_back_to_top(){
	echo '<a class="backtotop" href="#">' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}
add_action( 'genesis_after', 'lcm_back_to_top', 10 );