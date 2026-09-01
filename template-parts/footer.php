<footer class="site-footer">
    <div class="footer-container">
        
        <div class="footer-contact-info">
            <span class="footer-subtitle">CONTACT</span>
            <h2 class="footer-title">Neem contact op</h2>

            <div class="contact-details">
                <p class="phone"><strong>088 35 20 600</strong></p>
                <p><a href="mailto:recruitment@qantis.nl" class="email-link">recruitment@qantis.nl</a></p>
                <br>
                <p class="hours"><strong>Ma - Vr 9:00 - 17:00</strong></p>
            </div>

            <div class="address-details">
                <p>Keesomstraat 12C</p>
                <p>1821 BS Alkmaar</p>
            </div>

            <div class="footer-map">
                <iframe 
                    src="https://www.openstreetmap.org/export/embed.html?bbox=4.7200%2C52.6100%2C4.7800%2C52.6500&amp;layer=mapnik" 
                    width="100%" 
                    height="180" 
                    style="border:0; border-radius: 8px;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <div class="footer-form-wrapper">
            <span class="footer-subtitle">OF PLAN EEN KENNISMAKINGSGESPREK</span>
            
            <form action="#" method="post" class="contact-form">
                <div class="form-row">
                    <input type="text" name="naam" placeholder="Naam" required>
                    <input type="text" name="bedrijfsnaam" placeholder="Bedrijfsnaam">
                </div>
                
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-checkbox">
                    <label>
                        <input type="checkbox" name="bellen">
                        <span>Ik word liever gebeld</span>
                    </label>
                </div>

                <div class="form-group">
                    <textarea name="bericht" rows="5" placeholder="Bericht"></textarea>
                </div>

                <button type="submit" class="btn-submit">Verstuur</button>
            </form>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <div class="copyright">
                © <?php echo date('Y'); ?> Qantis — makes IT easy · Keesomstraat 12C, Alkmaar
            </div>
            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Algemene voorwaarden</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>