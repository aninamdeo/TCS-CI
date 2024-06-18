<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Add Role</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="label-control" >Role :</label>
                                    <input type="text" name="usertype_name" class="form-control" required>
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
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Usertype/insert') ?>">
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
                <h4 class="card-title"><i class="ft-user"></i> View Role</h4>
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
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Role</th>
                                <th>Status</th>
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
                                    <td><?= $value->role_aa_usertype_name ?></td>
                                    <td><span class="badge <?php echo $value->role_aa_usertype_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->role_aa_usertype_status ?></span></td>
                                    <td>
                                        <?php
                                        if ($value->role_aa_usertype_permission == 'Edit') {
                                            ?>
                                            <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->role_aa_usertype_id ?>')">
                                                <i class="la la-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->role_aa_usertype_id ?>')" href="#">
                                                <i class="la la-close"></i>
                                            </a>
                                        <?php } ?>
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
        function edit(value) {
            $.get("<?= base_url('Auth/Role/Usertype/edit') ?>/" + value, function (data) {
                $("#modal-header").html('Edit Role');
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
    }
</script>