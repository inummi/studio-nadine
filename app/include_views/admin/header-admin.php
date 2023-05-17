<?php
    session_start();
    require '../../path.php';
    require '../controllers/categoriesController.php';
    require '../controllers/servicesController.php';
    require '../controllers/imagesController.php';
?>
<header>
<?php if ($_SESSION['status'] == 1):?>
    <div class="container-fluid admin-header">
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
</header>

   