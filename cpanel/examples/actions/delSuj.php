<?php 

   if(session_status() === PHP_SESSION_NONE){
       session_start();
   }

   if(!isset($_SESSION["a_connected"])){
       header("location:../login.php");
   }else{

        include ("../../../db/db.php");
       $id = isset($_GET["id"])?intval($_GET["id"]):"";
       $db = Database::connexion();

       if(is_numeric($id)){
           if(delSuj($db,$id)){
                header("location:../sujets.php");
            }else{
                echo "sujet non supprimé";
            }
       }else{
           echo "l'id n'est pas un nombre";
       }
   }

?>