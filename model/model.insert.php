<?php

    function f1_insert($bdd, $username, $email, $password){
        $insert = $bdd->prepare("INSERT INTO users (name_user, email_user, pswd_user) VALUES (:name_user, :email_user, :pswd_user)");
        $insert->execute(array(
            'name_user' => $username,
            'email_user' => $email,
            'pswd_user' => $password
        ));
    }

    function insert_likes($bdd, $id_user, $id_img){
        $insert = $bdd->prepare("INSERT INTO likes(id_user, id_image) VALUES (:id_user, :id_img)");
        $insert->execute(array(
            'id_user' => $id_user,
            'id_img' => $id_img
        ));
    }

    function insert_follows($bdd, $id_user, $id_followed_user){
        $insert = $bdd->prepare("INSERT INTO follows(id_user, id_followed_user) VALUES (:id_user, :id_followed_user)");
        $insert->execute(array(
            'id_user' => $id_user, 
            'id_followed_user' => $id_followed_user
        ));
    }

    