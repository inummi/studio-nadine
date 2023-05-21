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
                            <h2>Добавление категории</h2>
                            <form class="add_cat_form" method="post" enctype="multipart/form-data">
                                <div class="mb-3 col-12 col-md-4">
                                <p><?=$msg?></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                      <label for="cat_name" class="form-label">Название категории:</label>
                                      <input type="text" class="form-control" name="cat_name" id="cat_name">
                                    </div>
                                    <div class="mb-3">
                                      <label for="description" class="form-label">Описание категории:</label>
                                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                      <label for="img" class="form-label">Выберите изображение для категории (необходимо квадратное):</label>
                                      <input class="form-control" type="file" name="img" id="img">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="btn-add_cat" class="btn btn-success" value="true">Добавить категорию</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </html>
<?php endif;?>