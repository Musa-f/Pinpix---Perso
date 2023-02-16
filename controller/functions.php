<?php

include '../model/model.select.php';

$id_user = $_SESSION['id_user']; 
$images = get_users_images($bdd); // Récupère toutes les images

foreach ($images as $image) {
    $id_image = $image['id'];
    $bool_like = bool_like($bdd, $id_user, $id_image);
    $liked;
    
    if ($bool_like->rowCount() > 0) {
        $liked = "unlike";
    } else {
        $liked = "like";
    }
}
