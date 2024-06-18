<section id="striped-label-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($msg)) { ?>
            <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            <?= $msg ?>
            </div>
            <?php } ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">View Social Link</h4>
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
                        <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="col-md-12 col-xs-12">
                                    <table id="example" class="table table-striped table-bordered">
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Social Link Name</th>
                                            <th>Links</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $i = 1; foreach($link_data as $data){?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $data->name; ?></td>
                                            <td><?= $data->link; ?></td>
                                            <td><a href="<?= base_url(); ?>Admin/Basic_details/edit_social/<?= $data->id; ?>" class="btn btn-success"><i class="icon-android-create"></i></a></td>
                                        </tr>
                                        <?php } ?>                                        
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>