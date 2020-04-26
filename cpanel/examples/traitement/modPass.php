<?php

    include("../partials/session.php");
    include("../../../db/db.php");

    $db = Database::connexion();
    $pass_actu = $_POST["actu"]?$_POST["actu"]:"";
    $pass_nv = $_POST["nv"]?$_POST["nv"]:"";
    $pass_cnv = $_POST["cnv"]?$_POST["cnv"]:"";
    $admin = findAdmin($db,$_SESSION["a_email"]);
    if(hash("sha256",$pass_actu) === $admin["a_password"]){
        if(!empty($pass_nv) && !empty($pass_cnv)){
        
            if($pass_nv === $pass_cnv){
                $hs_ps = hash("sha256",$pass_nv);
                $req = $db->prepare("UPDATE admins SET a_password=? WHERE email=?");
                
               
                if($req->execute([$hs_ps,$_SESSION["a_email"]])){
                    echo "Mot de passe Modifié";
                }else{
                    echo "Mot de passse non modifié, une erreur depuis la bd";
                }
            }else{
                echo "les deux mots de passe ne corresponds pas";
            }
        }else{
            echo "le nouveau mot de passe ne peut pas etre vide";
        }
    }else{
        echo "le mot de passe actuel n'est pas correct";
    }
    Database::deconnexion();




?>