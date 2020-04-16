<?php

    session_start();
    if(isset($_SESSION["connected"])){
        session_destroy();
        header("location:index.php");
    }

?>