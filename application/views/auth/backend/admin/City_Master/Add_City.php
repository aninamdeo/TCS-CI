<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i>Add District</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="label-control" for="projectinput1">State :</label>
                                    <select class="form-control" name="state" id="state" onchange="get_cities(this.value)">
                                        <!-- <option value="">Select State</option> -->
                                        <?php
                                      
                                        foreach ($states as $state_name) {?>
                                       <option <?= ($state_name->id == 21) ? "selected": ""?> value="<?= $state_name->id ?>"> <?= $state_name->name ?></option>
                                       <?php   }  ?>
                                    </select>
                                </div>
                                 <div class="col-md-6 multiselect" >
                                    <label class="label-control">District : </label>
                                        <div class="selectBox" onclick="showCheckboxes()" >
                                          <select class="form-control">
                                            <option value="">Select District</option>
                                          </select>
                                          <div class="overSelect"></div>
                                        </div>
                                    <div id="checkboxes" style="height: 200px;overflow :scroll;">
                                       <label class="form-control" id="city">
                                        <?php
                                          $district[] = NULL;
                                          $selected_district = array();
                                          foreach ($select_city_data as $city1) {
                                                 $district[] = $city1->old_city_id;
                                          } 
                                          foreach ($city_data as $city) {?>
                                            <input type="checkbox" <?php if(in_array($city->id,$district)){echo 'checked';}?>   name="city[]" value="<?= $city->id ?>"/> <?= $city->name ?><br>
                                         <?php } ?>
                                          </label> 
                                    </div>
                              </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/City_Master/insert_city') ?>">
                                        Save
                                    </button>
                                    <!-- <button type="button" class="btn btn-warning cus-btn" onclick="reset()">
                                        Clear
                                    </button> -->
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

       <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> View All District</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
                    <form class="form form-horizontal" method="get">
                        <div class="col-md-1">
                            <label>Search:</label>
                        </div>
                      <!--   <div class="col-md-2 no-padding">
                            <select class="form-control" name="state_id" onchange="get_city(this.value)">
                                <option value="">Select State</option>
                                <?php
                                  foreach ($states as $state) {
                                    echo '<option value="' . $state->sid . '">' . $state->name . '</option>';
                                }
                                ?>
                            </select>
                        </div> -->
                        <div class="col-md-4 no-padding">
                            <input type="text" id="projectinput1" value="<?php echo $this->input->get('city') != '' ? urldecode($this->input->get('city')) : ''; ?>" class="form-control"  placeholder="eg. bhopal" name="city">
                        </div>
                        <div class="col-md-1 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Backend/City_Master/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Backend/City_Master') ?>">
                                <i class="la la-refresh"></i>
                            </a>
                        </div>

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

                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="col-md-12">
                <table id="getcity" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>State Name</th>
                            <th>City Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($select_city_data as $value) {?>

                         <tr>
                            <td><?= $n++ ?></td>
                            <td><?= $value->name ?></td>
                            <td><?=  $value->city ?></td>
                            <td><span class="badge <?php echo $value->status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->status ?></span>
                          </td>
                            <td>
                                <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->c_id ?>')">
                                    <i class="la la-pencil"></i>
                                </a>
                                <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->c_id ?>')" >
                                    <i class="la la-close"></i>
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
    function get_cities(state_id){
              $.get("<?= base_url('Auth/Backend/City_Master/select_city_data/') ?>"+state_id, function(data)
              {
                $('#city').html(data);
            });

          }
</script>


<script>
  

    function edit(value) {
        $.get("<?= base_url('Auth/Backend/City_Master/edit') ?>/" + value, function (data) {
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