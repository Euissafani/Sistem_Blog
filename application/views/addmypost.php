
<main class="mdl-layout__content">
    <div class="col-lg-9 mt-5 mb-5" style="margin:auto;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">ADD NEW POST</h5>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <form class="form form--basic" action="<?= base_url('admin/addmypost') ?>" method="post">
                             <div class="form-group">
                               <label for="title">Title</label>
                                 <input type="text" class="form-control" id="title" name="title" >
                                 <?= form_error('title','  <small class="text-danger pl-3">',' </small>');?> 
                               </div>
                             <div class="form-group">
                               <!-- <label for="user_id">Penulis</label> -->
                               <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id']?>">
                              </div>
                               <div class="form-group">
                                 <label for="slug">Slug</label>
                                 <input type="slug" class="form-control" id="slug" name="slug">
                                 <?= form_error('slug','  <small class="text-danger pl-3">',' </small>');?> 
                               </div>
                               <div class="form-group">
                               <label for="category_id">Category</label>
                                   <select name="category_id" id="category_id" class="form-control">
                                       <option value="">Select Menu</option>
                                       <?php foreach($name_categori as $nc): ?>
                                           <option value="<?= $nc['id']?>"> <?= $nc['name_categori']?> </option>
                                       <?php endforeach ?>
                                   </select>
                               </div>

                               <div class="form-group mt-3">
                                 <label for="excerpt">Excerpt</label>
                                 <textarea class="form-control" id="body" rows="3" name="excerpt"></textarea>
                                 <?= form_error('excerpt','  <small class="text-danger pl-3">',' </small>');?> 
                               </div>
                               <div class="form-group mt-3">
                                 <label for="body">Body</label>
                                 <textarea class="form-control" id="body" rows="3" name="body"></textarea>
                                 <?= form_error('excerpt','  <small class="text-danger pl-3">',' </small>');?> 
                               </div>
                               <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>