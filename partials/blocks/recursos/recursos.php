<?php

/**
 * recursos Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'recursos-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'recursos';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults for Image1.
// $image = get_field('recurso_1_image');
// if( $image ):

//     // Image1 variables. 
//     $image_url = $image1['url'];
//     $image_title = $image1['title'];
//     $image_alt = $image1['alt'];

//     // Thumbnail and size attributes for image1.
//     $image_size = 'cfhh-large-images';
//     $image_thumb = $image1['sizes'][ $size ];

// endif;

// // Load values and assign defaults for Link1.
// $link = get_field('recurso_1_link');
// if( $link ): 

//     $link_url = $link['url'];
//     $link_title = $link['title'];
//     $link_target = $link['target'] ? $link1['target'] : '_self';

// endif;



// Let's build the block
?>
<div id="<?php echo esc_attr($id); ?>" class="recursos-block <?php echo esc_attr($className); ?>">

    <?php
    // Check rows exists.
    if( have_rows('recurso_page') ): ?>
    <div class="recursos-block__columns">
        <?php
        while( have_rows('recurso_page') ) : the_row();

        // Load values and assign defaults for Link1.
        $link = get_sub_field('recurso_link');
        if( $link ): 

            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link1['target'] : '_self';

        endif;
        ?>
            <div class="recursos-block__column complete-image">
                <?php if( $link ): ?>
                <a class="recursos-block__link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                <?php endif; ?>

                    <div class="recursos-block__column__inner">
                        <?php
                        $image = get_sub_field('recurso_image');
                        if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="recursos-block__image"/>
                        <?php endif; ?>
                        <h5 class="recursos-block__title"><?php echo esc_html( $link_title ); ?></h5>              
                    </div>

                <?php if( $link ): ?>
                </a>
                <?php endif; ?>              
            </div>

        <?php endwhile; ?>

    </div>  
    
    <?php endif; ?>

</div>