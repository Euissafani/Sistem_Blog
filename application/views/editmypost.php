
<main class="mdl-layout__content">
    <div class="col-lg-9 mt-5 mb-5" style="margin:auto;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">EDIT POST</h5>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <form class="form form--basic" action="<?= base_url('admin/edit_post/'. $edit['id']) ?>" method="post">
                        <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id']?>">
                             <div class="form-group">
                               <label for="title">Title</label>
                                 <input type="title" class="form-control" id="title" name="title" value="<?= $edit['title'] ?>">
                               </div>
                               <div class="form-group">
                                 <label for="slug">Slug</label>
                                 <input type="slug" class="form-control" id="slug" name="slug" value="<?= $edit['slug'] ?>">
                               </div>
                               <div class="form-group">
                               <label for="slug">Category</label>
                                   <select name="category_id" id="category_id" class="form-control" required>
                                       <option value="">Select Menu</option>
                                       <?php foreach($name_categori as $nc): ?>
                                           <option value="<?= $nc['id']?>"  <?= $nc['id'] == $edit['category_id']  ? 'selected' : '' ?>>
                                           <?= $nc['name_categori']?>
                                          </option>
                                       <?php endforeach ?>
                                   </select>

                               </div>
                               <div class="form-group mt-3">
                                 <label for="excerpt" >Excerpt</label>
                                 <textarea class="form-control" id="body" rows="3" name="excerpt"><?= $edit['excerpt'] ?></textarea>
                               </div>
                               <div class="form-group mt-3">
                                 <label for="body">Body</label>
                                 <textarea class="form-control" id="body" rows="3" name="body"><?= $edit['body'] ?></textarea>
                               </div>
                               <button type="submit" class="btn btn-primary">Edit Post</button>
                        </form>
                    </div>
                </div>
            </div>
        < t5-/div>
</main>