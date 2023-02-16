<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if(isset($title)){
            echo "<title>$title</title>";
        }else{
            echo "<title>PinPix</title>";
        }
    ?>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="/pinpix/site/assets/ressources/icons/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <?php 
        if(isset($style)){
            echo "<link rel='stylesheet' href='../assets/css/$style.css'>";
        }
    ?>
    
    
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>
    <header>
        <nav>
            <div class="div_nav">
                <img class="logo" src="../assets/ressources/icons/logo.png">
                <a href="controller.php?page=accueil" class="header">
                    <h1 class="title-header">PinPix</h1>
                </a>
            </div>

            <div class="research-bar">
                <form method="post">
                    <div class="row justify-content-center">
                        <div class="col-12 form-group d-flex flex-row">
                            <input type="text" name="recherche" id="recherche" placeholder="Rechercher par tags ou nom d'utilisateur..." class="form-control">
                            <button type="submit" name="submit" class="btn">
                                <i class="bi bi-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="onglets">
                <li><a href="../controller/controller.accueil.php">Accueil</a></li>
                <li><a href="controller.php?page=contact">Contact</a></li>
                <?php 

                if(!isset($_SESSION["role"])){
                    echo "<li><a href='../controller/controller.connexion.php'>Connexion</a></li>";
                }else if(isset($_SESSION['role'])){
                    echo "
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle menu-focus' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                Menu
                            </a>
                            <ul class='dropdown-menu nav-connected'>
                            <li><a class='dropdown-item' href='controller.php?page=profil'>Profil</a></li>
                            <li><a class='dropdown-item' href='controller.php?page=compte' id='compte'>Mon compte</a></li>
                            <li><a class='dropdown-item' href='controller.php?page=follows'>Mes follows</a></li>
                            ";
                    
                    if($_SESSION['role'] == 1){
                        echo "<li><a class='dropdown-item' href='controller.php?page=dashboard'>Dashboard</a></li>";
                    }   
                    echo "
                        <li><a class='dropdown-item' href='../controller/controller.deconnexion.php'>Se déconnecter</a></li>
                        </ul>
                        ";
                }
                
                ?>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle menu-focus" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                <ul class="dropdown-menu nav-connected">
                    <li><a class="dropdown-item" href="controller.php?page=profil">Profil</a></li>
                    <li><a class="dropdown-item" href="controller.php?page=compte" id="compte">' . $_SESSION["nom"] . '</a></li>
                    <li><a class="dropdown-item" href="controller.php?page=follows">Mes follows</a></li>
                    <li><a class="dropdown-item" href="controller.php?page=deconnexion">Se déconnecter</a></li>';
                    >>>admin
                    <li><a class="dropdown-item" href="controller.php?page=dashboard">Dashboard</a></li>
                
                </ul> -->
                
                
                </div>
            </nav>
        </header>