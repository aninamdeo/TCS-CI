<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> View Module</h4>
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
                                <th>Module</th>
                                <th>View</th>
                                <th>Add</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($values as $value) {
                                ?>
                                <?php
                                $qry = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type' => 'sub_category', 'role_ba_category.role_ba_category_main_id' => $value->role_ba_category_id], 'result', ['role_ba_category_ordering' => 'asc']);
                                if (count($qry) > 0) {
                                    ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $value->role_ba_category_name ?></td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <?php
                                    foreach ($qry as $qrys) {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><?= $qrys->role_ba_category_name ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-success cus-btn2"  onclick="create_submenu('<?= $qrys->role_ba_category_id ?>')">
                                                    <i class="la la-plus"></i> Module
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $modules = $this->Query->select('*', 'role_bb_module', ['role_ba_category_id' => $qrys->role_ba_category_id]);
                                        if (count($modules) > 0) {
                                            foreach ($modules as $module) {
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $module->role_bb_module_id ?></td>
                                                    <td><?= $module->role_bb_module_name ?></td>
                                                    <td>
                                                        <span class="badge <?php echo $module->role_bb_module_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $module->role_bb_module_status ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo $module->role_bb_module_view_permit == '1' ? 'badge-info' : 'badge-danger'; ?>">
                                                            <i class="la la-<?php echo $module->role_bb_module_view_permit == '1' ? 'check' : 'times'; ?>"></i>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo $module->role_bb_module_add_permit == '1' ? 'badge-info' : 'badge-danger'; ?>">
                                                            <i class="la la-<?php echo $module->role_bb_module_add_permit == '1' ? 'check' : 'times'; ?>"></i>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo $module->role_bb_module_edit_permit == '1' ? 'badge-info' : 'badge-danger'; ?>">
                                                            <i class="la la-<?php echo $module->role_bb_module_edit_permit == '1' ? 'check' : 'times'; ?>"></i>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo $module->role_bb_module_delete_permit == '1' ? 'badge-info' : 'badge-danger'; ?>">
                                                            <i class="la la-<?php echo $module->role_bb_module_delete_permit == '1' ? 'check' : 'times'; ?>"></i>
                                                        </span>
                                                    </td>


                                                    <td>
                                                        <a class="btn btn-info cus-btn2"  onclick="edit('<?= $module->role_bb_module_id ?>')">
                                                            <i class="la la-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $module->role_bb_module_id ?>')" >
                                                            <i class="la la-close"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        }
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $value->role_ba_category_name ?></td>
                                        <td>-</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
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
        $.get("<?= base_url('Auth/Role/Module/create_module') ?>/" + value, function (data) {
            $("#modal-header").html('Add Module');
            $("#modal-value").html(data);
            $("#myModal").modal('show');
            restart_scripts();
        });
        return false;
    }

    function edit(value) {
        $.get("<?= base_url('Auth/Role/Module/edit') ?>/" + value, function (data) {
            $("#modal-header").html('Edit Module Category');
            $("#modal-value").html(data);
            $("#myModal").modal('show');
            restart_scripts();
        });
        return false;
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
                        $.ajax({url: "<?= base_url('Auth/Role/Module/delete') ?>/" + value, success: function (result) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                location.reload();
                            }});
                    } else {
                        swal("Your Entry is not deleted!");
                    }
                });
        return false;
    }
</script>