<main class="mdl-layout__content">

<div class="col-lg-10 mt-3 mb-5" style="margin:auto;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text"><?= $detail->title ?></h2>
                    </div>
                    <div class="mdl-card__supporting-text mdl-card--expand">
                        <small>Created by : <?= $d->name ?></small><br>
                        <small>Category : <?= $d->name_categori ?></small><br>

                        <img src="https://source.unsplash.com/1200x400?<?= $d->name_categori ?>" class="card-img-top" alt="...">
                       
                       <p class="mt-3">
                       <?= $detail->body ?>
                       </p>
                        <br><br>
                    
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                    <a href="<?= base_url('admin/mypost') ?>" class="btn btn-sm btn-success">Back to all my posts</a>
                    <a href="" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= base_url('admin/delete/' . $detail->id)?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
</div>
</main>
