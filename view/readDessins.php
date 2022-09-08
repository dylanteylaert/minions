<?php $title = 'Anim miam' ?>
<?php ob_start(); ?>

<section class="container-fluid">
    <div class="row col-12 justify-content-center">
        <?php
        $list = lireDessins();
        foreach ($list as $read){
        ?>
        <div class="card">
            <div class="card-body">
                <img src="<?php echo $read['image'] ;?>" alt="">
                
                <div class="ml-3">
                    <p class="card-title">Titre : <?php echo $read['dessin']; ?></p>
                    <p class="card-text">Description : <?php echo $read['description']; ?></p>
                    <a href="index.php?action=modifDessins&id=<?php echo $read['id_dessins'] ?>"><button class="btn btn-dark">Modifier</button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Supprimer</button>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php' ; ?>