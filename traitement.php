<?php 

    include("db/db.php");
    include("functions.php");

    

$array = array("errors"=>array("errorNom"=>"","errorPrenom"=>"","errorTelephone"=>"","errorEmail"=>"","errorPays"=>"","errorMessage"=>"","errorVille"=>""),"success"=>"");

if(isset($_POST)){
    $db = Database::connexion();
    $validate = true;
    $nom = isset($_POST["nom"])?checkInput($_POST["nom"]):"";
    $prenom = isset($_POST["prenom"])?checkInput($_POST["prenom"]):"";
    $telephone = isset($_POST["telephone"])?checkInput($_POST["telephone"]):"";
    $email = isset($_POST["email"])?checkInput($_POST["email"]):"";
    $pays = isset($_POST["pays"])?checkInput($_POST["pays"]):"";
    $ville = isset($_POST["ville"])?checkInput($_POST["ville"]):"";
    $message = isset($_POST["message"])?checkInput($_POST["message"]):"";
    $abonne = isset($_POST["abonne"])?1:0;


    if(empty($nom)){
        $validate = false;
        $array["errors"]["errorNom"] = "veuillez entrer votre nom";
    }else if(strlen($nom) < 4){
        $validate = false;
        $array["errors"]["errorNom"] = "Désolé un nom n'est pas inferieur à 4 caractères";
    }

    if(empty($prenom)){
        $validate = false;
        $array["errors"]["errorPrenom"] = "veuillez entrer votre prenom";
    }else if(strlen($prenom) < 4){
        $validate = false;
        $array["errors"]["errorPrenom"] = "Désolé un prenom n'est pas inferieur à 4 caractères";
    }

    if(empty($telephone)){
        $validate = false;
        $array["errors"]["errorTelephone"] = "veuillez entrer votre numero";
    }else{
        preg_match("/^\+\d{1,3}\d{8,10}/",$telephone,$match);
        if(!$match){
            $validate = false;
            $array["errors"]["errorTelephone"] = "Entrez un numéro correct avec l'indicatif";
        }
    }

    if(empty($email)){
        $validate = false;
        $array["errors"]["errorEmail"] = "veuillez entrer votre email";
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $validate = false;
        $array["errors"]["errorEmail"] = "Veuillez saisir un Email correct";
    }


    if($pays == "Choisir..."){
        $validate = false;
        $array["errors"]["errorPays"] = "veuillez choisir votre pays";
    }

    if(empty($ville)){
        $validate = false;
        $array["errors"]["errorVille"] = "veuillez saisir une ville correct";
    }

    if(empty($message)){
        $validate = false;
        $array["errors"]["errorMessage"] = "Le message est obligatoire";
    }else if(strlen($message)<10){
        $validate = false;
        $array["errors"]["errorMessage"] = "veuillez ecrire un bon message svp";
    }

    if(!$validate){
        echo json_encode($array);
    }else{
        $datas = array($nom,$prenom,$telephone,$email,$pays,$ville,$message,$abonne);
        vide($array["errors"]);
        if(recevMsg($db,$datas)){
            $array["success"] = "Votre message a été envoyé, merci :)"; 
        }else{
            $array["success"] = "toutes les informations sont remplies mais le message n'a pas été envoyé";
        }

        echo json_encode($array);
        Database::deconnexion();
    }
}







?>