<?php $title = 'Auteur' ?>
<?php ob_start(); ?>

<section class="container-fluid">
    <div class="row col-12 justify-content-center">
        <?php
        $list = lireAuteur();
        foreach ($list as $read){
        ?>
        <div class="card">
            <div class="card-body">
                <img src="<?php echo $read['photo'] ;?>" alt="">
                
                <div class="ml-3">
                    <p class="card-title">Titre : <?php echo $read['nom']; ?></p>
                    <p class="card-text">Description : <?php echo $read['style']; ?></p>
                    <a href="index.php?action=modifAuteurs&id=<?php echo $read['id_auteur'] ?>"><button class="btn btn-dark">Modifier</button></a>
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