<?php

class Database{
    private static $host = "localhost";
    private static $user = "root";
    private static $dbName = "blog";
    private static $password = "";
    private static $connexion = null;

    public  function connexion(){
        self::$connexion = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8",self::$user,self::$password);   
        return self::$connexion;
    }

    public  function deconnexion(){
        self::$connexion = null;
    }
}


function recevMsg($db,$data){
    $pre = $db->prepare("INSERT INTO service_client(nom,prenom,tel,email,pays,ville,message,abonne,date_envoi) VALUES(?,?,?,?,?,?,?,?,Now())");
    return ($pre->execute($data))?true:false;
}

function addArt($db,$data){
    $pre = $db->prepare("INSERT INTO article(titre,s_titre,description,image,date_create) VALUES(?,?,?,?,Now())");
    return ($pre->execute($data))?true:false;
}


function findClient($db,$email){
    $pre = $db->prepare("SELECT * FROM clients WHERE email=?");
    $pre->execute([$email]);

    return $pre->fetch();
}

function findAllClients($db){
    $pre = $db->query("SELECT id,nom,pays,ville,email FROM clients ");
    return $pre->fetchAll();
}

function findAllArticles($db){
    $pre = $db->query("SELECT id,titre,s_titre,image,description FROM article ");
    return $pre->fetchAll();
}

function findAdmin($db,$email){
    $pre = $db->prepare("SELECT * FROM admins WHERE email=?");
    $pre->execute([$email]);

    return $pre->fetch();
}

function addClient($db,$coords){
    $req = $db->prepare("INSERT INTO clients(nom,email,age,u_password,image,date_inscription) VALUES(?,?,?,?,?,Now())");
    return ($req->execute($coords))?true:false;
}

function rcpArticles($db){
    $articles = $db->query("SELECT * FROM article");
    return $articles->fetchAll();
}

function updateClient($db,$infos){
    $req = $db->prepare("UPDATE clients SET  username = ?,nom = ?,prenom=?,email = ?,addresse = ?,ville=?,pays=?,description=?,image=? WHERE id=?");
    return ($req->execute($infos))?true:false;
}

function updateadmin($db,$infos){
    $req = $db->prepare("UPDATE clients SET  username = ?,nom = ?,prenom=?,email = ?,addresse = ?,ville=?,pays=?,description=?,image=? WHERE id=?");
    return ($req->execute($infos))?true:false;
}





?>