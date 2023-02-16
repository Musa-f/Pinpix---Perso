<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-6">
      <h2 class="titles-pages">CONNEXION</h2>

      <?php
        if(isset($errors) AND !empty($errors)):
        $error = implode("<br>", $errors);
      ?>
      <div class="col">
        <div class="alert alert-danger">
            <?php echo $error;?>
        </div>
      </div>
      <?php endif; ?>

      <p>Pas de compte ? <a href="../controller/controller.inscription.php" class="fw-bold color-bordeau">Inscrivez-vous</a> dès maintenant !</p>

      <form method="post">
          <div class="form-group mt-4 mb-4">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="email" value="<?php echo isset($_POST['name']) ? $username : '';?>">
          </div>
          <div class="form-group1 mt-4 mb-4">
            <label for="pswd">Mot de passe</label>
            <input type="password" class="form-control" name="pswd" value="<?php echo isset($_POST['pswd']) ? $username : '';?>">
          </div>
          <div class="form-group mt-4 mb-4 justify-content-center"></div>
          <button type="submit" name="submit" class="btn btn-inscription text-white">Confirmer</button>
        </div>
      </form>
      
    </div>
  </div>
</div>

