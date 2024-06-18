<div class="content-detached content-right">
    <div class="content-body">
        
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> View Category</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">
                    <form class="form form-horizontal" method="get">
                        <div class="col-md-1">
                            <label>Filter by :</label>
                        </div>
                        <div class="col-md-4 no-padding">
                            <input type="text" id="projectinput1" value="<?php echo $this->input->get('search') != '' ? urldecode($this->input->get('search')) : ''; ?>" class="form-control"  placeholder="eg. Category Name" name="search">
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
                </form>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped" id="getfilter">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Category Name</th>
                            <!-- <th>Image</th> -->
                            <th>Ordering</th>
                            <th>Category Type </th>
                            <th>Top Menu </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        foreach ($category as $value) {
                             $sub_category=$this->Query->select('*','sub_category',['cat_id'=>$value->id],'count');
                             $news=$this->Query->select('*','news_details',['cat_id'=>$value->id],'count');
                            ?>
                         <tr>
                            <td><?= $n++ ?></td>
                            <td><?= $value->cat_name_hindi ?></td>
                            <!-- <td><img src="<?= base_url($value->image)?>" alt="" width="100px"></td> -->
                            <td><?= $value->ordering ?></td>
                            <td><?= $value->type ?></td>
                            <td><?= $value->top_menu ?></td>
                            <td><span class="badge <?php echo $value->status == 'Enabled' ? 'badge-success' : 'badge-danger'; ?>"><?= $value->status ?></span></td>
                            <td>
                             <?php if( $value->type == 'Category' && $value->id != '1') {?>
                                 <a class="btn btn-primary cus-btn2" href="<?= base_url('Auth/Backend/Category/subcategory/'.$value->id)?>" title="View Subcategory" >
                                    SubCategory  (<?= $sub_category?>)
                                  </a> 
                                  <?php   } ?>
                                  <a class="btn btn-primary cus-btn2" href="<?= base_url('Auth/Backend/Category/news/'.$value->id)?>" title="View News" >
                                    News  (<?= $news?>)
                                  </a>
                             <?php if($value->id != '1'){ ?>
                                <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->id ?>')">
                                    <i class="la la-pencil"></i>
                                </a>
                                <?php } ?>
                                   <?php if($value->id == '1' || $value->id == '27' || $value->type == 'Other') {?>
                                    <?php }else{ ?>
                                    <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->id ?>')" href="#">
                                            <i class="la la-close"></i>
                                        </a>
                                  <?php } ?>
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
    function create_subArea(value) {
        $.get("<?= base_url('Auth/Backend/Category/create_subArea') ?>/" + value, function (data) {
            $("#modal-header").html('Add Sub-Area');
            $("#modal-value").html(data);
            $("#myModal").modal('show');
            restart_scripts();
        });
    }

    function edit(value) {
        // alert(value);
        $.get("<?= base_url('Auth/Backend/Category/edit_category/') ?>" + value, function (data) {
            $("#modal-header").html('Edit Category');
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
                $.ajax({url: "<?= base_url('Auth/Backend/Category/delete_category/') ?>" + value, success: function (result) {
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
      