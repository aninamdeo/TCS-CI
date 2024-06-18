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
                    <h4 class="card-title" id="striped-label-layout-basic">Basic Details</h4>
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
                                    <?php foreach($basic_details as $basic_details){?>
                                    <table id="example" class="table table-striped table-bordered">
                                        <tr>
                                            <td>Site Name</td>
                                            <td><?= $basic_details->site_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Meta Key</td>
                                            <td><?= $basic_details->meta_key ?></td>
                                        </tr>
                                        <tr>
                                            <td>Meta Description</td>
                                            <td><?= $basic_details->meta_content ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?= $basic_details->email ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Contact</td>
                                            <td><?= $basic_details->contact ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?= $basic_details->address ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>About Us</td>
                                            <td><?= $basic_details->about_us; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Logo</td>
                                            <td><img src="<?= base_url(''); ?><?= $basic_details->logo; ?>" height="80px"></td>
                                        </tr>
                                         <tr>
                                            <td>Favicon</td>
                                            <td><img src="<?= base_url(''); ?><?= $basic_details->icon; ?>" height="80px"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> 
                                                <button type="submit" formaction="<?= base_url('Admin/Basic_details/edit_basic/' . $basic_details->id) ?>" class="btn btn-icon btn-success mr-1"><i class="icon-android-create" ></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>