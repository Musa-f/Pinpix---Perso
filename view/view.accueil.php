<div class="container mt-4 mb-4 pt-5">
    <div class="row justify-content-center text-center">
        <div class="col">
            <h2>"Des souvenirs éternels avec PinPix"</h2>
            <p>
                Rejoignez une communauté passionnée de photographie en ligne ! Avec ce site, vous pouvez partager vos plus belles photos avec le monde entier et découvrir les talents de photographes du monde entier. Suivez les galeries de vos photographes préférés, likez les photos qui vous inspirent. Créez votre propre galerie pour montrer votre créativité et votre style unique.
                Inscrivez-vous dès maintenant et faites partie d'une communauté en constante évolution de passionnés de la photographie.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="gallery-images">

                <?php 
                    $i=0;
                    foreach($users_images as $img):?>
                    <div class='box d-flex flex-column'>
                    <div class='d-flex justify-content-between'>
                        <p> <?=$img['name_user']?>
                            <button onclick="addFollower(this)" class="<?=$img['id_user']?>">
                                <i class="bi 
                                <?php if(isset($_SESSION['user'])){
                                    echo $follows[$i];
                                }else{
                                    echo 'bi-person-add';
                                };?>
                                "></i>
                            </button>
                        </p>
                        <p>
                            <?php
                                $image = $img['id_image'];
                                $reqCountLikes = count_likes($bdd, $image);
                                $fetchCountLikes = $reqCountLikes->fetchAll();
                                $countLike = $fetchCountLikes[0][0];
                                echo $countLike;
                            ?>
                            <button onclick="addLike(this)" class="<?=$img['id_image']?>">
                                <i class="bi
                                <?php if(isset($_SESSION['user'])){
                                    echo $like[$i];
                                }else{
                                    echo 'bi-suit-heart';
                                }?>
                                "></i>
                            </button>
                        </p>
                    </div>
                    <img src="../<?=$img['url_image']?>" alt='' data-bs-toggle="modal" data-bs-target="#picture" class='dimension'>
                </div>
                <?php $i++;
                endforeach?>

            </div>
        </div>
    </div>
</div>


    <!-- Modal photo -->
    <?php foreach($users_images as $img):?>
    <div class="modal fade" id="picture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Nom de l'image</h5>
                </div>

                <div class="modal-body">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-between">
                            <p><?= $img['name_user']?> <i class="bi bi-heart-fill"></i></p>
                            <p>189<i class="bi bi-hand-thumbs-up"></i></p>
                        </div>
                        <img src="https://fastly.picsum.photos/id/499/800/600.jpg?hmac=kNoHCFPvxcAVkC2BjZmeF8alHf6wewuAz1JeHg_lMgo" alt="">
                        <div class="d-flex justify-content-between">
                            <p>
                                <i class="bi bi-tags"></i> 
                                tags1
                            </p>
                            <p>02/03/2022</p>
                        </div>
                    </div>
                    <div>
                        <h3>Description</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. In, atque assumenda beatae eaque possimus quia. Accusantium, perferendis? Totam nobis repudiandae voluptatem unde temporibus dolor exercitationem, porro itaque eos, possimus ipsum assumenda voluptatibus et voluptatum expedita odio ducimus, excepturi maiores? Doloribus ipsum accusamus ipsam id commodi ut non nulla earum, dicta, deserunt a error dignissimos illo vero. Eum qui dicta delectus!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>