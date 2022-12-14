<?php $title = 'Auteur' ?>
<?php ob_start(); ?>

<section class="container-fluid">
    <div class="row col-12 justify-content-center">
        <?php
        $list = lireAuteur();
        
        foreach ($list as $read){
        
        ?>
       
        <div class="card card2 mt-5 mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?php echo $read['photo'] ;?>" class="imgfiche" alt="" width="100%">
                </div>
                <div class="col-md-8">
                <div class="card-body" >
                    <p class="card-title" >Titre : <?php echo $read['nom']; ?></p>
                    <p class="card-text" >Description : <?php echo $read['style']; ?></p>
                    <?php 
                    $list2 = user();
                    foreach ($list2 as $value){
                    if(!empty($_SESSION['username']) && $value['admin'] === 1){ ?>
                    <a href="index.php?action=modifAuteurs&id=<?php echo $read['id_auteur'] ?>"><button class="btn btn-dark">Modifier</button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Supprimer</button>
                    <?php } } ?>
                </div>
                </div>
            </div>
        </div>
        <!-- POP-UP -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Es tu sur de vouloir supprimer?</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" class="btn btn-danger" name="supAuteur" value="Supprimer">
                    </form>
                </div>
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