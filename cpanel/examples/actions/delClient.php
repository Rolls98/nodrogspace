<?php 

   if(session_status() === PHP_SESSION_NONE){
       session_start();
   }

   if(!isset($_SESSION["a_connected"])){
       header("location:../login.php");
   }else{

        include ("../../../db/db.php");
       $id = isset($_GET["id"])?$_GET["id"]:"";
       $db = Database::connexion();

       if(delClient($db,$id)){
            header("location:../tables.php");
       }else{
           echo "client non supprimé";
       }
   }

?>