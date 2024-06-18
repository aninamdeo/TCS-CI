<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Add Brand</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="label-control" >Country Name :</label>
                                    <select name="country_id" class="form-control" required>
                                        <option value="">Select Country</option>
                                        <?php foreach($countrys as $country){ ?>
                                            <option value="<?= $country->common_ab_country_id ?>"><?= $country->common_ab_country_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="label-control" >State Name :</label>
                                    <input type="text"   name="name" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="label-control" >Ordering :</label>
                                    <input type="text"   name="ordering" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="label-control " >Status :</label>
                                    <br>
                                    <input type="radio" id="Active" name="status" checked value="Enabled">
                                    <label for="Active"> Enabled</label>
                                    <input type="radio"  id="Inactive" name="status" value="Disabled">
                                    <label for="Inactive">Disabled</label>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Setting/State/insert') ?>">
                                        Save
                                    </button>
                                    <button type="button" class="btn btn-warning cus-btn" onclick="reset()">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> View State</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
                    <form class="form form-horizontal">
                        <div class="col-md-2">
                            <label>Search :</label>
                        </div>
                        <div class="col-md-4 no-padding">
                            <input type="text"  value="<?php echo $this->input->get('search') != '' ? urldecode($this->input->get('search')) : ''; ?>" class="form-control"  placeholder="eg. About Us" name="search">
                        </div>
                        <div class="col-md-1 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Ecom/Brand/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Ecom/Brand') ?>">
                                <i class="la la-refresh"></i>
                            </a>
                        </div>
                        <div class="col-md-3 pull-right">
                            <select class="form-control pull-right" style="width:80px;">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                                <option>250</option>
                            </select>
                            <label class="pull-right">Rows :</label>

                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>State Name</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($values as $value) {
                                ?>

                                <tr>
                                    <td><?= $n ?></td>
                                    <td><?= $value->common_ac_state_name ?></td>
                                    <td><span class="badge <?php echo $value->common_ac_state_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->common_ac_state_status ?></span></td>
                                    <td><?= $value->common_ac_state_ordering ?></td>
                                    <td>
                                        <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->common_ac_state_id ?>')">
                                            <i class="la la-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->common_ac_state_id ?>')" href="#">
                                            <i class="la la-close"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $n++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <?= $links ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
        <!--/ Description -->
    </div>
</div>

<script>
    function get_product_sub_category(value){
        $.get("<?= base_url('Auth/Ajax/get_product_sub_category') ?>/" + value, function (data) {
            $('#sub_category').html(data);
        });
    }
    function get_product_sub_category_edit(value){
        $.get("<?= base_url('Auth/Ajax/get_product_sub_category') ?>/" + value, function (data) {
            $('#sub_category_edit').html(data);
        });
    }

    function edit(value) {
        $.get("<?= base_url('Auth/Setting/State/edit') ?>/" + value, function (data) {
            $("#modal-header").html('Edit Menu');
            $("#modal-value").html(data);
            $("#myModal").modal('show');
            restart_scripts();
        });
    }

    function delete_data(value) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this entry!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({url: "<?= base_url('Auth/Setting/State/delete') ?>/" + value, success: function (result) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                location.reload();
                            }});
                    } else {
                        swal("Your Entry is not deleted!");
                    }
                });
    }
</script>