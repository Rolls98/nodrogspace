 <?php 
    
     if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION["a_connected"])){
      header("location:login.php");
    }
 
 ?>

 <?php

    include("../../../db/db.php");
    include("../../../functions.php");

    $db = Database::connexion();
    $id = isset($_GET["id"])?$_GET["id"]:"";
    $art = findArt($db,$id);
    $a_errors = array("titre"=>"","s_titre"=>"","description"=>"","image"=>"");
    $type_allows = [".png",".jpg",".jpeg",".gif"];
    $ok = "";
    $addArt = true;

   
    #initialisation
    $titre = $art["titre"];
    $s_titre = $art["s_titre"];
    $descr = $art["description"];
    $i_name = $art["image"];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $ar_ok = true;
        $titre =$_POST["titre"]?checkInput($_POST["titre"]):$art["titre"];
        $s_titre = $_POST["s_titre"]?checkInput($_POST["s_titre"]):$art["s_titre"];
        $desc = $_POST["description"]?checkInput($_POST["description"]):$art["description"];
        $tmp = $_FILES["fichier"]["tmp_name"]?$_FILES["fichier"]["tmp_name"]:"";
        $i_name = $_FILES["fichier"]["name"]?$_FILES["fichier"]["name"]:$art["image"];
        $type = strrchr($i_name,".");

        if(empty($titre)){
            $ar_ok = false;
            $a_errors["titre"] = "Ce champ ne doit pas etre vide";
        }

        if(empty($s_titre)){
            $ar_ok = false;
            $a_errors["s_titre"] = "Ce champ ne doit pas etre vide";
        }

        if(empty($desc)){
            $ar_ok = false;
            $a_errors["description"] = "Ce champ ne doit pas etre vide";
        }

        if(!empty($tmp)){
            if(in_array($type,$type_allows)){
                if(file_exists("../../../img/articles/".$i_name)){
                    $ar_ok = false;
                    $a_errors["image"] = "le fichier existe déja, veuillez renommé ou changer d'image";
                }else{
                    if(move_uploaded_file($tmp,"../../../img/articles/".$i_name)){
                        $a_errors["image"] = "";
                    }else{
                        $ar_ok = false;
                        $a_errors["image"] = "image no upload, probleme lors du chargement";
                    }
                }
            }else{
                $ar_ok = false;
                $a_errors["image"] = "le type n'est pas autorisé, veuillez des images de types <<png,jpeg,jpg,gif>>";
            }
        }


        if($ar_ok){
            $article = [$titre,$s_titre,$desc,$i_name,$id];
            if(updateArt($db,$article)){
                header("location:../articles.php");
            }else{
                echo "l'article n'a pas été ajouté";
            }
        }
    }

    Database::deconnexion()
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    no drug's space
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

  <link href="../../assets/demo/demo.css" rel="stylesheet" />

  <style>
    span{
      color:red;
    }
  </style>
</head>

<body class="dark-edition">

    <?php include("../partials/wrapper.php"); ?>
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
                  <h4 class="card-title">Creer un article</h4>
                  
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                     
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Titre</label>
                          <input type="text" class="form-control" name="titre" value="<?php echo $titre ?>">
                        </div>
                        <span><?php echo $a_errors["titre"] ?></span>
                      </div>
                     
                    </div>
                   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Second Titre</label>
                          <input type="text" class="form-control" name="s_titre" value="<?php echo $s_titre ?>">
                        </div>
                        <span><?php echo $a_errors["s_titre"] ?></span>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="image">Image</label>
                          <input type="file" class="form-control" name="fichier" id="image">
                        </div>
                        <span><?php echo $a_errors["image"] ?></span>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Ajouter le contenu de votre article</label>
                            <textarea class="form-control" rows="5" name="description"><?php echo $descr ?></textarea>
                          </div>
                          <span><?php echo $a_errors["description"] ?></span>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">valider</button>
                    <div class="clearfix"></div>
                    <span style="color:green"><?php echo isset($ok)?$ok:"" ;?></span>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <?php include("../partials/card.php"); ?>
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