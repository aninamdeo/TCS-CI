<section id="striped-label-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">Edit Social Link</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-horizontal striped-labels form-bordered" enctype="multipart/form-data" method="post">
                            <div class="form-body">
                                <?php foreach($link_data as $data) {?>
                                <table class = 'table table-bordered'>
                                    <tr>
                                        <th>Social Name</th>
                                        <td>
                                            <input type="text" name="name" value="<?= $data->name; ?>" class="form-control" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Link</th>
                                        <td>
                                            <input type="text" name="link" value="<?= $data->link; ?>" class="form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php } ?>
                            <div class="modal-footer">
		                        <button type="submit" class="btn btn-outline-primary" formaction="<?= base_url('Admin/Basic/update_social/'.$data->id);?>">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>                