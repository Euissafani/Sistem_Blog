
<main class="mdl-layout__content">
        <div class="mdl-grid ui-cards">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
            <h1 class="text-center" style="color:white">All Post</h1> 
            <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="">
          <!-- <input type="hidden" name="category" >
          <input type="hidden" name="author" > -->
        <div class="input-group mb-3">
        <?= form_open('user/search') ?>
          <input type="text" class="form-control" placeholder="Search.." name="keyword">
          <button class="btn btn-primary" type="submit">Search</button>
        <?= form_close() ?>
        </div>
      </form>
    </div>
  </div> 
</div>


<!-- Card 1 -->

<div class="card col-lg-8" style="margin: 0 auto; background-color:#595959;">

  <img src="https://source.unsplash.com/1200x400?computer" style="widt" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"> <?= $post->title ?> </h5>
    <p style="line-height: 10px ;" >
                <small class="text-muted">
                  Post By. <a href="#" class="text-decoration-none" style="color:white; font-size:15px; !important"><?=$post->name?></a> 
                </small>
                <small class="text-muted">
                  Category. <a href="#" class="text-decoration-none" style="color:white; font-size:15px; !important"><?= $post->name_categori ?></a> 
                </small>
              </p>
    <p class="card-text"> <?= $post->excerpt ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


<!-- Card 2 -->
<div class="container mt-5 " >
    <div class="row" >
    <?php foreach($posts as $post) {?>
        <div class="col-md-4 mb-3">
          <div class="card " style="background-color:#595959;">
            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="#" 
            class="text-white text-decoration-none"></a></div>
            <img src="https://source.unsplash.com/500x400?<?=$post['name_categori']?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title"><?= $post['title'] ?></h5>
              <p style="line-height: 10px ;" >
                <small class="text-muted">
                  Post By. <a href="#" class="text-decoration-none" style="color:white; font-size:15px; !important"><?=$post['name']?></a> 
                </small>
                <small class="text-muted">
                  Category. <a href="#" class="text-decoration-none" style="color:white; font-size:15px; !important"><?= $post['name_categori']  ?></a> 
                </small>
              </p>
              <p class="card-text"> <?= $post['excerpt'] ?></p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>
        <?php } ?>
    </div>
  </div>
  
  
</main>
 



