
<?php
// echo htmlspecialchars($_GET['billet']);
foreach($sujets as $sujet)
{
?>
<div class="news">
    <h3>
        <?php echo $sujet['titre']; ?>
        <em>le <?php echo $sujet['date_creation']; ?></em>
    </h3>
    
    <p>
    <?php echo $sujet['contenu']; ?>
    <br />
    <em><a href="index.php?uc=forum&action=commentaires&billet=<?php echo $sujet['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
}
?>
</body>
</html>
