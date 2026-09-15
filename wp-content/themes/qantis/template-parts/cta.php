<?php 

$cta = get_field('cta');

$button_link = $cta['buttonlink'] ?? '';

if (is_array($button_link)) {
    $button_link = $button_link['url'] ?? '';
}

?>

<h1>
    <?php echo esc_html($cta['titel']); ?>
</h1>

<p>
    <?php echo esc_html($cta['tekst']); ?>
</p>

<?php if (!empty($cta['buttontekst']) && !empty($button_link)): ?>

    <a href="<?php echo esc_url($button_link); ?>">
        <?php echo esc_html($cta['buttontekst']); ?>
    </a>

<?php endif; ?>