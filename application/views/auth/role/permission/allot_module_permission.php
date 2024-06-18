<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Allot Role Permissions</h4>
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
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Website/Menu/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Website/Menu') ?>">
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
                    <form class="form form-horizontal" method="post">
                        <ul class="nav nav-tabs nav-tabs-white">
                            <?php
                            $j = 1;
                            foreach ($categorys as $category) {
                                ?>
                                <li ><a data-toggle="tab" href="#cat<?= $category->role_ba_category_id ?>" class="<?php echo $j == 1 ? 'active' : ''; ?>"><?= $category->role_ba_category_name ?></a></li>
                                <?php
                                $j++;
                            }
                            ?>
                        </ul>

                        <div class="tab-content tab-content-white">
                            <?php
                            $j = 1;
                            foreach ($categorys as $category) {
                                $values = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type' => 'sub_category', 'role_ba_category_main_id' => $category->role_ba_category_id], 'result', ['role_ba_category_ordering' => 'asc']);
                                ?>
                                <div id="cat<?= $category->role_ba_category_id ?>" class="tab-pane fade in <?php echo $j == 1 ? 'active show' : ''; ?>">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Sub-Category</th>
                                                <th>Module Name</th>
                                                <th>View</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n = 1;
                                            foreach ($values as $value) {
                                                $modules = $this->Query->select('*', 'role_bb_module', ['role_ba_category_id' => $value->role_ba_category_id], 'result');
                                                ?>
                                                <tr>
                                                    <td><?= $n ?> <input type="checkbox" id="chk<?= $value->role_ba_category_id ?>" onclick="check_all('chk<?= $value->role_ba_category_id ?>')"></td>
                                                    <td><?= $value->role_ba_category_name ?>
                                                    </td>
                                                    <th>Module Name</th>
                                                    <th>View</th>
                                                    <th>Add</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                                <?php
                                                $i = 1;
                                                foreach ($modules as $module) {
                                                    $permission = $this->Query->select('*', 'role_bc_permission', ['role_bb_module_id' => $module->role_bb_module_id, 'role_aa_usertype_id' => $usertype_id], 'row');
                                                    if (count($permission) > 0) {
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-right"><?= $n ?>.<?= $i++ ?></td>
                                                            <td><?= $module->role_bb_module_name ?></td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_view_permit == 1) { ?>
                                                                    <input type="checkbox" name="view<?= $module->role_bb_module_id ?>" value="1" <?php echo $permission->role_bc_permission_view == '1' ? 'checked' : ''; ?>  class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_add_permit == 1) { ?>
                                                                    <input type="checkbox" name="add<?= $module->role_bb_module_id ?>"  value="1" <?php echo $permission->role_bc_permission_add == '1' ? 'checked' : ''; ?> class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_edit_permit == 1) { ?>
                                                                    <input type="checkbox" name="edit<?= $module->role_bb_module_id ?>"  value="1" <?php echo $permission->role_bc_permission_edit == '1' ? 'checked' : ''; ?> class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_delete_permit == 1) { ?>
                                                                    <input type="checkbox" name="delete<?= $module->role_bb_module_id ?>"  value="1" <?php echo $permission->role_bc_permission_delete == '1' ? 'checked' : ''; ?> class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-right"><?= $n ?>.<?= $i++ ?></td>
                                                            <td><?= $module->role_bb_module_name ?></td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_view_permit == 1) { ?>
                                                                    <input type="checkbox" name="view<?= $module->role_bb_module_id ?>" value="1" class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_add_permit == 1) { ?>
                                                                    <input type="checkbox" name="add<?= $module->role_bb_module_id ?>"  value="1" class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_edit_permit == 1) { ?>
                                                                    <input type="checkbox" name="edit<?= $module->role_bb_module_id ?>"  value="1" class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($module->role_bb_module_delete_permit == 1) { ?>
                                                                    <input type="checkbox" name="delete<?= $module->role_bb_module_id ?>"  value="1" class="chk<?= $value->role_ba_category_id ?>">
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                $n++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                $j++;
                            }
                            ?>
                        </div>

                        <button type="submit" class="btn btn-primary cus-btn3 pull-right" formaction="<?= base_url('Auth/Role/Permission/insert/' . $usertype_id) ?>">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <!--/ Description -->
    </div>
</div>

<script>
    function check_all(value) {
        var checker = $("#" + value);
        if (checker.prop("checked") == true) {
            // Iterate each checkbox
            $('.' + value).each(function () {
                this.checked = true;
            });
        } else {
            $('.' + value).each(function () {
                this.checked = false;
            });
        }
    }
    function edit(value) {
        $.get("<?= base_url('Auth/Role/Usertype/edit') ?>/" + value, function (data) {
            $("#modal-header").html('Edit Role');
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
                        $.ajax({url: "<?= base_url('Auth/Role/Usertype/delete') ?>/" + value, success: function (result) {
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