<?php

    include("../db/db.php");
    include("../functions.php");

    $db = Database::connexion();

    $a_errors = array("titre"=>"","s_titre"=>"","description"=>"","image"=>"");
    $type_allows = [".png",".jpg",".jpeg",".gif"];
    $ok = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $ar_ok = true;
        $titre = isset($_POST["titre"])?checkInput($_POST["titre"]):"";
        $s_titre = isset($_POST["s_titre"])?checkInput($_POST["s_titre"]):"";
        $desc = isset($_POST["description"])?checkInput($_POST["description"]):"";
        $tmp = isset($_FILES["fichier"])?$_FILES["fichier"]["tmp_name"]:"";
        $i_name = isset($_FILES["fichier"])?$_FILES["fichier"]["name"]:"";
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
                if(file_exists("../img/".$i_name)){
                    $ar_ok = false;
                    $a_errors["image"] = "le fichier existe déja, veuillez renommé ou changer d'image";
                }else{
                    if(move_uploaded_file($tmp,"../img/".$i_name)){
                        $a_errors["image"] = "image upload";
                    }else{
                        $ar_ok = false;
                        $a_errors["image"] = "image no upload, probleme lors du chargement";
                    }
                }
            }else{
                $ar_ok = false;
                $a_errors["image"] = "le type n'est pas autorisé, veuillez des images de types <<png,jpeg,jpg,gif>>";
            }
        }else{
            $ar_ok = false;
            $a_errors["image"] = "Veuillez choisir une image svp";
        }


        if($ar_ok){
            $article = [$titre,$s_titre,$desc,$i_name];
            if(addArt($db,$article)){
                $ok = "l'article a été ajouté";
                $titre = "";
                $s_titre = "";
                $desc = "";
            }else{
                $ok = "l'article n'a pas été ajouté";
            }
        }
    }

    Database::deconnexion()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Nouveau Article</h1>
            <label for="titre">Titre</label><br>
            <input type="text" value="<?php echo (isset($titre))?$titre:"" ?>" name="titre" id="titre" placeholder="titre"><br>
            <span><?php echo $a_errors["titre"] ?></span><br>
            <label for="s_titre">Sous titre</label><br>
            <input type="text" name="s_titre" value="<?php echo (isset($s_titre))?$s_titre:"" ?>" id="s_titre" placeholder="sous titre"><br>
            <span><?php echo $a_errors["s_titre"] ?></span><br>
            <label for="desc">Description</label><br>
            <textarea rows="10" cols="20" name="description" id="desc" ><?php echo (isset($desc))?$desc:"" ?></textarea>
            <span><?php echo $a_errors["description"] ?></span><br>
            <label for="image">Image</label><br>
            <input type="file" name="fichier" id="image" placeholder="titre"><br>
            <span><?php echo $a_errors["image"] ?></span><br>
            <button>Ajouter</button><br>
            <span><?php echo $ok ?></span><br>
            
        </form>
    </div>
</body>
</html>