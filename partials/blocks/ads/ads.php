<?php

/**
 * AdSense Custom  Block.
 *
 * Añade  un bloque de  publicidad enGutenberg en base a un cmapo personalizado en la página opciones.
 * 
 */

 /**
 * Codigo AdSense del campo personalizado.
 * 
 */
function mmx_adsense_after_content_archive(){

    $banner_custom_adsense = get_field( 'mmx_adsense_end_content', 'option' );

    echo '<div class="anuncio anuncio__archive"><div class="anuncio__wrap">';
    echo $banner_custom_adsense;
    echo'</div></div>';

}
add_action( 'genesis_after_endwhile', 'mmx_adsense_after_content_archive', 8 );