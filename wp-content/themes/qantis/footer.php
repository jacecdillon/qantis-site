<?php
echo "FOOTER WORKS"; 
?><br>


<?php 
$phone = get_field('telefoonnummer', 'option');
$email = get_field('e_mailadres', 'option');
$adresregels = get_field('adresregels', 'option');
$opentime = get_field('openingstijden', 'option');
$social_links = get_field('socialoverige_links', 'option');
$copy_text = get_field('footer_copyright_tekst', 'option');
$links = get_field('footer_links', 'option');
$coord_array = get_field('coordinaten', 'option');
$coord = implode(',', $coord_array);
$url = get_field('embed_url', 'option');
?>

<?php echo $phone?><br>
<?php echo $email?><br>
<?php echo $adresregels?><br>
<?php echo $opentime?><br>
<?php echo $social_links?><br>
<?php echo $copy_text?><br>
<?php echo $links?><br>
<?php echo $coord?><br>
<?php echo $url?><br>
