<?php

    function delete_likes($bdd, $id_user, $id_img){
        $delete = $bdd->prepare("DELETE FROM likes WHERE id_user = :id_user AND id_image = :id_img");
        $delete->execute(array(
            'id_user' => $id_user,
            'id_img' => $id_img
        ));
    }

    function delete_follows($bdd, $id_user, $id_followed_user){
        $delete = $bdd->prepare("DELETE FROM follows WHERE id_user = :id_user AND id_followed_user = :id_followed_user");
        $delete->execute(array(
            'id_user' => $id_user,
            'id_followed_user' => $id_followed_user
        ));
    }