<?php 
  
  include("functions.php");
  include("db/db.php");
  
  $db = Database::connexion();
  $ok = "";
  $nom=$email = "";
  if(isset($_SESSION["connected"])){
    header("location:index.php");
  }else{
    $errors = ["nom"=>"","email"=>"","age"=>"","password"=>"","cfpassword"=>""];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $valide = true;
      $nom = $_POST["nom"]?checkInput($_POST["nom"]):"";
      $email = $_POST["email"]?$_POST["email"]:"";
      $age = $_POST["age"]?$_POST["age"]:"";
      $psd = $_POST["password"]?$_POST["password"]:"";
      $cpsd = $_POST["cfpassword"]?$_POST["cfpassword"]:"";

      if(empty($nom)){
        $valide = false;
        $errors["nom"] = "Ce champ est obligatoire";
      }else if(strlen($nom) < 4){
        $valide = false;
        $errors["nom"] = "le nom n'est pas inférieur à 4 caractères";
      }

      if(empty($email)){
        $valide = false;
        $errors["email"] = "Veuillez entrer votre mail";
      }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $valide = false;
        $errors["email"] = "Veuillez saisir un mail correct svp !";
      }else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $req = $db->prepare("SELECT * FROM clients WHERE email=?");
        $req->execute([$email]);
        $user = $req->fetch();
        if($user){
          $valide = false;
          $errors["email"] = "le mail existe deja !";
          $user = null;
        }
        
      } 

      if(!is_numeric($age)){
        $valide = false;
        $errors["age"] = "Veuillez choisir votre age";
      }else if($age<16){
        $valide = false;
        $errors["age"] = "Age non autorisé";
      }

      if(empty($psd)){
        $valide = false;
        $errors["password"] = "Veuillez entrer un mot de passe";
      }else if(strlen($psd) < 8){
        $valide = false;
        $errors["password"] = "Le mot de passe est faible, il doit etre au moins 8 caractères";
      }

      if(!empty($cpsd)){
        if($cpsd !== $psd){
          $valide  = false;
          $errors["password"] = "les deux mot de passe ne correspond pas";
        }
      }else{
        $valide  = false;
        $errors["password"] = "les deux mot de passe ne correspond pas";
      }


      if($valide){
        $coords = [$nom,$email,intval($age),hash("sha256",$psd),"default_icon.jpg"];
       # var_dump($coords);
        if(addClient($db,$coords)){
          $ok = "Inscription effectué avec succèss";
          sleep(5);
          header("location:login.php");
        }else{
          $ok = "Erreur lors de l'inscription";
        }
      }

      
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

  
  <?php include("header.php") ?>
  <section class="page-section clearfix">
    <div class="container">
   
<form class="text-center border border-light p-6" action="" method="post">

  <p class="h4 mb-4">Register</p> 

  <input type="text" name="nom" value="<?php echo ($nom)?$nom:"" ?>" class="form-control mb-4" placeholder="Nom">
  <span><?php echo $errors["nom"] ?></span>
  <input type="email" name="email" value="<?php echo ($email)?$email:"" ?>" class="form-control mb-4" placeholder="Email">
  <span><?php echo $errors["email"] ?></span>
  <select name="age" class="form-control mb-4">
      <option value="16" selected>16</option>
      <option value="17" >17</option>
      <option value="18" >19</option>
      <option value="20" >20</option>
      <option value="21" >21</option>
      <option value="22" >22</option>
      <option value="23" >23</option>
      <option value="24" >24</option>
      <option value="25" >25</option>
      <option value="26" >26</option>
      <option value="27" >27</option>
      <option value="28" >28</option>
      <option value="29" >29</option>
      <option value="30" >30</option>
      <option value="31" >31</option>
      <option value="32" >32</option>
      <option value="33" >33</option>
      <option value="34" >34</option>
      <option value="35" >35</option>
      <option value="36" >36</option>
      <option value="37" >37</option>
      <option value="38" >38</option>
      <option value="39" >39</option>
      <option value="40" >40</option>
      <option value="41" >41</option>
      <option value="42" >42</option>
      <option value="43" >43</option>
      <option value="44" >44</option>
      <option value="45" >45</option>
      <option value="46" >46</option>
      <option value="47" >47</option>
      <option value="48" >48</option>
      <option value="49" >49</option>
      <option value="50" >50</option>
      <option value="51" >51</option>
      <option value="52" >52</option>
      <option value="53" >53</option>
      <option value="54" >54</option>
      <option value="55" >55</option>
      <option value="56" >56</option>
  </select>
  <span><?php echo $errors["age"] ?></span>

  <input type="password"  name="password" class="form-control mb-4" placeholder="Password">
  
  <input type="password" name="cfpassword"  class="form-control mb-4" placeholder=" Confirm Password">
  <span><?php echo $errors["password"] ?></span>

  <button class="btn btn-info btn-block" type="submit">sign up</button>  
  <span><?php echo $ok ?></span>

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
