<footer class="site-footer">
    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <div class="copyright">
                © <?php echo date('Y'); ?> <?php echo esc_html(get_field('copyright_tekst', 'option') ?: 'Qantis — makes IT easy'); ?>
            </div>
            
            <div class="footer-links">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ));
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>