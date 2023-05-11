<?php 
    require 'path.php';
    require 'app/controllers/userController.php';
?>

<!doctype html>
<html lang="ru">
    <!-- head START -->
    <?php include 'app/include_views/head.php'?>
    <!-- head END -->
  <body>
    <section>
      <div class="container">
        <form class="auth row justify-content-center text-center" method="post">
          <div class="mb-3 col-12 col-md-4">
          <p><?=$msg?></p>
          </div>
          <div class="w-100"></div>
          <div class="mb-3 col-12 col-md-4">
            <label for="login" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" id="login">
          </div>
          <div class="w-100"></div>
          <div class="mb-3 col-12 col-md-4">
            <label for="password" class="form-label">Пароль</label>
             <input type="password" name="password" class="form-control" id="password">
          </div>
          <div class="w-100"></div>
          <div class="mb-3 col-12 col-md-4">
            <label for="passwordRepeat" class="form-label">Повторить пароль</label>
            <input type="password" name="passwordRepeat" class="form-control" id="passwordRepeat">
          </div>
          <div class="w-100"></div>
          <div class="mb-3 col-12 col-md-4">
            <button type="submit" name="btn-auth" class="btn btn-success" value="true">Войти</button>
          </div>                
        </form>
      </div>
    </section>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>