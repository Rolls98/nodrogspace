<?php

    session_start();
    if(isset($_SESSION["a_connected"])){
        session_destroy();
        header("location:index.php");
    }

?>