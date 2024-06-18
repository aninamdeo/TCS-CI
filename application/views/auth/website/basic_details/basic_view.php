<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Basic Details</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" >
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="label-control" >Logo : <img src="<?= base_url($values->logo) ?>" style="width:100px;"/></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >Other Logo : <img src="<?= base_url($values->logo_other) ?>" style="width:100px;background: #eee;"/></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >FavIcon : <img src="<?= base_url($values->icon) ?>" style="width:100px;"/></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >Site Name : <b><?= $values->site_name ?></b></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >Email : <b><?= $values->email ?></b></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >Email2 : <b><?= $values->email2 ?></b></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >Contact : <b><?= $values->contact ?></b></label>
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" >Contact2 : <b><?= $values->contact2 ?></b></label>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" >Address : <b><?= $values->address ?></b></label>
                                </div>

                                <div class="col-md-12">
                                    <label class="label-control" >Meta Keys : <b><?= $values->meta_key ?></b></label>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" >Meta Description : <b><?= $values->meta_content ?></b></label>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" >About Us : <b><?= $values->about_us ?></b></label>
                                </div> 
                                <div class="col-md-12">
                                    <label class="label-control" >Live Tv link : <b><?= $values->live_tv ?></b></label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary cus-btn" onclick="edit()">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
    <!--/ Description -->
</div>

<script>

    function edit() {
        $.get("<?= base_url('Auth/Website/Basic_Details/edit') ?>/", function (data) {
            $("#modal-header").html('Edit Basic Details');
            $("#modal-value").html(data);
            $("#myModal").modal('show');
            restart_scripts();
        });
    }

</script>