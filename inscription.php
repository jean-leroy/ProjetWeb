<?php require 'header.php'; ?>
<?php require_once 'db.php'; ?>

<?php

if (!empty($_POST)){

  $errors = array();

  if (empty($_POST['password']))
  {
    $errors['password'] = " Vous n'avez pas saisie de mot de passe";
  }

  if (empty($_POST['email']))
  {
    $errors['email'] = " Vous n'avez pas saisie d'email";
  }
  if ($_POST['confirmPassword'] != $_POST['password'])
  {
    $errors['confirmPassword'] = " Mot de passes saisies différents. ";
  }


// Verification de l'existence  d'un email dans la bdd



$sql1 ="SELECT email FROM users WHERE email = '".$_POST['email']."'";
$result = $conn->query($sql1);

    if($row = $result->fetch_assoc()) {
      $errors['email'] = "Un compte avec cet email existe déjà";
}



// Si le tableau est vide on procède à l'inscription 


if (empty($errors))
{

  $email = "";
  if (isset($_POST['email']))
  {
    $email = $_POST['email'];
  }
  $password = "";
  if (isset($_POST['password']))
  {
    $password = $_POST['password'];
  }
  $pseudo = "";
  if (isset($_POST['pseudo']))
  {
    $pseudo = $_POST['pseudo'];
  }



  /* Prepared statement, stage 1: prepare */

  if (!($sql = $conn->prepare("INSERT INTO `users` (`idUser`, `email`, `pseudo`, `password`) VALUES (NULL, ?, ?, ?); " )))
  {
   echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
 }


 if (!$sql->bind_param("sss", $email, $pseudo, $password)) {
 }

 if (!$sql->execute()) {
  echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
  }

  else
  {
    if (isset($_SESSION))
    {
      echo "memoire active";
    }
    else 
    {
      echo "memoire inactive";
    }
   // $_SESSION['auth'] = $email;
    die ("Votre compte a bien été crée");
     //header("Location : http://localhost/Site/account.php");
  }


}

}     

?>


<div class="container">
<h1> S'inscrire </h1>

<?php if (!empty($errors)) : ?>
  <div class = "alert alert-danger">
    <p> Vous n'avez pas rempli le formulaire correctement </p>

    <?php echo "Voici les erreurs "; foreach ($errors as $error) : ?>
      <ul>
        <li> <?= $error; ?> </li>
      </ul>

    <?php endforeach; ?>
    </div>
      <?php endif; ?>


  

<form action ="" method="POST">
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name ="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name ="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name = "confirmPassword" id="confirmPassword" placeholder="Password">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0"> Etes-vous un : </legend>
      <div class="col-sm-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name = "acheteur" id="acheteur" value="1" >
          <label class="form-check-label" for="homme">
          Acheteur           </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="vendeur" value="2">
          <label class="form-check-label" for="vendeur">  Vendeur </label>
        </div>
        <div class="form-check disabled">
          <label class="form-check-label" for="gridRadios3"> Disabled radio </label>
        </div>
      </div>
    </div>
  </fieldset>
  
  <div id ="form_acheteur">
   <div class="form-group row">
    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nom" placeholder="Nom">
    </div>
  </div>

  <div class="form-group row">
    <label for="Prenom" class="col-sm-2 col-form-label"> Prenom </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Prenom" placeholder="Prenom">
    </div>
  </div>
</div>

<div id ="form_vendeur">

  <div class="form-group row">
    <label for="Prenom" class="col-sm-2 col-form-label"> Pseudo </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Pseudo" placeholder="Pseudo">
    </div>
  </div>
</div>

<script type="text/javascript"> 



  $('#form_acheteur').hide();
  $('#form_vendeur').hide();

  $('#acheteur').click(function() {
    if ($('#acheteur').prop('checked')) 
    {
      $('#form_acheteur').show();
    }
    else
    {
      $('#form_acheteur').hide();

    }


  });
  $('#vendeur').click(function() {
    if ($('#vendeur').prop('checked')) 
    {
      $('#form_vendeur').show();
    }
    else
    {
      $('#form_vendeur').hide();

    }


  });

</script>








<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">S'inscrire</button>
  </div>
</div>
</form>
</div>


<?php require 'footerTest.php'?>



