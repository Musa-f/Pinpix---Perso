<?php
session_start();

include '../view/view.header.php';

    if(isset($_SESSION['user'])){
        include "../view/view.profil.php";
    }else{
        header('Location: ../view/view.forbidden.php');

    }

include "../view/view.footer.php";