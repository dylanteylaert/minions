<?php $title = 'modifier auteur'; ?>
<?php ob_start(); ?>
<?php
        $list = lireAuteur();
        foreach ($list as $read){
        ?>
<div class="container mb-5">
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Nom de L'auteur : </label>
            <input type="text" class="form-control" name="auteurmodif" placeholder="dessin animé ou animé" value="<?php echo $read['nom']; ?>">
        </div>
        <div>
            <label>Style : </label>
            <input type="text" class="form-control" name="stylemodif" placeholder="description" value="<?php echo $read['style']; ?>">
        </div>
        <div>
            <label>Image de l'auteur : </label><br>
            <input type="file" name="imgAuteurmodif" id="image" accept="image/png, image/jpeg">
        </div>
        <input type="submit" name="submitAuteursmodif" value="submit" class="btn btn-success">
        <input type="hidden" name="id"  value="<?= $_GET['id']; ?>">
    </form>
</div>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>