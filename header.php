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
            <li class="nav-item <?php if(isset($login))echo "active" ?> px-lg-4">
              <a
                class="nav-link text-uppercase text-expanded"
                href="login.php" 
              >
                login</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>