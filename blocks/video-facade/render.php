<?php
$video_id = get_field( 'video_id' );
$poster   = get_field( 'poster_image' );
$caption  = get_field( 'caption' );

if ( ! $video_id ) return;

$poster_url = $poster
    ? esc_url( $poster['sizes']['large'] ?? $poster['url'] )
    : 'https://i.ytimg.com/vi/' . esc_attr( $video_id ) . '/maxresdefault.jpg';
?>

<div <?php echo get_block_wrapper_attributes( [ 'class' => 'video-facade' ] ); ?>
     data-video-id="<?php echo esc_attr( $video_id ); ?>">

    <button class="video-facade__trigger" aria-label="<?php esc_attr_e( 'Play video', 'wpacfb' ); ?>">
        <img
            src="<?php echo $poster_url; ?>"
            alt=""
            loading="lazy"
            decoding="async"
            width="1280"
            height="720"
        >
        <span class="video-facade__play" aria-hidden="true"></span>
    </button>

    <?php if ( $caption ) : ?>
        <p class="video-facade__caption"><?php echo esc_html( $caption ); ?></p>
    <?php endif; ?>

</div>

<script>
(function () {
    document.querySelectorAll( '.video-facade[data-video-id]' ).forEach( function ( el ) {
        el.querySelector( '.video-facade__trigger' ).addEventListener( 'click', function () {
            var id     = el.dataset.videoId;
            var iframe = document.createElement( 'iframe' );
            iframe.src             = 'https://www.youtube-nocookie.com/embed/' + id + '?autoplay=1&rel=0';
            iframe.allow           = 'autoplay; encrypted-media; picture-in-picture';
            iframe.allowFullscreen = true;
            iframe.loading         = 'lazy';
            iframe.width           = '1280';
            iframe.height          = '720';
            el.querySelector( '.video-facade__trigger' ).replaceWith( iframe );
        }, { once: true } );
    } );
}());
</script>
