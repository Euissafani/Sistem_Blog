<main class="mdl-layout__content">

<h3 class="text-center" style="color:aliceblue; ">MY POSTS</h3>
<hr>
<div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone col-9" style="margin: 0 auto;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    <a href="<?= base_url('admin/addmypost')?>" class="btn btn-md btn-info">Create New Post</a>
                    </div>
                    <div class="mdl-card__supporting-text ">
                        <table class="mdl-data-table mdl-js-data-table col-12">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">No</th>
                                <th class="mdl-data-table__cell--non-numeric">Title</th>
                                <th class="mdl-data-table__cell--non-numeric">Category</th>
                                <th class="mdl-data-table__cell--non-numeric">Action</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $no = 1; foreach($posts as $p) { ?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?= $no++ ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?= $p['title'] ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?= $p['name_categori'] ?></td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                    <a href="<?= base_url('admin/viewMyPost/' . $p['id'])?>" class="btn btn-sm btn-warning"><span class="material-icons"> visibility</span></a>
                                    <a href="<?= base_url('admin/edit_post/'. $p['id'])?>" class="btn btn-sm btn-info"><span class="material-icons">edit</span></a>
                                    <a href="<?= base_url('admin/delete/' . $p['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apkah anda yakin menghapus data ini ?')"><span class="material-icons"> delete_forever</span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</main>




