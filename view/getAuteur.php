<?php $title = 'Les auteurs'?>
<?php ob_start(); ?>

<section class="container-fluid">
        <div class="row col-12 justify-content-center">
            <?php
            $list = viewAuteur();
            foreach ($list as $read){
            ?>

            <div class="card" style='width:18rem'>
                <div class="card-body" style='width:15rem'>
                    <img src="<?php echo $read['photo'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Nom de l'auteur : <?php echo $read['nom']; ?></h5>
                        <a href="index.php?action=vueAuteur&id=<?php echo $read['id_auteur'] ?>"><button type="button" name="fiche" class="btn btn-dark">Fiche</button></a>
                    </div>
                </div>
            </div>
            <?php } ; ?>
        </div>
    </section>

<?php $content = ob_get_clean()?>
<?php require 'view/template.php' ?>