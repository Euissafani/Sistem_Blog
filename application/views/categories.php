<main class="mdl-layout__content">
    <div class="mdl-grid ui-cards">
      <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
        <h1 class="text-center" style="color:white"><?= $title; ?></h1> 
        <div class="container">
          <div class="row">
          <?php  foreach($categories as $category) { ?>
               <div class="col-md-4 mt-3">
                 <a href="<?= base_url('user/post')?>">
                  <div class="card bg-dark text-white">
                    <img src="https://source.unsplash.com/500x500?<?= $category['name_categori'] ?>" class="card-img" alt="<?= $category['name_categori'] ?>">
                     <div class="card-img-overlay d-flex align-items-center p-0">
                     <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)"><?= $category['name_categori'] ?></h5>
                  </div>
                 </div>
                </a>
             </div>
           <?php } ?>
        </div>
       </div>
    </div>
    </div>
</main>