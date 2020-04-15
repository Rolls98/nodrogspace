<?php

class Database{
    private static $host = "localhost";
    private static $user = "root";
    private static $dbName = "blog";
    private static $password = "02491383Ro";
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






?>