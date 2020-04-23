

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
            <span><?php echo $a_errors["titre"] ?></span>
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