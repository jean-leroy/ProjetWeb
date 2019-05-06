<?php require 'header.php'; ?>
<?php require_once 'db.php'; ?>

<?php
session_start();


 $sql1 ="SELECT email FROM users WHERE email = '".$_POST['email']."'";
  $result = $conn->query($sql1);

  if($row = $result->fetch_assoc()) {
    $errors['email'] = "Un compte avec cet email existe déjà";
  }



if (!empty($_POST)){

  $errors = array();
  }
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



 


//Si acheteur, erreur pour l'adresse et paiement


//Si vendeur, erreur pour le pseudo


// Si le tableau est vide on procède à l'inscription 


  if (empty($errors))
  {
    // On rentre l'adresse dans la base de données et si pas de data rentrée on initialise à null





   /*$sql = "INSERT INSERT INTO `adresses` (`idAdresse`, `line1`, `line2`, `numero`, `zip`, `town`, `country`) VALUES (NULL, 'rue du général Colonieu', '', '24', '92500', 'Rueil Malmaison', 'France');";
*/
   $nom = "";
   if (isset($_POST['nom']))
   {
    $nom = $_POST['nom'];
  }
  $prenom = "";
  if (isset($_POST['password']))
  {
    $prenom = $_POST['prenom'];
  }
  $adress1 = "";
  if (isset($_POST['adress1']))
  {
    $adress2 = $_POST['adress1'];
  }
  $add_num = 0;
  if (isset($_POST['add_num']))
  {
    $add_num = $_POST['add_num'];
  }
  $zip = 0;
  if (isset($_POST['zip']))
  {
    $zip = $_POST['zip'];
  }
  $town = "";
  if (isset($_POST['town']))
  {
    $town = $_POST['town'];
  }
  $country = "";
  if (isset($_POST['country']))
  {
    $country = $_POST['country'];
  }

  /*     $sql = conn->prepare("INSERT INSERT INTO `adresses` (`idAdresse`, `line1`, `line2`, `numero`, `zip`, `town`, `country`) VALUES (NULL, 'rue du général Colonieu', '', '24', '92500', 'Rueil Malmaison', 'France');");
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
   }


   if (!$sql->bind_param("sss", $email, $pseudo, $password)) {
   }

   if (!$sql->execute()) {
    echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
  }*/







    // On rentre l'utilisateur avec un idAdresse correspondant 

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

  if (!($sql = $conn->prepare("INSERT INTO `users` (`idUser`, `email`, `pseudo`, `password`,`idAdresse` ) VALUES (NULL, ?, ?, ?,0); " )))
  {
   echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
 }


 if (!$sql->bind_param("sss", $email, $pseudo, $password)) {
 }

 if (!$sql->execute()) {
  echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
}


echo '<script type="text/javascript">
alert("votre compte a été validé");
 location.replace("http://localhost/Site/account.php")</script>';




} 

$conn = mysql_connect("localhost", "root", "");
if (!$conn) { echo "error".mysql_error();
 
}
if(!mysql_select_db("sql1"))
{
  echo"error de db".mysql_error();
}
$sql = "SELECT password FROM users WHERE 'email' LIKE ".$_GET['mail'];
$pass = "";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $pass = $row['password'];

  if ($mail==$sql['email']&&$pass==$sql['password']) {
   setcookie('email',$sql['email'],time()+3600);
  }
  }




if ($pass != $_GET['mdp'])
{
  echo 'failed conn';
}
else 
{echo 'connected';}






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
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name = "role[]" id="acheteur" value="1" >
          <label class="form-check-label" for="homme">
          Acheteur           </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name = role[] id="vendeur" value="2">
          <label class="form-check-label" for="vendeur">  Vendeur </label>
        </div>
        
      </div>
    </fieldset>

    <div id ="form_acheteur">

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-12 pt-0">  Renseignez vos coordonées <br><br> </legend>
        </div>
        <div class="form-group row">
          <label for="nom" class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
          </div>
        </div>

        <div class="form-group row">
          <label for="Prenom" class="col-sm-2 col-form-label"> Prenom </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="Prenom" placeholder="Prenom" name="prenom">
          </div>
        </div>   <div class="form-group row">
          <label for="adress1" class="col-sm-2 col-form-label"> Adresse </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="adress1" name ="adress1">
          </div>
        </div>

        <div class="form-group row">
          <label for="adress2" class="col-sm-2 col-form-label"> Adresse </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="adress2" name = "adress2">
          </div>
        </div>   <div class="form-group row">
          <label for="add_num" class="col-sm-2 col-form-label">n°</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="add_num" name = "add_num">
          </div>
        </div>

        <div class="form-group row">
          <label for="town" class="col-sm-2 col-form-label"> Ville </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="town" name="town">
          </div>
        </div>

        <div class="form-group row">
          <label for="zip" class="col-sm-2 col-form-label">ZIP Code</label>
          <div class="col-sm-10">
            <input type="number" name="zip" class="form-control" id="zip">
          </div>
        </div>

        <div class="form-group row">
          <label for="country" class="col-sm-2 col-form-label"> Pays </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="country" name="country">
          </div>
        </div>
      </fieldset>
    </div>


    <div id ="form_vendeur">

      <div class="form-group row">
        <label for="Prenom" class="col-sm-2 col-form-label"> Pseudo </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="Pseudo" placeholder="Pseudo">
        </div>
      </div>
    </div>




    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </div>
    </div>
  </form>
</div>


<?php require 'footerTest.php'?>

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
