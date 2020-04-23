<div class="card-avatar">
    <a href="#pablo">
        <img class="img" src="../../img/users/<?php echo $_SESSION["a_profile"] ?>" />
    </a>
</div>
 
 <div class="card-body">
    <h6 class="card-category"><?php echo $_SESSION["a_nom"]." ".$_SESSION["a_prenom"]; ?></h6>             
    <p class="card-description">
        <?php echo $_SESSION["a_description"]; ?>
    </p>
    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
</div>