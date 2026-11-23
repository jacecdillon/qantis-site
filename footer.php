<?php
function qantis_footer_rows( $repeater ) {
    $rows = array();
    if ( function_exists( 'have_rows' ) && have_rows( $repeater, 'option' ) ) {
        while ( have_rows( $repeater, 'option' ) ) {
            the_row();
            $label = get_sub_field( 'label' );
            $url   = get_sub_field( 'url' );
            if ( $label && $url ) {
                $rows[] = array( $label, $url );
            }
        }
    }
    return $rows;
}

$footer_links = qantis_footer_rows( 'footer_links' );
$social_links = qantis_footer_rows( 'social_links' );

if ( empty( $footer_links ) ) {
    $privacy_url  = get_privacy_policy_url() ?: home_url( '/privacybeleid' );
    $footer_links = array(
        array( 'Privacy', $privacy_url ),
        array( 'Voorwaarden', home_url( '/algemene-voorwaarden' ) ),
    );
}
?>
<footer class="site-footer">
    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <div class="copyright">
                © <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php echo esc_html( qantis_option( 'copyright_tekst', 'Qantis — makes IT easy' ) ); ?>
            </div>

            <?php if ( $social_links ) : ?>
                <div class="footer-bottom-links footer-social">
                    <?php foreach ( $social_links as $link ) : ?>
                        <a href="<?php echo esc_url( $link[1] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $link[0] ); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="footer-bottom-links">
                <?php foreach ( $footer_links as $link ) : ?>
                    <a href="<?php echo esc_url( $link[1] ); ?>"><?php echo esc_html( $link[0] ); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
