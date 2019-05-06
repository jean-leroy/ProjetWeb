<?php require 'header.php';?>
<?php require 'db.php';?>


<?php 



	{
		$sql = "SELECT * FROM users where email LIKE '1mariearossi@gmail.com'"; // Get Current user session instead
		$result = $conn->query($sql);

		if ($result->num_rows != 0) {

		 $id;
			 $pseudo;
			 $email;

    while($row = $result->fetch_assoc()) {
    	debug($row);

    	$nom = $row["idUser"];
    	$pseudo = $row["pseudo"];
    	$email = $row["email"];
    }
} else {
    echo "0 results";
}
$conn->close();
	}
?>
<h1> Votre compte </h1>


<div class="container">
	Voici informations : 








<form action ="" method="POST">
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name ="email" placeholder='<?php echo $email?>'' Disabled>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label"> Pseudo </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name ="password" placeholder="<?php echo $pseudo?>" Disabled>
    </div>
  </div>


      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-12 pt-0">  Voici votre adresse : <br><br> </legend>
        </div>
        <div class="form-group row">
          <label for="nom" class="col-sm-2 col-form-label">Nom</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nom" placeholder="Nom" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="Prenom" class="col-sm-2 col-form-label"> Prenom </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="Prenom" placeholder="Prenom"disabled>
          </div>
        </div>   <div class="form-group row">
          <label for="adress1" class="col-sm-2 col-form-label"> Adresse </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="adress1" name ="adress1" Disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="adress2" class="col-sm-2 col-form-label"> Adresse </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="adress2" name = "adress2" Disabled>
          </div>
        </div>   <div class="form-group row">
          <label for="add_num" class="col-sm-2 col-form-label">n°</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="add_num" name = "add_num" Disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="town" class="col-sm-2 col-form-label"> Ville </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="town" name="town" disabled >
          </div>
        </div>

        <div class="form-group row">
          <label for="zip" class="col-sm-2 col-form-label">ZIP Code</label>
          <div class="col-sm-10">
            <input type="number" name="zip" class="form-control" id="zip" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="country" class="col-sm-2 col-form-label"> Pays </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="country" name="country" disabled>
          </div>
        </div>
    </div>



    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Modifier</button>
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


