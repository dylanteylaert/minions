<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<?php require('config.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: ../index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="POST" name="login">
  <h1 class="box-title">Connexion</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
  <input type="password" class="box-input" name="password" placeholder="Mot de passe">
  <input type="submit" value="Connexion " name="submit" class="box-button"><br>
  
  <p class="box-register">Vous êtes nouveau ici ? <a href="register.php">S'inscrire</a></p>
  <a type="button" class="mt-5" href="../index.php"><button type="button" class="btn btn-dark">Accueil</button></a>
  <?php if (! empty($message)) { ?>
      <p class="errorMessage"><?php echo $message; ?></p>
  <?php } ?>
  
</form>

