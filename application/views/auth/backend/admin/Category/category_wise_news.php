<div class="content-detached content-right">
    <div class="content-body">

        <section id="descriptioin" class="card">
            <div class="card-header">
                <a href="<?= base_url('Auth/Backend/Category/add_news/'.$cid)?>" class="btn btn-primary btn-sm pull-right">Add News</a>
                <a href="<?= base_url('Auth/Backend/Category/')?>" class="btn btn-info btn-sm pull-right">View Category</a>
                <h4 class="card-title"><i class="ft-user"></i>View All News</h4>
            </div>
            <div class="card-content">
                  <div class="search-panel">
                    <form class="form form-horizontal">
                        <div class="col-md-3">
                            <label>Search :</label>
                        </div>
                        <div class="col-md-6 no-padding">
                            <input type="text"  value="<?php echo $this->input->get('search') != '' ? urldecode($this->input->get('search')) : ''; ?>" class="form-control"  placeholder="eg. About Us" name="search">
                        </div>
                        <div class="col-md-3 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Backend/Category/search1/'.$cid) ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Backend/Category/news/'.$cid) ?>">
                                <i class="la la-refresh"></i>
                            </a>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="getfilter">
                        <thead>
                            <tr>
                                <th>S.No.</th>

                                <th> Category </th>

                                <th>Title</th>

                                <th>Date</th>

                                <th>Status</th>

                                <!-- <th>View</th> -->

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($News_Desp as $value) {
                                $comments=$this->Query->select('*','news_comments',['news_id'=>$value->id,'type'=>'Main_Comment'],'count');
                              ?>

                               <tr>
                                <td><?= $n++ ?></td>
                                <td><?php $qry = $this->db->select('*')->from('category')->where('id',$value->cat_id)->get(); 
                                foreach($qry->result() as $category){
                                          echo $category->cat_name_hindi ;
                                         }?></td>
                                <td><?= substr($value->title_hindi,0,250)  ?></td>
                                        <td><?= $value->date; ?> <?= $value->time; ?></td>

                                <td><span class="badge <?php echo $value->status == 'Enabled' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->status ?></span></td>
                                <td> 
                                    <a class="btn btn-info cus-btn2" href="<?= base_url('Auth/Backend/News_Desp/edit_news_desp/'.$value->id)?>">
                                        <i class="la la-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->id ?>')" href="#">
                                        <i class="la la-close"></i>
                                    </a>
                                     <a class="btn btn-primary cus-btn2" href="<?= base_url('Auth/Backend/News_Desp/comments/'.$value->id) ?>">Comment (<?= $comments ?>)
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
                $.ajax({url: "<?= base_url('Auth/Backend/News_Desp/delete_news_desp/') ?>" + value, success: function (result) {
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
      