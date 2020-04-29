
<?php 

  include("partials/session.php");
  include("../../db/db.php");

  $db = Database::connexion();
  $type_allows = [".png",".jpg",".jpeg",".gif"];

  $page = page($db);  


  if($_SERVER["REQUEST_METHOD"] === "POST"){
    $upload = true;
    $header1 = $_POST["header1"]?$_POST["header1"]:$page["header1"];
    $header2 = $_POST["header2"]?$_POST["header2"]:$page["header2"];
    $header3 = $_POST["header3"]?$_POST["header3"]:$page["header3"];

    $contenu3 = $_POST["contenu3"]?$_POST["contenu3"]:$page["contenu3"];

    $image3 = $_FILES["image3"]["name"]?$_FILES["image3"]["name"]:$page["image3"];
    $imageApro = $_FILES["imageApro"]["name"]?$_POST["imageApro"]:$page["imageApro"];

    $tmp3 = $_FILES["image3"]["tmp_name"]?$_FILES["image3"]["tmp_name"]:null;
    $aPro = $_FILES["imageApro"]["tmp_name"]?$_FILES["imageApro"]["tmp_name"]:null;

    $type3 = strrchr($image3,".");
    $tapro = strrchr($imageApro,".");

     if(in_array($type3,$type_allows) || in_array($tapro,$type_allows)){
         if($tmp3){
      if(move_uploaded_file($tmp3,"../../img/blog/".$image3)){
        
      }else{
        $error["image3"] = "not upload";
        $upload = false;
      }
    }

    if($aPro){
      if(move_uploaded_file($aPro,"../../img/blog/".$imageApro)){
        
      }else{
        $error["imageApro"] = "not upload";
        $upload = false;
      }
    }
  }else{
     if($tmp3 || $imageApro){
        $upload = false;
      if($tmp3){
        $error["image3"] = "type incorrect";
      }else if($aPro){
        $error["imageApro"] = "type incorrect";
      }
     }
      
  }

    $hApro = $_POST["hApro"]?$_POST["hApro"]:$page["hApro"];

    $ContenuApro = $_POST["ContenuApro"]?$_POST["ContenuApro"]:$page["ContenuApro"];

    if(updatePage($db,[$header1,$header2,$header3,$contenu3,$image3,$imageApro,$hApro,$ContenuApro])){
      $cool = "Modification effectuée avec succès";
      $page = page($db);
    }else{
      $cool = "Modification non effectuée";
    }

  }

  Database::deconnexion();

  

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
    <?php $typo =true; include("partials/wrapper.php") ?>
    <div class="main-panel">
     
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Textes et images</h4>
              <p class="card-category">Modifer les informations primaires</p>
            </div>
            <div class="card-body">
              <div id="typography">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-title">
                  <h2>Typographie</h2>
                </div>
                <div class="row">
                  <div class="tim-typo">
                    <h1>
                      <span class="tim-note">Header 1</span><?php echo $page["header1"];?></h1>
                      <input type="text" class="form-control" name="header1">
                  </div>
                  <div class="tim-typo">
                    <h2>
                      <span class="tim-note">Header 2</span> <?php echo $page["header2"];?></h2>
                      <input type="text" class="form-control" name="header2">
                  </div>
                  <div class="tim-typo">
                    <h3>
       
                      <span class="tim-note">Header 3</span><?php echo $page["header3"];?></h3>
                      
                      <input type="text" class="form-control" name="header3">
                  </div>
                  <div class="tim-typo">
                    <h4>
                      <span class="tim-note">Contenu Header 3 </span>
                      <?php echo $page["contenu3"];?></h4>
                      <input type="text" class="form-control" name="contenu3">
                  </div>
                  <div class="tim-typo">
                    <h5>
                      
                      <span class="tim-note">Image header 3</span><img src="../../img/blog/<?php echo $page["image3"] ?>" width="20%" height="20%"></h5>
                      <input type="file" class="form-control" name="image3"><br>
                      <?php echo isset($error["image3"])?$error["image3"]:""; ?>
                  </div>
                  <div class="tim-typo">
                    <h6>
                      <span class="tim-note">Image à propos</span><img src="../../img/blog/<?php echo $page["imageApro"] ?>" width="20%" height="20%"></h5></h6>
                      <input type="file" class="form-control" name="imageApro"><br>
                      <?php echo isset($error["imageApro"])?$error["imageApro"]:""; ?>
                    </div>
                  <div class="tim-typo">
                    <p>
                      <span class="tim-note">header à propos</span>
                      <?php echo $page["hApro"] ?></p>
                      <input type="text" class="form-control" name="hApro">
                  </div>
                  <div class="tim-typo">
                    <p>
                      <span class="tim-note">Contenu à propos</span>
                     <?php echo $page["ContenuApro"] ?>  
                    </p>
                      <text type="text" class="form-control" name="ContenuApro">
                  </div>
                  
                    <button  href="#"  class="nav-link active" >valider</button><br>
                    <?php echo isset($cool)?$cool:""; ?>
                
                </div>
              </form>
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