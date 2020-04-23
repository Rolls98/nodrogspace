<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>NodDrugSpace</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <link
    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />

  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <?php $article = true ?>
  <?php include("header.php") ?>
  
  <?php 

    include("db/db.php");

    $db = Database::connexion();
    
    $articles = rcpArticles($db);

    foreach($articles as $key=>$value){
      echo '<section class="page-section">
              <div class="container">
              <div class="product-item">
                <div class="product-item-title d-flex">
                  <div class="bg-faded p-5 d-flex article  rounded">
                    <h2 class="section-heading mb-0">'.'
                    <span class="section-heading-upper">'.$value["titre"].'</span>
                    <span class="section-heading-lower">'.$value["s_titre"].'</span>
                    </h2>
                    </div>
                  </div>
                  <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/articles/'.$value["image"].'" alt="" />
                  <div class="product-item-description d-flex descr">
                    <div class="bg-faded p-5 rounded">
                      <p class="mb-0">'.$value["description"].'
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </section>';
    }


    Database::deconnexion();
  
  
  
  
  ?>


  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">
        Copyright &copy; <a href="www.github.com/slyaniki">Aniki</a>
      </p>
    </div>
  </footer>

  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    let art = $(".article");
    let descr = $(".descr");
    for(let i =0;i<art.length;i++){
      if(i%2!=1){
        art[i].classList.add("ml-auto");
        descr[i].classList.add("mr-auto");
      }else{
        art[i].classList.add("mr-auto");
        descr[i].classList.add("ml-auto");
      }
    }
  </script>
</body>

</html>