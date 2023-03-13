<main class="mdl-layout__content">

<h3 class="text-center" style="color:aliceblue; ">Categories</h3>
<hr>
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone col-9" style="margin: 0 auto;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    <a href="#" class="btn btn-md btn-info" data-toggle="modal" data-target="#addcategoryModal">Create Category</a>
                    </div>
                    <div class="mdl-card__supporting-text ">
                        <table class="mdl-data-table mdl-js-data-table col-12">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">No</th>
                                <th class="mdl-data-table__cell--non-numeric">Nama Category</th>
                                <th class="mdl-data-table__cell--non-numeric">Action</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $no = 1; foreach($category as $c) { ?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?= $no++ ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?= $c['name_categori'] ?></td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                    <!-- <a href="" class="btn btn-sm btn-warning"><span class="material-icons"> visibility</span></a> -->
                                    <a href="" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#edit<?= $c['id'] ?>"><span class="material-icons">edit</span></a>
                                    <a href="<?= base_url('admin/delete_category/' . $c['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apkah anda yakin menghapus data ini ?')"><span class="material-icons"> delete_forever</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</main>



<!-- Modal Add-->
<div class="modal fade" id="addcategoryModal" tabindex="-1" aria-labelledby="addcategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="background-color:#595959;">
      <div class="modal-header">
        <h5 class="modal-title" id="addcategoryModalLabel" style="color:white;">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form form--basic" action="<?= base_url('admin/addcategory') ?>" method="post">
      <div class="form-group">
        <label for="name_categori" style="color:white;">Nama Category</label>
            <input type="text" class="form-control" id="name_categori" name="name_categori" >
            <?= form_error('name_categori','  <small class="text-danger pl-3">',' </small>');?> 
       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<?php $no=0; foreach($category as $c ) : $no++;?>
<div class="modal fade" id="edit<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="background-color:#595959;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form form--basic" action="<?= base_url('admin/edit_category/' . $c['id']) ?>" method="post">
      <input type="hidden" name="id" value="<?= $c['id'] ?>">
      <div class="form-group">
        <label for="name_categori" style="color:white;">Nama Category</label>
            <input type="text" class="form-control" id="name_categori" name="name_categori" value="<?= $c['name_categori'] ?>">
            <?= form_error('name_categori','  <small class="text-danger pl-3">',' </small>');?> 
       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
