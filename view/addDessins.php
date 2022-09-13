<?php $title = 'Ajouter animé'; ?>
<?php ob_start(); ?>

<div class="container mb-5">
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Dessin animé ou animé:</label>
            <input type="text" class="form-control" name="dessin" placeholder="dessin animé ou animé" required >
        </div>
        <div>
            <label>Description:</label>
            <input type="text" class="form-control" name="description" placeholder="description" required>
        </div>
        <div>
            <label>Image du dessin animé ou animé</label><br>
            <input type="file" name="img" id="image" accept="image/png, image/jpeg" required>
        </div>
        <input type="submit" name="submitDessins" value="submit" class="btn btn-success">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>