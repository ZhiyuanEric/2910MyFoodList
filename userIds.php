<?php
    session_start();
    if(isset($_SESSION['mergeNos']){
        if(isset($_POST['accNo'])){
            array_push($_SESSION['mergeNos'], $accNo);
        }
    } else {
        $_SESSION['mergeNos'] = array();
    }
?>