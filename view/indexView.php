<?php ob_start(); ?>

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">LES MINIONS</h5>
    <p class="card-text">Vous retrouverez une serie d'animé ou de dessin animé.</p>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>