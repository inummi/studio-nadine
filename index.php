<!doctype html>
<html lang="ru">
    <!-- head START -->
    <?php include 'app/include_views/head.php'?>
    <!-- head END -->
  <body>
    <!-- Header START -->
    <?php include 'app/include_views/header.php'?>
    <!-- Header END -->

    <!-- Section lady START -->
    <section class="lady mt-5">
      <div class="container">
        <div class="row text-center">
          <div class="col-xl-4 lady_title">
            Студия-ателье
          </div>
          <div class="col-xl-4">
            <img src="assets/img/lady.png" width="250px" alt="Nadine - Призводство текстильных изделий">
          </div>
          <div class="col-xl-4 lady_title">
            Работаем боллее 10 лет
          </div>
      </div>
    </section>
    <!-- Section lady END -->
    <!-- Section Why_us START -->
    <section class="why_us mt-5 mb-5">
        <div class="container">
            <div class="row text-center">
                <h2>Наши преимущества<h2>
            </div>
            <div class="row text-center">
                <div class="col-xl-4">
                    <div class="text_why_us">
                        <img src="assets/img/why_us/people.png" class="img_why_us">
                        <p>Индивидуальный подход к каждому клиенту</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="text_why_us">
                        <img src="assets/img/why_us/polo.png" class="img_why_us">
                        <p>Широкий выбор услуг</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="text_why_us">
                        <img src="assets/img/why_us/computer.png" class="img_why_us">
                        <p>Компьютерная вышивка на любые изделия</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="text_why_us">
                        <img src="assets/img/why_us/money.png" class="img_why_us">
                        <p>Низкие цены на все услуги</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="text_why_us">
                        <img src="assets/img/why_us/truck.png" class="img_why_us">
                        <p>Возможность доставки по всей России</p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="text_why_us">
                        <img src="assets/img/why_us/free.png" class="img_why_us">
                        <p>Бесплатный макет вышивки</p>
                    </div>
                </div>
             </div>
        </div>
    </section>
    <!-- Section Why_us END -->
    <!-- Section main START -->
    <section class="main mt-3">
      <div class="container">
        <div class="row text-center">
          <?php foreach (giveAllCategories() as $key=>$category): ?>  
            
                <div class="col-xl-3">
                  <div class="hover-text-one" style=" width: 19rem;">
                      <figure  class="effect-text-three">
                          <a href="<?= BASE_URL . 'service.php?'. 'id=' . $category['id']. '&'. 'name=' . $category['name'] . '&'. 'description=' . $category['description']?>">
                            <img src="assets/img/categories/<?=$category['pic']?>" class="card-img-top img-responsive" alt="...">
                            <figcaption>
                                <h2><?=$category['name']?></h2>
                            </figcaption> 
                          </a>
                      </figure>      
                  </div>
                </div>
           <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Section main END -->
    

    

  <!-- Footer START -->
  <?php include 'app/include_views/footer.php'?>
  <!-- Footer END -->
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>