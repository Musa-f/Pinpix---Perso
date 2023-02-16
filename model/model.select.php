<?php

    function f1_select($bdd, $username){
        $reqUsername = $bdd->prepare("SELECT * FROM users WHERE name_user = :name_user");
        $reqUsername->execute(array(
            'name_user' => $username
        ));
        return $reqUsername;
    }

    function f2_select($bdd, $email){
        $reqEmail = $bdd->prepare("SELECT COUNT(email_user) FROM users WHERE email_user = :email_user");
        $reqEmail->execute(array(
            'email_user' => $email
        ));
        return $reqEmail;
    }

    function get_users_images($bdd){
        $reqInfosImg = $bdd->prepare("
                                    SELECT users.id_user, users.name_user, images.id_image, images.name_image, users.bio_user, images.url_image
                                    FROM users
                                    JOIN images ON users.id_user = images.id_user
                                    ORDER BY images.date_image DESC
                                    LIMIT 16
                                ");
        $reqInfosImg->execute();
        return $reqInfosImg;
    }

    function count_likes($bdd, $id_img){
        $reqCountLikes = $bdd->prepare("
                                        SELECT COUNT(id_image)
                                        FROM likes
                                        WHERE id_image = :id_image
                                        ");
        $reqCountLikes->execute(array(
            'id_image' => $id_img
        ));
        return $reqCountLikes;
    }

    function bool_like($bdd, $id_user, $id_image){
        $reqBoolLike = $bdd->prepare("
                                    SELECT id_image
                                    FROM likes 
                                    WHERE id_user = :id_user AND id_image = :id_image;
                                ");
        $reqBoolLike->execute(array(
            'id_user' => $id_user,
            'id_image' => $id_image
        ));
        return $reqBoolLike;
    }

    function bool_follow($bdd, $user1, $user2){
        $reqBoolFollow = $bdd->prepare("
                                        SELECT id_user
                                        FROM follows
                                        WHERE id_user = :id_user AND id_followed_user = :id_followed_user
                                    ");
        $reqBoolFollow->execute(array(
            'id_user' => $user1,
            'id_followed_user' => $user2
        ));
        return $reqBoolFollow;                      
    }