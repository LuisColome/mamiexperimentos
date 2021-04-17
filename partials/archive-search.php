<?php
/**
 * Archive Search partial
 * Search partial used in search resutls page.
 *
 * @package      MundoGenesis
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/
$image = get_the_post_thumbnail_url(get_the_ID(),'full');

echo '<article class="entrada archive-post">';
    echo '<a href="' . get_permalink() . '" class="entrada__link" tabindex="-1" aria-hidden="true">';

        echo '<header class="entrada__header">';
            echo '<h2 class="entrada__title">' . get_the_title() . ' - search</h2>';
            $categories = get_the_category();
            echo '<span class="entrada__cat">';
            echo esc_html( $categories[0]->name );
            echo '</span>';
        echo '</header>';
        echo '<p class="entrada__content">';
            echo wp_trim_words( get_the_content(), 25, '...' );
        echo '</p>';

    echo '</a>';
echo '</article>';







