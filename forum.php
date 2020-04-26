<?php 

  include("db/db.php");

  $db = Database::connexion();

  $sujets = findAllSuj($db);

  $cats = findAllCat($db);

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
  <?php include("header.php") ?>
        <nav class="categorie">
                <?php  

                  for($i = 0;$i<count($cats);$i++){
                    echo '<button onclick="showContents('.$i.')" class="btn btn'.$cats[$i]["id"].'">'.$cats[$i]["name"].'</button>';
                  }

                ?>
                
        </nav>
    <section class="page-section cta">
            <div class="col-xl-9 mx-auto">
            <?php 
            foreach($sujets as $key => $sujet){
              foreach($cats as $key => $cat){
                if($cat["id"] == $sujet["cat"]){
                  $cat_name = $cat["name"];
                  $cat_id = $cat["id"];
                break;
                }
              }
              echo '<article class="box art art'.$cat_id.'">
            <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>'.$sujet["sujet"].'</h1>
                    <span class="auteur">Catégorie:'.$cat_name.'</span><br>
                    <span class="date">'. $sujet["date_create"].'</span><br>
                   
                </div>
             </div>
             <a href="./afficherarticle.php?id='.$sujet["id"].'&cat='.$cat_id.'" target="_blank">Savoir plus...</a>
             <br>
            </article>';
            }
            

            ?>

            <!--<article class="box">
                <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>Savoir bien méditer !</h1>
                    <span class="auteur">Catégorie: Heroine</span><br>
                    <span class="date">/ Jan 24 - 1min</span><br>
                </div>
                </div>
                <a href="./afficherarticle.php" target="_blank">Savoir plus...</a>
                <br>
                <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>Avoir la foi en Dieu !</h1>
                    <span class="auteur">Catégorie: Heroine</span><br>
                    <span class="date">/ Jan 24 - 1min</span><br>
                    
                </div>
                </div>
                <a href="./afficherarticle.php" target="_blank">Savoir plus...</a>
            </article>

            <article class="box">
                <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>Les écoles sont fermée</h1>
                    <span class="auteur">Catégorie: Overdose</span><br>
                    <span class="date">/ Jan 24 - 1min</span><br>
                    
                </div>
                </div>
                <a href="./afficherarticle.php" target="_blank">Savoir plus...</a>
                <br>
                <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>Les cahiers restent ouvert !</h1>
                    <span class="auteur">Catégorie: Overdose</span><br>
                    <span class="date">/ Jan 24 - 1min</span><br>
                    
                </div>
                </div>
                <a href="./afficherarticle.php" target="_blank">Savoir plus...</a>
            </article>
            
            <article class="box">
                <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>Corona, c'est pas la peine !</h1>
                    <span class="auteur">Catégorie: Canabis</span><br>
                    <span class="date">/ Jan 24 - 1min</span><br>
                   
                </div>
                </div>
                <a href="./afficherarticle.php" target="_blank">Savoir plus...</a>
                <br>
                <div class="cta-inner  rounded">
                <div class="art1">
                    <h1>OMS: Covid-19 fuck !</h1>
                    <span class="auteur">Catégorie: Canabis</span><br>
                    <span class="date">/ Jan 24 - 1min</span><br>
                    
                </div>
                </div>
                <a href="./afficherarticle.php" target="_blank">Savoir plus...</a>
            </article>-->
            
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