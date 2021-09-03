<?php
/**
 * Adsense functions
 *
 * @package     MamiExperimentos
 * @author      Luis Colomé
 * @since       0.9.9
 * @license     GPL-2.0+
**/


/**
 * Publicidad tras el sexto artículo en blog, página de categoría y resutados de busqueda.
 *
 * @see  https://crunchify.com/how-to-insert-ads-on-home-page-after-2nd-and-5th-post-in-genesis-framework/
 *
 */
function lcm_adsense_on_cat_search_tag() {
  
  $banner_archive = get_field( 'mmx_adsense_archive', 'option' );
  
  global $loop_counter;
	$loop_counter++;
	if( !is_singular() && ($loop_counter == 6) && !empty($banner_archive) ) {
        echo '<div class="anuncio anuncio__archive"><div class="anuncio__wrap">';
        echo $banner_archive;
        echo'</div></div>';
        $loop_counter = $loop_counter + 1;
	}
}
add_action( 'genesis_after_entry', 'lcm_adsense_on_cat_search_tag', 10 );


/**
 * Puclividad al final de las paginas de blog, archivo y resultados de búsqueda.
 * 
 */
function mmx_adsense_after_content_archive(){

    $banner_single_after_content = get_field( 'mmx_adsense_end_content', 'option' );

    if( !is_singular() && !empty($banner_single_after_content) ) {
        echo '<div class="anuncio anuncio__archive"><div class="anuncio__wrap">';
        echo $banner_single_after_content;
        echo'</div></div>';
    }

}
add_action( 'genesis_after_endwhile', 'mmx_adsense_after_content_archive', 8 );



/** 
 * Publicidad tras el tercer párrafo en los posts.
 * 
 */
function mmx_adsense_in_content_third_paragraph( $content ) {
    if( !is_single() )
        return $content;

        $banner_single = get_field( 'mmx_adsense_post_body', 'option' );

        $paragraphAfter = 3; //Este es el número del párrafo tras el que irá la publicidad
        $content = explode ( "</p>", $content );
        $new_content = '';
            for ( $i = 0; $i < count ( $content ); $i ++ ) {
                if ( $i == $paragraphAfter && !empty($banner_single) ) {
                $new_content .= '<div class="anuncio anuncio__archive"><div class="anuncio__wrap">';
                $new_content .= $banner_single;
                $new_content .= '</div></div>';
                }
        $new_content .= $content[$i] . "</p>";
        }
        return $new_content;
}
add_filter( 'the_content', 'mmx_adsense_in_content_third_paragraph' );


/** 
 * Publicidad tras el duodécimo párrafo en los posts.
 * 
 */
function mmx_adsense_in_content_twelfth_paragraph( $content ) {
    if( !is_single() )
        return $content;

        $banner_single = get_field( 'mmx_adsense_post_body', 'option' );

        $paragraphAfter = 12; //Este es el número del párrafo tras el que irá la publicidad
        $content = explode ( "</p>", $content );
        $new_content = '';
            for ( $i = 0; $i < count ( $content ); $i ++ ) {
                if ( $i == $paragraphAfter && !empty($banner_single) ) {
                $new_content .= '<div class="anuncio anuncio__archive"><div class="anuncio__wrap">';
                $new_content .= $banner_single;
                $new_content .= '</div></div>';
                }
        $new_content .= $content[$i] . "</p>";
        }
        return $new_content;
}
//add_filter( 'the_content', 'mmx_adsense_in_content_twelfth_paragraph' );


/**
 * Puclividad al final de cada articulo (antes de los comentarios)
 * 
 */
function mmx_adsense_after_content(){
	if( !is_single() ) 
    return;

    $banner_single_after_content = get_field( 'mmx_adsense_end_content', 'option' );
    echo '<div class="anuncio anuncio__archive"><div class="anuncio__wrap">';
    echo $banner_single_after_content;
    echo'</div></div>';

}
add_action( 'genesis_after_entry', 'mmx_adsense_after_content', 9 );