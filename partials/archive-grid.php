<?php
/**
 * Tutotials Archive partial
 * Partial used in "Tutoriales Genesis" category.
 *
 * @package      MundoGenesis
 * @author       Luis Colomé
 * @since        1.0.0
 * @license      GPL-2.0+
**/
$image = get_the_post_thumbnail_url(get_the_ID(),'mmx-featured-image');

// we get the category if not empty
$categories = get_the_category();
$cat = ! empty( $categories ) ? esc_html( $categories[0]->name) : '';
// We get only category's name first word.
$cat_array = explode(' ', $cat);
$cat_first_word = $cat_array[0];
$cat_second_word = $cat_array[1];

echo '<article class="entrada grid">';
    echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '" class="entrada__link" tabindex="-1" aria-hidden="true" rel="nofollow">';
        echo '<div class="entrada__img" style="background: url(' . esc_url($image) . ') 50% 50% no-repeat;background-size:cover;">';
        echo '</div>';
    echo '</a>';

    echo '<header class="entrada__header">';
        echo '<span class="entrada__meta">'. $cat_first_word .' ' . $cat_second_word .'</span>';
        echo '<h2 class="entrada__title"><a href="' . get_permalink() . '" class="entrada__title__link">' . get_the_title() . '</a></h2>';
        echo '<p class="entrada__content">' . wp_trim_words( get_the_content(), 20, '... <a href="' . get_permalink() . '" class="read-more-link" rel="nofollow">Leer más</a>' ) . '</p>';
    echo '</header>';
echo '</article>';