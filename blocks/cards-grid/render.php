<?php
$title = get_field( 'section_title' );
$cards = get_field( 'cards' );

if ( ! $cards ) return;
?>

<section <?php echo get_block_wrapper_attributes( [ 'class' => 'cards-grid' ] ); ?>>

    <?php if ( $title ) : ?>
        <h2 class="cards-grid__title"><?php echo esc_html( $title ); ?></h2>
    <?php endif; ?>

    <ul class="cards-grid__list" role="list">
        <?php foreach ( $cards as $card ) :
            $image = $card['image'] ?? null;
        ?>
            <li class="cards-grid__item">
                <?php if ( $image ) : ?>
                    <img
                        src="<?php echo esc_url( $image['sizes']['medium_large'] ?? $image['url'] ); ?>"
                        alt="<?php echo esc_attr( $image['alt'] ); ?>"
                        width="<?php echo esc_attr( $image['sizes']['medium_large-width'] ?? $image['width'] ); ?>"
                        height="<?php echo esc_attr( $image['sizes']['medium_large-height'] ?? $image['height'] ); ?>"
                        loading="lazy"
                        decoding="async"
                    >
                <?php endif; ?>

                <?php if ( ! empty( $card['title'] ) ) : ?>
                    <h3 class="cards-grid__card-title"><?php echo esc_html( $card['title'] ); ?></h3>
                <?php endif; ?>

                <?php if ( ! empty( $card['text'] ) ) : ?>
                    <p class="cards-grid__card-text"><?php echo esc_html( $card['text'] ); ?></p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

</section>
