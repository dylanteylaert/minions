<?php $title = 'Anim' ?>
<?php ob_start(); ?>

    <section class="container-fluid">
        <div class="row col-12 justify-content-center">
            <?php
            $list = getDessins();
            foreach ($list as $read){
            ?>

            <div class="card" style='width:18rem'>
                <div class="card-body" style='width:15rem'>
                    <img src="<?php echo $read['image'] ;?>" class="card-img-top" alt="" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Titre : <?php echo $read['dessin']; ?></h5>
                        <a href="index.php?action=readDessins=<?php echo $read['id'] ?>"><button type="button" name="fiche" class="btn btn-dark">Fiche</button></a>
                    </div>
                </div>
            </div>
            <?php } ; ?>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php' ; ?>