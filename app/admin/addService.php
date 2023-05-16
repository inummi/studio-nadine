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
                        <h2>Добавление услуги</h2>
                        <form class="add_cat_form" method="post">
                            <div class="mb-3 col-12 col-md-4">
                            <p><?=$msg?></p>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                  <label for="serv_name" class="form-label">Название услуги:</label>
                                  <input type="text" class="form-control" name="serv_name" id="serv_name">
                                </div>
                                <div class="mb-3">
                                  <label for="description" class="form-label">Описание услуги:</label>
                                  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="price" class="form-label">Стоимость:</label>
                                  <input type="text" class="form-control" name="price" id="price">
                                </div>
                                <div class="mb-3">
                                  <select class="form-select" name="choice_category" aria-label="choice_category">
                                    <option selected>Выбрать категорию</option>
                                    <?php foreach (giveAllCategories() as $key => $value): ?>
                                        <option name="choice_category" value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="btn-add_service" class="btn btn-success" value="true">Добавить услугу</button>
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


