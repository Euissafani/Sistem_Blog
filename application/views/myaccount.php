<main class="mdl-layout__content">
<div class="col-lg-5 mt-3 mb-5" style="margin:auto;">
                <div class="mdl-card mdl-shadow--2dp">
                <?= $this->session->flashdata('message'); ?>
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">MY ACCOUNT</h2>
                    </div>
                    <div class="mdl-card__supporting-text mdl-card--expand">

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5">
                              <img src="<?=  base_url('assets/profile/'). $user['image']?>" style="widtH:150px;" class="card-img-top" alt="...">
                        </div>
                        <div class="col-6">
                            <h6 class="card-title"> Nama : <?= $user['name']?></h6>
                            <h6 class="card-text">Email : <?= $user['email']?></h6>
                        </div>
                    </div>
                    
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                    <a href="<?= base_url('user')?>" class="btn btn-sm btn-success">Back to all my posts</a>
                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?=$user['id'] ?>">Edit</a>
                    </div>
                </div>
</div>
</main>


<!-- Modal -->
<div class="modal fade" id="edit<?=$user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color:#595959;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit My Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <?= form_open_multipart('user/editProfile');?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                        <?= form_error('name','<small class="text-danger pl-3">',' </small>')?> 
                        </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-sm-2">Picture</div>
                       <div class="col-sm-10">
                         <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/profile/') . $user['image'] ?>" class="img-thumbanail" width="100">
                            </div>
                            <div class="col-sm-9">
                            <div class="custom-file">
                               <input type="file" class="custom-file-input" id="image" name="image">
                               <label class="custom-file-label" for="image">Choose file</label>
                             </div>
                            </div>
                         </div>
                       </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                    </form>
      </div>
    </div>
  </div>
</div>