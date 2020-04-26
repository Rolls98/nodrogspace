
<?php 

  include("../../db/db.php");
  include("../../functions.php");
  session_start();
  if(!isset($_SESSION["a_connected"])){
    header("location:login.php");
  }else{
    $db = Database::connexion();
    $ok = "";
    $index = true;
    $type_allows = [".png",".jpg",".jpeg",".gif"];
    $error = [
      "nom"=>"",
      "prenom"=>"",
      "username"=>"",
      "email"=>"",
      "ville"=>"",
      "pays"=>"",
      "description"=>"",
      "addresse"=>"",
      "image"=>""
    ];
    $id = $_SESSION["a_id"];
    $admin = findAdmin($db,$_SESSION["a_email"]);
    $nom = $admin["nom"];
    $prenom = $admin["prenom"];
    $email = $admin["email"];
    $username = $admin["username"];
    $addresse = $admin["addresse"];
    $ville = $admin["ville"];
    $pays = $admin["pays"];
    $description = $admin["description"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
        $cool = true;
        $nom = $_POST["nom"]?checkInput($_POST["nom"]):"";
        $username = $_POST["username"]?checkInput($_POST["username"]):"";
        $prenom = $_POST["prenom"]?checkInput($_POST["prenom"]):"";
        $email = $_POST["email"]?checkInput($_POST["email"]):"";
        $addresse = $_POST["addresse"]?checkInput($_POST["addresse"]):"";
        $ville = $_POST["ville"]?checkInput($_POST["ville"]):"";
        $pays = $_POST["pays"]?$_POST["pays"]:"";
        $description = $_POST["description"]?checkInput($_POST["description"]):"";
        $name_image = $_FILES["image"]["name"]?$_FILES["image"]["name"]:$admin["image"];
        $tmpPath = $_FILES["image"]["tmp_name"]?$_FILES["image"]["tmp_name"]:"";
        $elements = ["nom"=>$nom,"username"=>$username,"prenom"=>$prenom,"email"=>$email,"addresse"=>$addresse,"ville"=>$ville,"pays"=>$pays,"description"=>$description];
        $type = strrchr($name_image,".");
        $nameWhitoutExt = substr($name_image,0,strpos($name_image,$type));
       

        if($name_image != $admin["image"]){
          if(file_exists("../../img/users/".$name_image)){
          
            $name_image = $nameWhitoutExt." ".date("d-m-Y H-i-s").$type;  
          }
        }

        if(!empty($tmpPath)){
          if(in_array($type,$type_allows)){
       
                  if(move_uploaded_file($tmpPath,"../../img/users/".$name_image)){
                      $error["image"] = "image upload";
                  }else{
                      $cool = false;
                      $error["image"] = "image no upload, probleme lors du chargement";
                  }
              
          }else{
              $cool = false;
              $error["image"] = "le type n'est pas autorisé, veuillez des images de types <<png,jpeg,jpg,gif>>";
          }
      }

        foreach($elements as $key => $value){
          verifyEmpty($value,$key);
        }        

        if($cool){
          $infos = [$username,$nom,$prenom,$email,$addresse,$ville,$pays,$description,$name_image,$id];
          if(updateadmin($db,$infos)){
            $_SESSION["a_profile"] = $name_image;
            $_SESSION["a_nom"] = $nom;
            $_SESSION["a_prenom"] = $prenom;
            $_SESSION["a_description"] = $description;
            $ok = "Mise a jour effectué avec succès";
          }else{
            $ok = "Erreur survenue lors de la mise a jour de votre profile, veuillez contacter l'admin";
          }
        }
      
    }
    Database::deconnexion();
  }

  function verifyEmpty($el,$k){
    if(empty($el)){
      $GLOBALS["cool"] = false;
      $GLOBALS["error"][$k]="Ce champ est obligatoire";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    no drug's space
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
    <?php include("partials/wrapper.php") ?>
    <div class="main-panel">
     
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editer mon Profil</h4>
                  <p class="card-category">Ajouter des informations</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                     
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nom d'utilisateur</label>
                          <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                          <span style="color:red"><?php echo $error["username"] ?></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adresse email</label>
                          <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                        <span style="color:red"><?php echo $error["email"] ?></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Prenom</label>
                          <input type="text" class="form-control"  name="prenom" value="<?php echo $prenom; ?>">
                          
                        </div>
                        <span style="color:red"><?php echo $error["prenom"] ?></span>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nom</label>
                          <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">
                        </div>
                        <span style="color:red"><?php echo $error["nom"] ?></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adresse</label>
                          <input type="text" class="form-control" name="addresse" value="<?php echo $addresse; ?>">
                        </div>
                        <span style="color:red"><?php echo $error["addresse"] ?></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ville</label>
                          <input type="text" class="form-control" name="ville" value="<?php echo $ville; ?>">
                        </div>
                        <span style="color:red"><?php echo $error["ville"] ?></span>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">pays</label>
                          <input type="text" class="form-control" name="pays" value="<?php echo $pays; ?>">
                        </div>
                        <span style="color:red"><?php echo $error["pays"] ?></span>
                      </div>

                      <div class="col-md-4">
                        <div class="custom-file">
                          <label class="custom-file-label" for="image">Choisir une image</label>
                          <input type="file" id="image" class="custom-file-input" name="image">
                        </div>
                        <span style="color:red"><?php echo $error["image"] ?></span>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus unde quos velit optio eius rerum quia perspiciatis et voluptatum, voluptates quod impedit neque quisquam delectus similique repellat in blanditiis officia!.</label>
                            <textarea class="form-control" rows="5" name="description"><?php echo $description; ?></textarea>
                          </div>
                          <span style="color:red"><?php echo $error["description"] ?></span>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">valider</button>
                    <div class="clearfix"></div>
                    <span style="color:<?php echo strchr($ok,"avec")?"green":"red"; ?>"><?php echo $ok;?></span>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                
               <?php include("partials/card.php") ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Mot de pass</h4>
                  <p class="card-category">Récuperer password admin</p>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                     
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <br><hr>
                     
                    <button type="submit" class="btn btn-primary pull-right">valider</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>


      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Mot de pass</h4>
                  <p class="card-category">Changer password admin</p>
                </div>
                <div class="card-body">
                  <form class="changePsd" method="POST">
                    <div class="row">
                     
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">password actuel</label>
                          <input type="password" class="form-control" name="actu" id="actu">
                        </div>
                      </div> <br>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nouveau</label>
                          <input type="password" class="form-control" name="nv" id="nv">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirmer password</label>
                          <input type="password" class="form-control" name="cnv" id="cnv">
                        </div>
                      </div>
                      <br><hr>
                      <span style="color:white" class="psdChange"></span>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" id="changePsd">valider</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
 

  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 
  <script src="../assets/js/plugins/chartist.min.js"></script>

  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <script src="script/app.js"></script>
 
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
         
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

   
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>