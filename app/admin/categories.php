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
                    <h2>Категории</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 add_cat">
                            <a href="<?=BASE_URL . 'app/admin/addCat.php'?>" class="btn btn-success">Добавить новую категорию</a>
                        </div>
                    <div class="row">
                        <?php foreach (giveAllCategories() as $key => $category): ?>
                            <div class="card mb-3" style="max-width: 740px; margin-right: 15px;">
                              <div class="row g-0">
                                <div class="col-md-5">
                                  <img src="../../assets/img/categories/<?=$category['pic'];?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                  <div class="card-body">
                                    <h5 class="card-title"><?= $category['name'];?></h5>
                                    <p class="card-text"><?= $category['description']?></p>
                                    <a href="<?=BASE_URL . 'app/admin/editCat.php?'.'id='.$category['id'] . '&'. 'name=' . $category['name']. '&'. 'description=' . $category['description']?>" class="btn btn-primary">Редактировать</a>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>