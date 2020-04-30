<?php
  session_start();
  include("db/db.php");
  include("functions.php");
  $db = Database::connexion();
  $id = $_GET["id"]?intval($_GET["id"]):null;
  $cat_id = $_GET["cat"]?intval($_GET["cat"]):null;

  if(is_numeric($id) && is_numeric($cat_id)){
    $sujet = findSuj($db,$id);
    $sujet["user"] = findClientwithId($db,$sujet["user_id"]);
    $cat = findCat($db,$cat_id);
    if($sujet != false && $cat != false && intval($sujet["cat"]) === $cat_id){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
          if($_SESSION["connected"]){
            if($_POST["comment"]){
              $datas = [intval($_SESSION["id"]),$id,checkInput($_POST["comment"])];
              if(!addComment($db,$datas)){
                $erreur = "Si vous voyez l'erreur, veuillez contactez l'admin sur admin@leboss.com";
              }
            }
          }else{
            header("location:login.php");
          }
        }
    }else{
      header("location:forum.php");
    }
  }else{
    header("location:forum.php");
  }

  

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NodDrugSpace</title>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">


  <link href="css/style.css" rel="stylesheet">
  

</head>

<body>
<script>
    function myFunction() {
      // Declaration  des variables
      let input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');
    
      // trie alphabetique
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
    </script>

  <?php $forum = true ?>
  <?php include("header.php");$page = page($db); ?>
  <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="barderecherche">
           
         
          <div class="col-xl-9 mx-auto">
          
            <div class="cta-inner sujet  rounded">
                <div class="container">
                <div class="">
                      <img alt="profile user" class="" src="img/users/<?php echo $sujet["user"]["image"] ?>" width="35" height="35"> 
                </div>
                <div class="">
                 <strong><?php echo $sujet["user"]["nom"] ?></strong><br>
                 <strong><?php echo $sujet["sujet"] ?></strong><br>
                <strong class="categorie" id="categorie" ><span class="auteur">Catégorie: <?php echo $cat["name"] ?></span></strong>
                                   <br>
                <span class="date"><?php echo $sujet["date_create"] ?></span><br><br>
                <section class="masquer">
                    <p>
                        <?php echo $sujet["description"] ?>
                    </p>
                

           
  </section>
      
              </div>
                      </div> 
                    </div><br>
                    <form method="post">
                      <div class="form-group purple-border">
                          <textarea class="form-control" id="exampleFormControlTextarea3" rows="2" name="comment">Commentaire...</textarea>
                      </div>    
                      <button class="repondre" onclick="voirArticle()">Repondre</button>     
                      <?php echo isset($error)?$error:""; ?>   
                      </form>
                      <?php 
                          $comments = findComment($db,$sujet["id"]);

                          foreach($comments as $key=>$comment){
                            $user = findClientwithId($db,$comment["user_id"]);
                          echo '
                          <div class="cta-inner1  rounded">
                        
                                <div >
                          
                                  <h6 class="nomuser1">'.$user["nom"].'</h6>
                                  <div class="">'.$comment["comment"]."
                                </div>
                          </div>
                          </div>"; 
                          }
                        ?>
                   

                  </div>
                  
                </div>
    </section>

    <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/blog/<?php echo $page["imageApro"]?>" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-upper"><?php echo $page["header2"] ?></span>
                  <span class="section-heading-lower"><?php echo $page["hApro"] ?></span>
                </h2>
                    <?php echo $page["ContenuApro"] ?>
                 </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  


  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; <a href="www.github.com/slyaniki">Aniki</a></p>
    </div>
  </footer>

  <script src="script/app.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $('.list-hours li').eq(new Date().getDay()).addClass('today');
  </script>

</body>

</html>