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
            <?php }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">Edit Basic Details</h4>
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
                        <form class="form form-horizontal" enctype="multipart/form-data" method="post">
                            <div class="form-body">
                                <div class="col-md-12 col-xs-12">
                                   <?php foreach($basic_details as $basic_details){?>
                                    <table id="example" class="table table-striped table-bordered zero-configuration">
                                        <tr>
                                            <td>Site Name</td>
                                            <td><input type="text" name='site_name' class="form-control" value="<?= $basic_details->site_name ?>"> </td>
                                        </tr>
                                        <tr>
                                            <td>Meta Key</td>
                                            <td><textarea name="metakey" class="form-control" ><?= $basic_details->meta_key ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Meta Description</td>
                                            <td><textarea name="metadescription" class="form-control"><?= $basic_details->meta_content ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="text" name='email' class="form-control" value="<?= $basic_details->email ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td><input type="text" name='contact' class="form-control" value="<?= $basic_details->contact ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Corporate Office </td>
                                            <td><textarea name="address" class="form-control"><?= $basic_details->address ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>About Us</td>
                                            <td><textarea name="about_us" class="form-control"><?= $basic_details->about_us ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Logo</td>
                                            <td>
                                                <input type="file" name="image" class="form-control-static">
                                                <input type="hidden" name="old_image" value="<?=  $basic_details->logo ?>">
                                                <img src="<?= base_url(''); ?><?= $basic_details->logo; ?>" height="80px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Favicon</td>
                                            <td>
                                                <input type="file" name="icon" class="form-control-static">
                                                <input type="hidden" name="old_icon" value="<?=  $basic_details->icon ?>">
                                                <img src="<?= base_url(''); ?><?= $basic_details->icon; ?>" height="80px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right"> 
                                                <button type="submit" class="btn btn-outline-primary" formaction="<?= base_url('Admin/Basic_details/update_basic/' . $basic_details->id) ?>">Save changes</button>
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

<script>
    $(document).ready(function () {
        $(".ajax-request1").on("click", function () {
            swal({title: "Ajax request example", text: "Submit to run ajax request", type: "info", showCancelButton: !0, closeOnConfirm: !1, showLoaderOnConfirm: !0}, function () {
                setTimeout(function () {
                    swal("Ajax request finished!")
                }, 2e3)
            })
        })
    });
</script>
