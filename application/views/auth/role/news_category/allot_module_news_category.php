<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
               <a href="<?= base_url('Auth/Role/News_Category')?>" class="btn btn-sm btn-warning pull-right">BACK</a>
                <h4 class="card-title"><i class="ft-user"></i> Allot News Category to <?= $user->role_ab_user_username?> </h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
      <!--               <form class="form form-horizontal">
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
                    </form> -->
                </div>
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post">
                        <div class="tab-content tab-content-white">
                                <div id="cat1" class="tab-pane fade in active show">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Module Name</th>
                                                <th> <input type="checkbox" id="chk1" onclick="check_all('chk1')"> Check All
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n = 1;
                                            foreach ($categorys as $value) {
                                                $assign = $this->Query->select('*', 'role_bd_news_category', ['news_category_id' => $value->id,'role_ab_user_id' => $user_id], 'row');
                                                ?>
                                                <tr>
                                                    <td><?= $n ?></td>
                                                    <td><?= $value->cat_name_hindi ?></td>
                                                    <td>
                                                        <input type="checkbox" name="cat_id[]" <?= ($assign) ? 'checked' : ''?> value="<?= $value->id ?>"  class="chk1">
                                                    </td>
                                                </tr>
                                                <?php $n++;   }     ?>
                                        </tbody>
                                    </table>
                                </div>
                               
                        </div>

                        <button type="submit" class="btn btn-primary cus-btn3 pull-right" formaction="<?= base_url('Auth/Role/News_Category/insert/' .$user_id) ?>">
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