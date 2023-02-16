<?php
include "../model/model.conn.php";
include "../model/model.select.php";
include "../model/model.insert.php";
include "../model/model.delete.php";

$idUser = $_POST['idUser'];
$idImgLiked = $_POST['idImgLiked'];
$idUser = strval($idUser);
$idImgLiked = strval($idImgLiked);

$bool_like = bool_like($bdd, $idUser, $idImgLiked);
$bool_like = $bool_like->fetchAll();

if (isset($bool_like[0][0])){
    delete_likes($bdd, $idUser, $idImgLiked);
}else{
    insert_likes($bdd, $idUser, $idImgLiked);
}