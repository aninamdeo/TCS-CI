<div class="content-detached content-right">
    <div class="content-body">
        
        <section id="descriptioin" class="card">
            <div class="card-header">
                <a href="<?= base_url('Auth/Backend/Category/')?>" class="btn btn-warning btn-sm pull-right">BACK</a>
                <h4 class="card-title"><i class="ft-user"></i> View Sub Category</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
                   <!--  <form class="form form-horizontal" method="get">
                        <div class="col-md-1">
                            <label>Filter by :</label>
                        </div>
                        <div class="col-md-2 no-padding">
                            <select class="form-control" name="state_id" id="state_id" onchange="get_filter1(this.value)">
                                <option value="0">Select State</option>
                                <?php
                                foreach ($states as $state) {
                                    foreach($selected as $value) {
                                        if ($value->site_am_id==$state->site_am_id) {
                                            echo '<option value="' . $state->site_am_id . '">' . $state->site_am_name . '</option>';
                                        }
                                    
                                } }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 no-padding">
                            <select class="form-control" id="city_id" name="city_id" onchange="get_filter2(this.value)">
                                <option value="0">Select City</option>
                             <?php
                             foreach ($cities as $city) {
                                foreach ($selected2 as $value) {
                                    if ($value->site_an_id==$city->site_an_id) {
                                        echo '<option value="' . $city->site_an_id . '">' . $city->site_an_name . '</option>';
                                    }
                                }
                                
                            }
                            ?>
                        </select>
                    </div>
                        <div class="col-md-4 no-padding">
                            <input type="text" id="projectinput1" value="<?php echo $this->input->get('area') != '' ? urldecode($this->input->get('area')) : ''; ?>" class="form-control"  placeholder="eg. M.P. Nagar" name="area">
                        </div>
                        <div class="col-md-1 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Backend/Category/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Backend/Category') ?>">
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
                </form> -->
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped" id="getfilter">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                             <th>Ordering</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($sub_category as $value) {?>

                         <tr>
                            <td><?= $n++ ?></td>
                            <td><?= $value->sub_category_name ?></td>
                            <?php $category_name=$this->Query->select('*','category',['id'=>$value->cat_id],'row'); ?>
                            <td><?= $category_name->cat_name ?></td>
                            <td><?= $value->sub_ordering ?></td>
                            
                            <td><span class="badge <?php echo $value->status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->status ?></span></td>
                            <td>
                                <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->sub_category_id ?>')">
                                    <i class="la la-pencil"></i>
                                </a>

                                <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->sub_category_id ?>')" href="#">
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
    

    function edit(value) {
        // alert(value);
        $.get("<?= base_url('Auth/Backend/Sub_Category/edit_sub_category/') ?>" + value, function (data) {
            $("#modal-header").html('Edit Sub Category');
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
                $.ajax({url: "<?= base_url('Auth/Backend/Sub_Category/delete_Sub_Category/') ?>" + value, success: function (result) {
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

<script>
    function get_city(state_id){
              // alert(cat_id);
              $.get("<?= base_url('Auth/Backend/Category/get_city/') ?>"+state_id, function(data)
              {
                $('#getcity').html(data);
            });

          }
      </script>

      <script>
    function get_filter1(state_id){
              // alert('Sanjay');
              var city_id = $("#city_id").val();
              $.get("<?= base_url('Auth/Backend/Category/get_filter/') ?>"+state_id+'/'+city_id, function(data){
                   // alert('Sanjay');
                $('#getfilter').html(data);
            });
               $.get("<?= base_url('Auth/Backend/Category/get_city/') ?>"+state_id, function(data)
              {
                $('#getcity').html(data);
            });

          }

          function get_filter2(city_id){
              // alert(state_id);
              var state_id = $("#state_id").val();
              $.get("<?= base_url('Auth/Backend/Category/get_filter/') ?>"+state_id+'/'+city_id, function(data){
                $('#getfilter').html(data);
            });

          }
      </script>

      <script>
    function get_city_area(city_id){
              // alert(state_id);
              $.get("<?= base_url('Auth/Backend/Category/get_city_area/') ?>"+city_id, function(data,status){
                $('#getcityarea').html(data);
            });

          }
      </script>
      