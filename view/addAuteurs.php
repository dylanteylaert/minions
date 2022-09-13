<?php $title = 'Ajouter auteur'; ?>
<?php ob_start(); ?>

<div class="container mb-5">
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Nom de L'auteur:</label>
            <input type="text" class="form-control" name="auteur" placeholder="Nom" required >
        </div>
        <div>
            <label>Style:</label>
            <input type="text" class="form-control" name="style" placeholder="style" required>
        </div>
        <div>
        <label class="mt-3">image de l'auteur:</label>
            <label>Image de L'auteur</label><br>
            <input type="file" name="imgauteur" id="image" accept="image/png, image/jpeg" required>
        </div>
        
        <input type="submit" name="submitAuteurs" value="envoyer" class="btn btn-success">
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>