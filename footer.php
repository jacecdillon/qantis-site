<footer class="site-footer">
    <div class="footer-container">
        
        <div class="footer-contact-info">
            <span class="footer-subtitle">
                <?php echo esc_html(get_field('footer_contact_subtitle', 'option') ?: 'CONTACT'); ?>
            </span>
            <h2 class="footer-title">
                <?php echo esc_html(get_field('footer_contact_titel', 'option') ?: 'Neem contact op'); ?>
            </h2>

            <div class="contact-details">
                <?php if ($telefoon = get_field('telefoonnummer', 'option')) : ?>
                    <p class="phone"><strong><?php echo esc_html($telefoon); ?></strong></p>
                <?php endif; ?>

                <?php if ($email = get_field('emailadres', 'option')) : ?>
                    <p>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="email-link">
                            <?php echo esc_html($email); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <br>

                <?php if ($openingstijden = get_field('openingstijden', 'option')) : ?>
                    <p class="hours"><strong><?php echo esc_html($openingstijden); ?></strong></p>
                <?php endif; ?>
            </div>

            <div class="address-details">
                <?php if ($adres_1 = get_field('adres_regel_1', 'option')) : ?>
                    <p><?php echo esc_html($adres_1); ?></p>
                <?php endif; ?>
                
                <?php if ($adres_2 = get_field('adres_regel_2', 'option')) : ?>
                    <p><?php echo esc_html($adres_2); ?></p>
                <?php endif; ?>
            </div>

            <div class="footer-map">
                <?php if ($map_url = get_field('kaart_embed_url', 'option')) : ?>
                    <iframe 
                        src="<?php echo esc_url($map_url); ?>" 
                        width="100%" 
                        height="180" 
                        style="border:0; border-radius: 8px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-form-wrapper">
            <span class="footer-subtitle">
                <?php echo esc_html(get_field('footer_form_subtitle', 'option') ?: 'OF PLAN EEN KENNISMAKINGSGESPREK'); ?>
            </span>
            
            <form id="qantis-contact-form" class="contact-form">
                <?php wp_nonce_field('qantis_contact_nonce', 'nonce'); ?>
                
                <input type="text" name="website_hp" style="display:none !important;" tabindex="-1" autocomplete="off">

                <div class="form-row">
                    <input type="text" name="naam" placeholder="Naam" required>
                    <input type="text" name="bedrijfsnaam" placeholder="Bedrijfsnaam">
                </div>
                
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-checkbox">
                    <label>
                        <input type="checkbox" name="bellen" value="1">
                        <span>Ik word liever gebeld</span>
                    </label>
                </div>

                <div class="form-group">
                    <textarea name="bericht" rows="5" placeholder="Bericht" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Verstuur</button>
                <div id="form-response" style="display:none; margin-top:15px;"></div>
            </form>
        </div>

    </div>

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