<footer class="site-footer">
    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <div class="copyright">
                © <?php echo date('Y'); ?> <?php echo esc_html(get_field('copyright_tekst', 'option') ?: 'Qantis — makes IT easy'); ?>
            </div>
            
           <div class="footer-bottom-links">
    <?php 
    $privacy_url = get_privacy_policy_url();
    if ( $privacy_url ) : 
    ?>
        <a href="<?php echo esc_url( $privacy_url ); ?>">Privacy</a>
    <?php else : ?>
        <a href="<?php echo esc_url( home_url('/privacybeleid') ); ?>">Privacy</a>
    <?php endif; ?>
    
    <a href="<?php echo esc_url( home_url('/algemene-voorwaarden') ); ?>">Voorwaarden</a>
</div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>