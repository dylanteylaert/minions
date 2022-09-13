<?php $title = 'Anim miam' ?>
<?php ob_start(); ?>

<section class="container-fluid">
    <div class="row col-12 justify-content-center">
        <?php
        $list = lireDessins();
        foreach ($list as $read){
        ?>
        <div class="card mt-5 mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?php echo $read['image'] ;?>" alt="" width="100%">
                </div>
                <div class="col-md-8">
                <div class="card-body" >
                    <p class="card-title" >Titre : <?php echo $read['dessin']; ?></p>
                    <p class="card-text" >Description : <?php echo $read['description']; ?></p>
                    <a href="index.php?action=modifDessins&id=<?php echo $read['id_dessins'] ?>"><button class="btn btn-dark">Modifier</button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Supprimer</button>
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
                        <input type="submit" class="btn btn-danger" name="supdessin" value="Supprimer">
                    </form>
                </div>
                </div>
            </div>
       
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php' ; ?>