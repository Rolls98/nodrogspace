<?php 
  include("functions.php");
  include("db/db.php");

  session_start();

  $db = Database::connexion();
  $errors = ["email"=>"","password"=>""];
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"]?$_POST["email"]:"";
    $psd = $_POST["password"]?hash("sha256",$_POST["password"]):"";
    
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      $client = findClient($db,$email);
      if($client){
        if(hash_equals($client["u_password"],$psd)){
          $_SESSION["connected"] = true;
          $_SESSION["nom"] = $client["nom"];
          $_SESSION["profile"] = $client["image"];
          header("location: index.php");
        }else{
          $errors["password"] = "Mot de passe Incorrect";
        }
      }else{
        $errors["email"] = "Email non identifé";
      }
  
    }else{
      $errors["email"] = "Veuillez saisir un mail correct";
    }
    }
    
    

  Database::deconnexion();


?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NodDrugSpace</title>

 
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

 
  <link href="css/style.css" rel="stylesheet">

</head>

<body>

  <?php $login = true ?>
  <?php include("header.php") ?>
  <section class="page-section clearfix">
    <div class="container">
   
<form class="text-center border border-light p-6" action="" method="post">

  <p class="h4 mb-4">Login</p>
  <p><a href="register.php" style="text-decoration: none;"> vous n'avez pas de compte? </a></p>
 


 
  

 
  <input type="email" id="defaultSubscriptionFormEmail" name="email" class="form-control mb-4" placeholder="Email">
  <span><?php echo $errors["email"]; ?></span><br><br>

  <input type="password" id="defaultSubscriptionFormPassword" name="password" class="form-control mb-4" placeholder="Password">
  <span><?php echo $errors["password"]; ?></span><br><br>

  <button class="btn btn-info btn-block" type="submit">Login</button>  


</form>

    </div>
    
  </section>


  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; <a href="www.github.com/slyaniki">Aniki</a></p>
    </div>
  </footer>

 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
