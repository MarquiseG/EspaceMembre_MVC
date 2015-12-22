
<?php
foreach($commentaires as $commentaire)
{
?>
<div class="news">
    <h3>
        <?php echo $commentaire['auteur']; ?>
        <em>le <?php echo $commentaire['date_creation']; ?></em>
    </h3>
    
    <p>
    <?php echo $commentaire['commentaire']; ?>
    <br />
    </p>
</div>
<?php
}
?>

