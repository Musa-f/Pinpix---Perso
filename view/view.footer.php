        <footer>
            <h1>Infos utiles</h1>
            <div class="services">
                <div>
                    <nav class="nav-footer">
                        <ul>
                            <li><a href="">Qui Sommes-Nous?</a></li>
                            <li><a href="">Communauté</a></li>
                            <li><a href="">Rejoindre l'équipe</a></li>
                            <li><a href="">Centre d'assistance</a></li>
                            <li><a href="">Charte de protection des données</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <ul class="reseaux">
                        <li><a href=""><i class="bi bi-facebook"></i></a></li>
                        <li><a href=""><i class="bi bi-instagram"></i></a></li>
                        <li><a href=""><i class="bi bi-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <div class="d-flex align-items-center justify-content-center p-0">
            <p>&copy; 2023, PinPix.</p>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script>
            let checkConnexion = "<?php 
                                    if(isset($_SESSION['user'])){
                                        echo $_SESSION['user'];
                                    }else{
                                        echo 'null';
                                    }
                                ?>";

            function addFollower(click){
                let idUser;
                let idUserFollowed;
                if(checkConnexion == 'null'){
                    window.location = "/pinpix2/controller/controller.connexion.php"
                }else{
                    let btnFollow = click.querySelector("i"); 

                    if(btnFollow.classList.contains('bi-person-fill-add')){
                        btnFollow.removeAttribute('class', 'bi-person-fill-add');
                        btnFollow.setAttribute('class', 'bi-person-add');
                    }else{
                        btnFollow.removeAttribute('class', 'bi-person-add');
                        btnFollow.setAttribute('class', 'bi-person-fill-add');
                    }

                    idUser = "<?= $_SESSION['id']?>" 
                    idUserFollowed = click.className;
                    console.log(idUserFollowed);
                    $.ajax({
                        url: '../controller/controller.insert-follows.php',
                        type: 'POST',
                        data: {
                            idUser:idUser,
                            idUserFollowed:idUserFollowed
                        }
                    })
                }
            }
            
            function addLike(click){
                let idUser;
                let idImgLiked;
                if(checkConnexion == 'null'){
                    window.location = "/pinpix2/controller/controller.connexion.php"
                }else{
                    //Change le style du bouton au clique
                    //Incrémente ou décrémente le nombre de likes
                    let btnLike = click.querySelector("i"); 

                    let parentLike = click.parentNode;  
                    let childLike = parentLike.firstChild
                    let likeValue = childLike.nodeValue;
                    let likeInt = parseInt(likeValue);

                    if(btnLike.classList.contains('bi-suit-heart-fill')){
                        btnLike.removeAttribute('class', 'bi-suit-heart-fill');
                        btnLike.setAttribute('class', 'bi-suit-heart');
                        childLike.nodeValue = likeInt-1 +' ';
                    }else{
                        btnLike.removeAttribute('class', 'bi-suit-heart');
                        btnLike.setAttribute('class', 'bi-suit-heart-fill');
                        childLike.nodeValue = likeInt+1 +' ';
                    }

                    //Insère les données pour la requête Ajax
                    idUser = "<?= $_SESSION['id']?>" 
                    idImgLiked = click.className;
                    $.ajax({
                        url: '../controller/controller.insert-likes.php',
                        type: 'POST',
                        data: {
                            idUser:idUser,
                            idImgLiked:idImgLiked
                        }
                    })
                }
            }
            
        </script>
        <script src="<?php
                    if (isset($script)){
                        echo $script;
                    }?>"></script>
        </body>

        </html>