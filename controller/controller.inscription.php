<?php
session_start();

    if(isset($_SESSION['user'])){
        header('Location: controller.accueil.php');
    }else{
        include '../model/model.conn.php';
        include '../model/model.select.php';
        include '../model/model.insert.php';

        $errors = [];

        if(isset($_POST['submit'])){
            $username = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['pswd']);

            if($username == null || $email == null || $password == null){
                $error1 = "Veuillez remplir tous les champs.";
                $errors[] = $error1;
            }else{
                if(strlen($username)<5){
                    $error2 = "Le nom d'utilisateur doit contenir au moins 5 caractères.";
                    $errors[] = $error2;
                }
                if(strlen($username)>20){
                    $error3 = "Le nom d'utilisateur ne doit pas dépasser 20 caractères.";
                    $errors[] = $error3;
                }
                if(!ctype_alnum($username)){
                    $error4 = "Le nom d'utilisateur ne peut contenir des caractères spéciaux.";
                    $errors[] = $error4;
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error5 = "Entrez une adresse mail valide.";
                    $errors[] = $error5;
                }
                if(strlen($password)<5){
                    $error6 = "Le mot de passe doit contenir au moins 5 caractères.";
                    $errors[] = $error6;
                }

                $fetchUsername = f1_select($bdd, $username)->fetchColumn();
                $fetchEmail = f2_select($bdd, $email)->fetchColumn();

                if($fetchUsername >=1 || $fetchEmail >=1){
                    $error7 = "Le nom d'utilisateur ou l'adresse mail sont déjà existants";
                    $errors[] = $error7;
                }
                elseif($errors == null){
                    $password = (password_hash($_POST['pswd'], PASSWORD_BCRYPT));
                    f1_insert($bdd, $username, $email, $password);
                    unset($errors);
                }
            }
        }

        $style = "inscription";
        include '../view/view.header.php';
        include '../view/viscriptiew.inon.php';
        include '../view/view.footer.php';
    }