<?php 
    session_start();
    if ($_SESSION['status'] == 1):
?>
    <html lang="ru">
        <!-- head START -->
        <?php include '../include_views/admin/head-admin.php'?>
        <!-- head END -->
        <body>
            <!-- header-admin START -->
            <?php include '../include_views/admin/header-admin.php'?>
            <!-- header-admin END -->
            <div class="container-fluid">
                <div class="row">
                   <!-- menu-admin START -->
                   <?php include '../include_views/admin/menu-admin.php'?>
                   <!-- menu-admin END -->
                    <div class="col-sm-6 col-md-10">
                        <div class="row">
                        <h2>Изображения</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 add_cat">
                                <a href="<?=BASE_URL . 'app/admin/addImage.php'?>" class="btn btn-success">Добавить изображение</a>
                            </div>
                        <div class="row">
                            <?php foreach (getImagesByCategories() as $key => $value):?>
                                <div class="col-xl-12">
                                        <div class="card mt-3">
                                          <div class="card-header">
                                            <h4><?=$key?></h4>
                                          </div>
                                                <div class="card-body">
                                                    <div class="row text-center">
                                                      <?php foreach ($value as $key2 => $value2):?>
                                                        <div class="col-xl-2">
                                                            <img src="../../assets/img/images/<?=$value2['pic']?>" class="img-thumbnail">
                                                            <a href="<?=BASE_URL . 'app/admin/editImage.php?'.'id='.$value2['id'] . '&' . 'description='.$value2['description']. '&' . 'category_name='.$key. '&' . 'category_id='.$value2['cat_id']?>" class="btn btn-primary" style="width: 100%;">Редактировать</a>
                                                        </div>
                                                      <?php endforeach;?> 
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                <?php endforeach;?>                        
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </html>
<?php endif;?>   
 