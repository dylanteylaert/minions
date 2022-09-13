<?php $title = 'Anim' ?>
<?php ob_start(); ?>

    <section class="container-fluid mb-5 pt-5 pb-5">
        <div class="row col-12 justify-content-center">
            <?php
            $list = afficheDessins();
            foreach ($list as $read){
            ?>

            <div class="card ml-2" >
            <div class="card-body text-center d-flex flex-column">
                    <img src="<?php echo $read['image'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Titre : <?php echo $read['dessin']; ?></h5>
                        <a href="index.php?action=dessin&id=<?php echo $read['id_dessins'] ?>" ><button type="button" name="fiche" class="btn btn-dark mt-auto">Fiche</button></a>
                    </div>
                </div>
            </div>
            <?php } ; ?>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php' ; ?>