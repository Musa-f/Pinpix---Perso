<?php
session_start();

include '../model/model.conn.php';
include '../model/model.select.php';

$style = "recherche";
include "../view/view.header.php";
include "../view/view.recherche.php";
include "../view/view.footer.php";
