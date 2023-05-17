<!doctype html>
<html lang="ru">
    <!-- head START -->
    <?php include 'app/include_views/head.php'?>
    <!-- head END -->
  <body>
    <!-- Header START -->
    <?php include 'app/include_views/header.php'?>
    <!-- Header END -->

    <!-- Section services START -->
    <section class="services">
        <div class="container">
            <div class="row">
                <h2><?=$_GET['name']?></h2>
                <div class="col-xl-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php foreach(getServiceByCategories() as $key=>$value):?>
                        <?php if($key === $_GET['name']): ?>
                            <?php foreach($value as $key2=>$value2):?>
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$value2['id']?>" aria-expanded="false" aria-controls="flush-collapse<?=$value2['id']?>">
                                      <?=$value2['service']?>
                                    </button>
                                  </h2>
                                  <div id="flush-collapse<?=$value2['id']?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p><?=$value2['description']?></p>
                                        <p>Стомость от <?=$value2['price']?> р.</p>
                                    </div>
                                  </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <p><?=$_GET['description'];?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Section services END -->
    <section class="photos">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                   <h2 class="text-center mb-4">Примеры наших изделий</h2>
                   <section class="image-grid">
                     <div class="container-xxl">
                       <div class="row gy-4">
                         <?php foreach(getImagesByCategories() as $key=>$value):?>
                           <?php if($key === $_GET['name']): ?>
                            <?php foreach($value as $key2=>$value2):?>
                                <div class="col-12 col-sm-6 col-md-4">
                                  <figure>
                                    <a class="d-block" href="">
                                      <img width="1920" height="1280" src="../../assets/img/images/<?=$value2['pic'];?>" class="img-fluid" data-caption="<?=$value2['description'];?>">
                                    </a>
                                  </figure>
                                </div>
                            <?php endforeach; ?>
                           <?php endif; ?>
                        <?php endforeach; ?>
                       </div>
                     </div>
                   </section>

                   <div class="modal lightbox-modal" id="lightbox-modal" tabindex="-1">
                     <div class="modal-dialog modal-fullscreen">
                       <div class="modal-content">
                         <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                         <div class="modal-body">
                           <div class="container-fluid p-0">
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>                   
                </div>
            </div>
        </div>
    </section>

  <!-- Footer START -->
  <?php include 'app/include_views/footer.php'?>
  <!-- Footer END -->
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- main js file -->
   <script src="assets/js/main.js"></script>
</html>
