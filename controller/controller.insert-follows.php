<?php
include "../model/model.conn.php";
include "../model/model.select.php";
include "../model/model.insert.php";
include "../model/model.delete.php";

$idUser = $_POST['idUser'];
$idUserFollowed = $_POST['idUserFollowed'];

$bool_follow = bool_follow($bdd, $idUser, $idUserFollowed);
$bool_follow = $bool_follow->fetchAll();

if (isset($bool_follow[0][0])){
    delete_follows($bdd, $idUser, $idUserFollowed);
}else{
    insert_follows($bdd, $idUser, $idUserFollowed);
}