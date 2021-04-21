<?php
/**
 * Archive partial
 *
 * @package      MamiExperimentos
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/

$img = genesis_get_image(
    array(
        'format' => 'html', 
        'size' => 'thumbnail', 
        'attr' => 
        array(
            'class' => 'entrada__img'
        )
    ));

echo '<article class="entrada blog">';
    // echo '<a href="' . get_permalink() . '" class="entrada__link" tabindex="-1" aria-hidden="true">';

        echo '<header class="entrada__img">';
            echo '<a href="' . get_permalink() . '" class="entrada__title__link">' . $img . '</a>';
        echo '</header>';
        echo '<div class="entrada__container">';
            echo '<h2 class="entrada__title"><a href="' . get_permalink() . '" class="entrada__title__link">' . get_the_title() . '</a></h2>';
            echo '<p class="entrada__content">';
                echo wp_trim_words( get_the_content(), 22, '...<a href="' . get_permalink() . '" class="read-more-link" rel="nofollow">Leer más</a>' );
            echo '</p>';
        echo '</div>';

    // echo '</a>';
echo '</article>';







