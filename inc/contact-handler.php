<?php
if (!defined('ABSPATH')) {
    exit;
}

function qantis_enqueue_contact_assets() {
    wp_enqueue_script(
        'qantis-contact',
        get_template_directory_uri() . '/assets/js/contact.js',
        array(),
        '1.0',
        true
    );

    wp_localize_script('qantis-contact', 'qantis_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'qantis_enqueue_contact_assets');

add_action('wp_ajax_submit_contact_form', 'qantis_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'qantis_handle_contact_form');

function qantis_handle_contact_form() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'qantis_contact_nonce')) {
        wp_send_json_error('Beveiligingscontrole mislukt.');
    }

    if (!empty($_POST['website_hp'])) {
        wp_send_json_success('Bedankt voor je bericht!');
    }

    $naam         = isset($_POST['naam']) ? sanitize_text_field($_POST['naam']) : '';
    $bedrijfsnaam = isset($_POST['bedrijfsnaam']) ? sanitize_text_field($_POST['bedrijfsnaam']) : '';
    $email        = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $bellen       = isset($_POST['bellen']) ? 'Ja' : 'Nee';
    $bericht      = isset($_POST['bericht']) ? sanitize_textarea_field($_POST['bericht']) : '';

    if (empty($naam) || empty($email) || empty($bericht)) {
        wp_send_json_error('Vul alle verplichte velden in.');
    }

    if (!is_email($email)) {
        wp_send_json_error('Vul een geldig e-mailadres in.');
    }

    $to = get_field('emailadres', 'option') ?: 'recruitment@qantis.nl';
    $subject = 'Nieuw contactbericht van ' . $naam;

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Qantis Website <no-reply@qantis.nl>',
        'Reply-To: ' . $naam . ' <' . $email . '>'
    );

    $body  = "<h2>Nieuw bericht via het contactformulier</h2>";
    $body .= "<p><strong>Naam:</strong> " . esc_html($naam) . "</p>";
    $body .= "<p><strong>Bedrijfsnaam:</strong> " . esc_html($bedrijfsnaam) . "</p>";
    $body .= "<p><strong>E-mailadres:</strong> " . esc_html($email) . "</p>";
    $body .= "<p><strong>Voorkeur voor bellen:</strong> " . esc_html($bellen) . "</p>";
    $body .= "<p><strong>Bericht:</strong><br>" . nl2br(esc_html($bericht)) . "</p>";

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success('Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.');
    } else {
        wp_send_json_error('Er is een fout opgetreden bij het versturen.');
    }
}