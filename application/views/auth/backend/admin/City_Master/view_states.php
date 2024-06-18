<div class="content-detached content-right">
    <div class="content-body">
       
       <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> View All States</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
                    <!-- <form class="form form-horizontal" method="get"> -->
                        <!-- <div class="col-md-1">
                            <label>Search:</label>
                        </div> -->
                       <!--  <div class="col-md-4 no-padding">
                            <input type="text" id="projectinput1" value="<?php echo $this->input->get('city') != '' ? urldecode($this->input->get('city')) : ''; ?>" class="form-control"  placeholder="eg. bhopal" name="city">
                        </div>
                        <div class="col-md-1 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Backend/City_Master/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Backend/City_Master') ?>">
                                <i class="la la-refresh"></i>
                            </a>
                        </div> -->

                 <!--    <div class="col-md-2 pull-right">
                        <label>Rows :</label>
                        <select class="form-control" style="width:80px;float:right;">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                            <option>250</option>
                        </select>
                    </div> -->

                    <!-- <div class="clearfix"></div> -->
                <!-- </form> -->
            </div>
            <div class="col-md-12">
                <table id="getcity" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>State Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($select_state_data as $value) {?>

                         <tr>
                            <td><?= $n++ ?></td>
                            <td><?= $value->name ?></td>
                            <td><span class="badge <?php echo $value->status == 'Active' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->status ?></span>
                          </td>
                            <td>
                                <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->id ?>')">
                                    <i class="la la-pencil"></i>
                                </a>
                             </td>
                                </tr>
                            <?php } ?>
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
        $.get("<?= base_url('Auth/Backend/City_Master/edit_state') ?>/" + value, function (data) {
            $("#modal-header").html('Edit City');
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
                $.ajax({url: "<?= base_url('Auth/Backend/City_Master/delete') ?>/" + value, success: function (result) {
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