<?php

function checkInput($data){
    $rv = trim(htmlentities($data));
    return htmlspecialchars($rv);
}

function vide($arr){
    foreach($arr as $key=>$value){
        $arr[$key]="";
    }
} 



?>