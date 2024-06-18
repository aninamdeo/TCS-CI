<div class="content-detached content-right">
    <div class="content-body">

        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i>All Sub News</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="getfilter">
                        <thead>
                            <tr>
                                <th>S.No.</th>

                                <th>News Name</th>

                                <th>Title</th>

                                <th>Area</th>

                                <th>Date</th>

                                <th>Status</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($all_news as $data) {?>

                             <tr>
                                <td><?= $n++ ?></td>
                                <?php  foreach($news_details as $news) {?>
                                    <td><?php $qry = $this->db->select('*')->from('category')->where('id',$news->sub_cat_id,'type','Sub_Category')->get(); foreach($qry->result() as $category)

                                    if($category->cat_name_hindi=='' && $category->cat_name_urdu=='' )

                                        { echo $category->cat_name ;

                                        }elseif($category->cat_name=='' && $category->cat_name_urdu=='')

                                        { echo $category->cat_name_hindi ;

                                        }else{ echo $category->cat_name_urdu ;  } }   

                                        ?>

                                    </td>

                                    <td><?php 

                                    if($data->title_hindi == NULL && $data->title_urdu == NULL )

                                        { echo $data->title ;

                                        }elseif($data->title == NULL && $data->title_urdu == NULL)

                                        { echo $data->title_hindi ;

                                        }elseif($data->title == NULL && $data->title_hindi == NULL)

                                        { echo $data->title_urdu ;  }else{}  ?></td>
                                        <td><?php 

                                        if($data->area_hindi == NULL && $data->area_urdu == NULL )

                                            { echo $data->area ;

                                            }elseif($data->area == NULL && $data->area_urdu == NULL)

                                            { echo $data->area_hindi ;

                                            }elseif($data->area == NULL && $data->area_hindi == NULL)

                                            { echo $data->area_urdu ;  }else{}  ?></td>
                                            <td><?= $data->status?></td>

                                            <td><span class="badge <?php echo $data->status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $data->status ?></span></td>

                                           
                                            <td>
                                                
                                                <a class="btn btn-info cus-btn2" href="<?= base_url('Auth/Backend/edit_sub_news/'.$data->id) ?>"><i class="la la-pencil"></i></a>

                                                <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->id ?>')" href="#">
                                                    <i class="la la-close"></i>
                                                </a>
                                             <!-- <a class="btn btn-warning cus-btn2" href="<?= base_url('Auth/Product/view_product/'. $value->site_an_id) ?>" title="Add Listing By Excel File">
                                            <i class="la la-plus"></i>
                                        </a> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
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
        $.get("<?= base_url('Auth/Backend/News_Desp/edit_news_desp/') ?>" + value, function (data) {
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
                $.ajax({url: "<?= base_url('Auth/Backend/News_Desp/delete_sub_news/') ?>" + value, success: function (result) {
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
      