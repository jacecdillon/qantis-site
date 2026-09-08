<?php 
$cta = get_field('cta');
?>

<h1>
    <?php echo $cta['titel']; ?>
</h1>
<p>
    <?php echo $cta['tekst']; ?>
</p>
<a href="<?php echo $cta['buttonlink']['url']?>"><?php echo $cta['buttontekst']?></a>