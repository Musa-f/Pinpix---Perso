
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-6">
      <h2 class="titles-pages">INSCRIPTION</h2>

      <?php
        if(isset($errors) AND !empty($errors)):
        $error = implode("<br>", $errors);
    ?>
    <div class="col">
        <div class="alert alert-danger">
            <?php echo $error;?>
        </div>
    </div>
    <?php elseif(!isset($errors)):?>
        <div class='alert alert-success col-6'>Vous avez été inscrit avec succès. <a href='../controller/controller.connexion.php'>Connectez-vous</a> pour avoir accès à votre compte.</div>
    <?php endif; ?>

      <form method="POST">
        <div class="form-group mt-4 mb-4">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group mt-4 mb-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="form-group mt-4 mb-4">
            <label for="pswd">Mot de passe</label>
            <input type="password" class="form-control" name="pswd">
          </div>
          <div class="form-group mt-4 mb-4 justify-content-center"></div>
          <button type="submit" name="submit" class="btn btn-inscription text-white">Confirmer</button>
        </div>
        </form>
    </div>
  </div>
</div>
