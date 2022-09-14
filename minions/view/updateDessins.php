<?php $title = 'modifier animé'; ?>
<?php ob_start(); ?>
<?php
        $list = lireDessins();
        foreach ($list as $read){
        ?>
<div class="container mb-5">
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Dessin animé ou animé:</label>
            <input type="text" class="form-control" name="dessinmodif" placeholder="dessin animé ou animé" value="<?php echo $read['dessin']; ?>">
        </div>
        <div>
            <label>Description:</label>
            <input type="text" class="form-control" name="descriptionmodif" placeholder="description" value="<?php echo $read['description']; ?>">
        </div>
        <div>
            <label>Image du dessin animé ou animé</label><br>
            <input type="file" name="imgmodif" id="image" accept="image/png, image/jpeg">
        </div>
        <input type="submit" name="submitDessinsmodif" value="submit" class="btn btn-success">
        <input type="hidden" name="id"  value="<?= $_GET['id']; ?>">
    </form>
</div>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>