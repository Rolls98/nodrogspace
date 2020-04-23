<?php 

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper mb-3" style="color: rgb(58, 56, 56);"
        >BIENVENUE SUR
      </span>
      <span class="site-heading-lower" style="font-weight: bold;"
        >No Drug's <span class="text-primary"> Space</span>
      </span>
    </h1>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item <?php if(isset($accueil))echo "active" ?> px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php"
                >Acceuil
              </a>
            </li>
            <li class="nav-item <?php if(isset($about))echo "active" ?> px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="about.php"
                >A propos de nous</a
              >
            </li>
            <li class="nav-item <?php if(isset($article))echo "active" ?> px-lg-4">
              <a
                class="nav-link text-uppercase text-expanded"
                href="article.php"
                >Article</a
              >
            </li>
            <li class="nav-item <?php if(isset($forum))echo "active" ?> px-lg-4">
              <a class="nav-link text-uppercase  text-expanded" href="forum.php"
                >Forum</a
              >
            </li>
            
            <?php 

              if(isset($_SESSION["connected"])){
                echo '<li class="nav-item px-lg-4">';
                      echo '<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">';
                      echo '<img src="img/users/'.$_SESSION["profile"].'" class="rounded-circle z-depth-0"
              alt="avatar image" width="30" height="30">';
                    echo '</a>';
                echo'<div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
          aria-labelledby="navbarDropdownMenuLink-55">';
          echo '<a class="dropdown-item" href="user/examples/index.php">Profile</a> ';
          
          echo '<a class="dropdown-item" href="deconnexion.php">Deconnection</a>';
          echo '</div>';
          echo '</li>';
          }else{
            $ms = isset($login)? "active":"";
            echo'<li class="nav-item '.$ms.' px-lg-4">';
              echo'<a
                class="nav-link text-uppercase text-expanded"
                href="login.php" 
              >
                login</a
              >
            </li>';
          }
            
            ?>
      </ul>
      </div>
    </nav>