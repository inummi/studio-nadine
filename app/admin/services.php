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
                        <h2>Услуги</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 add_cat">
                                <a href="<?=BASE_URL . 'app/admin/addService.php'?>" class="btn btn-success">Добавить услугу</a>
                            </div>
                        <div class="row text-center">
                            <?php foreach (getServiceByCategories() as $key => $value):?>
                                <div class="col-xl-4">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4><?=$key?></h4>
                                          </div>
                                            <?php foreach ($value as $key2 => $value2):?>
                                                <div class="card-body">
                                                    <div class="row">
                                                      <div class="col-xl-4">
                                                          <p class="card-text"><?=$value2['service']?></p>
                                                      </div>
                                                      <div class="col-xl-4">
                                                          <p class="card-text"><?=$value2['price']?></p>
                                                      </div>
                                                      <div class="col-xl-4 text-end">
                                                          <a href="<?=BASE_URL . 'app/admin/editService.php?'.'id='.$value2['id'] . '&'. 'name=' . $value2['service']. '&'. 'description='. $value2['description'].'&'. 'price='. $value2['price']. '&'. 'category_id='. $value2['category_id'] . '&'. 'category_name='. $value2['category_name']?>" class="btn btn-primary">Редактировать</a>
                                                      </div>                                      
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
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
