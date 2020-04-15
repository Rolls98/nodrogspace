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



    Database::deconnexion();
  
  
  
  
  ?>

  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex mr-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">La fois ou j'ai</span>
              <span class="section-heading-lower">failli y rester</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/products-02.jpg" alt="" />
        <div class="product-item-description d-flex ml-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
              similique quo omnis delectus sequi voluptate minima ullam,
              aspernatur aut! Ut libero similique inventore doloribus tenetur
              cum alias, corrupti facere autem. Lorem ipsum dolor sit amet
              consectetur adipisicing elit. Error nam, esse enim tempora
              ratione quo in vero corrupti nobis fugit voluptatum temporibus
              optio quidem? Illum distinctio consequuntur expedita repellat
              dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Incidunt distinctio inventore nostrum? Perspiciatis
              quisquam est magnam autem porro laborum, tempora, perferendis
              maiores distinctio totam eaque similique, amet omnis? Assumenda,
              saepe?.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
              <span class="section-heading-upper">Les risques d'overdeuses</span>
              <span class="section-heading-lower">le blackout</span>
            </h2>
          </div>
        </div>
        <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/products-03.jpg" alt="" />
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <p class="mb-0">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
              similique quo omnis delectus sequi voluptate minima ullam,
              aspernatur aut! Ut libero similique inventore doloribus tenetur
              cum alias, corrupti facere autem. Lorem ipsum dolor sit amet
              consectetur adipisicing elit. Error nam, esse enim tempora
              ratione quo in vero corrupti nobis fugit voluptatum temporibus
              optio quidem? Illum distinctio consequuntur expedita repellat
              dignissimos. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Incidunt distinctio inventore nostrum? Perspiciatis
              quisquam est magnam autem porro laborum, tempora, perferendis
              maiores distinctio totam eaque similique, amet omnis? Assumenda,
              saepe?.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">
        Copyright &copy; <a href="www.github.com/slyaniki">Aniki</a>
      </p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>