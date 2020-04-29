<?php 

  $active = "active";

?>

<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
     
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
          <li class="nav-item <?php echo isset($index)?$active:"" ?> ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">person</i>
              <p>Mon Profile</p>
            </a>
          </li>
          <li class="nav-item  <?php echo isset($addArt)?$active:"" ?> ">
            <a class="nav-link" href="addartcile.php">
              <i class="material-icons">plus</i>
              <p>Ajouter un article</p>
            </a>
          </li>
          <li class="nav-item  <?php echo isset($tables)?$active:"" ?>">
            <a class="nav-link" href="tables.php">
              <i class="material-icons">plus</i>
              <p>Liste des utilisateurs </p>
            </a>
          </li>
          <li class="nav-item  <?php echo isset($lsArt)?$active:"" ?>">
            <a class="nav-link" href="articles.php">
              <i class="material-icons">plus</i>
              <p>Liste des articles </p>
            </a>
          </li>
          <li class="nav-item  <?php echo isset($typo)?$active:"" ?>">
            <a class="nav-link" href="typography.php">
              <i class="material-icons">plus</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="deconnexion.php">
             
              <p>Deconnection</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>