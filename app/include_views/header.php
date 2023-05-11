<?php
    session_start();
    require 'path.php';
    require 'app/controllers/categoriesController.php';
?>

<?php if ($_SESSION['status'] == 1):?>
    <div class="container-fluid admin-header mb-3">
        <div class="row">
            <div class="col-xl-6 text-start admin-menu">
                <ul>
                    <li><a href="<?=BASE_URL?>">Сайт</a></li>
                    <li><a href="<?=BASE_URL . 'app/admin/categories.php'?>">Админ-панель</a></li>
                </ul>
            </div>
            <div class="col-xl-6 text-end  admin-menu">
                <?=$_SESSION['login']?>
            </div>
        </div>
    </div>
<?php endif;?>

    <div class="header mt-3">
      <div class="container-fluid text-center">
        <div class="row justify-content-center">
          <div class="col-xl-4">
            <div class="phone icon-phone"> 
              +9 (999) 999-99-99
            </div>
          </div>
          <div class="col-xl-4">
            <a href="#">
                <div class="logo">
                  <img src="assets/img/logo.png" width="221px" alt="Nadine - Призводство текстильных изделий">
                </div>
            </a>
          </div>
          <div class="col-xl-4">
            <div class="social">
              <a class="icon-instagram" href="#"></a>
              <a class="icon-vkontakte" href="#"></a>
              <a class="icon-whatsapp" href="#"></a>
              <a class="icon-telegram" href="#"></a>
          </div>  
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-12">
            <div class="menu">
            <ul class="">
              <?php foreach(giveAllCategories() as $key => $category): ?>
                <li><a href="#"><?=$category['name']?></a></li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>