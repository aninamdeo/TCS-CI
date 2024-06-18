<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Add Module Category</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="label-control" >Category Name :</label>
                                    <input type="text"   name="category_name" class="form-control" placeholder="eg. About Us" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="label-control " >Ordering :</label>
                                    <input type="number" name="ordering" class="form-control" placeholder="" required>
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
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Module_Category/insert') ?>">
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
                <h4 class="card-title"><i class="ft-user"></i> View Category</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
                    <form class="form form-horizontal">
                        <div class="col-md-1">
                            <label>Search :</label>
                        </div>
                        <div class="col-md-4 no-padding">
                            <input type="text"  value="<?php echo $this->input->get('search') != '' ? urldecode($this->input->get('search')) : ''; ?>" class="form-control"  placeholder="eg. About Us" name="search">
                        </div>
                        <div class="col-md-1 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Role/Module_Category/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Role/Module_Category') ?>">
                                <i class="la la-refresh"></i>
                            </a>
                        </div>
                        <div class="col-md-2 pull-right">
                            <label>Rows :</label>
                            <select class="form-control" style="width:80px;float:right;">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                                <option>250</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Category Name</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Category Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($values as $value) {
                                ?>
                                <?php
                                $qry = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type'=>'sub_category','role_ba_category.role_ba_category_main_id' => $value->role_ba_category_id],'result',['role_ba_category_ordering'=>'asc']);
                                if (count($qry) > 0) {
                                    ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $value->role_ba_category_name ?></td>
                                        <td>-</td>

                                        <td><span class="badge <?php echo $value->role_ba_category_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->role_ba_category_status ?></span></td>
                                        <td><?= $value->role_ba_category_ordering ?></td>
                                        <td>
                                            <a class="btn btn-success cus-btn2"  onclick="create_submenu('<?= $value->role_ba_category_id ?>')">
                                                <i class="la la-plus"></i> Sub-Category
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-info cus-btn2"  onclick="edit('<?= $value->role_ba_category_id ?>')">
                                                <i class="la la-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->role_ba_category_id ?>')" >
                                                <i class="la la-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php foreach ($qry as $qrys) { ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><?= $qrys->role_ba_category_name ?></td>

                                            <td><span class="badge <?php echo $qrys->role_ba_category_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $qrys->role_ba_category_status ?></span></td>
                                            <td><?= $value->role_ba_category_ordering ?>.<?= $qrys->role_ba_category_ordering ?></td>
                                            <td> -</td>
                                            <td>
                                                <a class="btn btn-info cus-btn2"  onclick="edit('<?= $qrys->role_ba_category_id ?>')">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $qrys->role_ba_category_id ?>')" >
                                                    <i class="la la-close"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $value->role_ba_category_name ?></td>
                                        <td>-</td>
                                        <td><span class="badge <?php echo $value->role_ba_category_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->role_ba_category_status ?></span></td>
                                        <td><?= $value->role_ba_category_ordering ?></td>
                                        <td>
                                            <a class="btn btn-success cus-btn2"  onclick="create_submenu('<?= $value->role_ba_category_id ?>')">
                                                <i class="la la-plus"></i> Sub-Category
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-info cus-btn2"  onclick="edit('<?= $value->role_ba_category_id ?>')">
                                                <i class="la la-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->role_ba_category_id ?>')" >
                                                <i class="la la-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
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
    function create_submenu(value) {
        $.get("<?= base_url('Auth/Role/Module_Category/create_module_sub_category') ?>/" + value, function (data) {
            $("#modal-header").html('Add Module Sub-Category');
            $("#modal-value").html(data);
            $("#myModal").modal('show');
            restart_scripts();
        });

    }

    function edit(value) {
        $.get("<?= base_url('Auth/Role/Module_Category/edit') ?>/" + value, function (data) {
            $("#modal-header").html('Edit Module Category');
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
                        $.ajax({url: "<?= base_url('Auth/Role/Module_Category/delete') ?>/" + value, success: function (result) {
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