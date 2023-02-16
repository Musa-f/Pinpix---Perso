<?php
session_start();
include '../model/model.conn.php';
include '../model/model.select.php';

$style = "accueil";
include "../view/view.header.php";

$users_images = get_users_images($bdd);
$users_images = $users_images->fetchAll();
$like = [];
$follows = [];

    if(isset($_SESSION['user'])){
        $id_user = $_SESSION['id']; 
        $images = get_users_images($bdd); 
        
        foreach($images as $image){
            $id_user2 = $image['id_user'];
            $bool_follow = bool_follow($bdd, $id_user, $id_user2);
            $bool_follow = $bool_follow->fetchAll();
            if(isset($bool_follow[0][0])){
                array_push($follows, "bi-person-fill-add");
            }else{
                array_push($follows, "bi-person-add");
            }

            $id_image = $image['id_image'];
            $bool_like = bool_like($bdd, $id_user, $id_image);
            $bool_like = $bool_like->fetchAll();
            if(isset($bool_like[0][0])){
                array_push($like,"bi-suit-heart-fill");
            } else {
                array_push($like,"bi-suit-heart");
            }
        };
    };
    

    /*
    $images = get_users_images($bdd); 
    foreach($images as $image){
        $reqCountLikes = count_likes($bdd, $image);
        $fetchCountLikes = $reqCountLikes->fetchAll();
        $countLike = $fetchCountLikes[0][0];
    }*/


include "../view/view.accueil.php";
include "../view/view.footer.php";