<script>
    let checkConnexion = "<?php 
                        if(isset($_SESSION['user'])){
                            echo $_SESSION['user'];
                        }else{
                            echo 'null';
                        }
                        ?>";

    let idConnexion = "<?php 
                        if(isset($_SESSION['id'])){
                            echo $_SESSION['id'];
                        }else{
                            echo 'null';
                        }
                        ?>";


    function addFollower(click){
        console.log(checkConnexion)
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

            let idUser = idConnexion;
            let idUserFollowed = click.className;
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
            let idUser = idConnexion;
            let idImgLiked = click.className;
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