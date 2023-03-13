
<main class="mdl-layout__content">
        <div class="mdl-grid ui-cards">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
            <h1 class="text-center" style="color:white">All Post</h1> 
            <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="">
          <input type="hidden" name="category" >
          <input type="hidden" name="author" >
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="search">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div> 
</div>


<div class="card col-lg-8" style="margin: 0 auto; background-color:#595959;">
  <img src="https://source.unsplash.com/1200x400?computer" style="widt;" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Judul utama</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="container mt-5 " >
    <div class="row" >
        <div class="col-md-4 mb-3">
          <div class="card " style="background-color:#595959;">
            <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="#" 
            class="text-white text-decoration-none"></a></div>
            <img src="https://source.unsplash.com/500x400?computer" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">Apa aja</h5>
              <p>
                <small class="text-muted">
                  By. <a href="#" class="text-decoration-none">Safana</a> wepu
                </small>
              </p>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam voluptatum nisi architecto harum exercitationem dolore iure minima excepturi quia sint, suscipit repellat nulla laudantium qui, asperiores blanditiis ipsum ab? Asperiores?</p>
              <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>
    </div>
  </div>
         
</main>
 



