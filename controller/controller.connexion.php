<?php
session_start();

    if(isset($_SESSION['user'])){
        header('Location: controller.accueil.php');
    }else{
        include '../model/model.conn.php';
        include '../model/model.select.php';

        if(isset($_POST['submit'])){
            $errors = [];
    
            if(!empty($_POST['name']) AND !empty($_POST['pswd'])){
                $username = htmlspecialchars($_POST['name']);
                $password = htmlspecialchars($_POST['pswd']);
                
                $reqUser = f1_select($bdd, $username);
        
                if($reqUser->rowCount() > 0){
                    $user = $reqUser->fetch();
                    $hashed_password = $user['pswd_user'];
                        if(password_verify($password, $hashed_password)) {
                            $_SESSION['user'] = $username;
                            $_SESSION['pswd'] = $password;
                            $_SESSION['id'] = $user['id_user'];
                            $_SESSION['role'] = (string)$user['id_role'];
                            header('Location: controller.profil.php');
                        }else{
                            $error3 = "Vos informations sont incorrectes.";
                            $errors[] = $error3;
                        }
                }else{ 
                    $error2 = "Aucun utilisateur avec ce nom n'a été trouvé.";
                    $errors[] = $error2;
                }
            }else{
                    $error1 = "Veuillez compléter tous les champs.";
                    $errors[] = $error1;
            }
        }

        $style = "connexion";
        include '../view/view.header.php';
        include '../view/view.connexion.php';
        include '../view/view.footer.php';

    }