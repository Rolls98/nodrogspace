<?php

function checkInput($data){
    $rv = trim(htmlentities($data));
    return htmlspecialchars($rv);
}

function vide($arr){
    foreach($el as $arr["erros"]){
        $arr[$el]="";
    }
} ?>