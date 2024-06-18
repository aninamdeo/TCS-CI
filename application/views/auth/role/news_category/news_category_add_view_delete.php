<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Add-View User Category Assign</h4>
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
                                <th>User</th>
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
                                    <td><?= $value->role_ab_user_username ?></td>
                                    <td><span class="badge <?php echo $value->role_ab_user_status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->role_ab_user_status ?></span></td>
                                    <td>
                                            <a class="btn btn-info cus-btn2" href="<?= base_url('Auth/Role/News_Category/allot_module_news_category/'.$value->role_ab_user_id) ?>" >
                                                <i class="la la-pencil"></i> Assign
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