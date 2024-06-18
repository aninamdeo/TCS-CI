<div class="content-detached content-right">
    <div class="content-body">

        <section id="descriptioin" class="card">
            <div class="card-header">
             <a class="btn btn-warning btn-sm pull-right" href="<?= base_url('Auth/Backend/Category/news/'.$cat_id) ?>">BACK </a>
                <h4 class="card-title"><i class="ft-user"></i>View All Comments</h4>
            </div>
            <div class="card-content">
               <!--    <div class="search-panel">
                    <form class="form form-horizontal">
                        <div class="col-md-3">
                            <label>Search :</label>
                        </div>
                        <div class="col-md-6 no-padding">
                            <input type="text"  value="<?php echo $this->input->get('search') != '' ? urldecode($this->input->get('search')) : ''; ?>" class="form-control"  placeholder="eg. About Us" name="search">
                        </div>
                        <div class="col-md-3 no-padding">
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Backend/News_Desp/search') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Backend/News_Desp/') ?>">
                                <i class="la la-refresh"></i>
                            </a>
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div> -->
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="getfilter">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                   $n = 1;
                                   foreach ($values as $value) {
                                    $user1= $this->Query->select('*','user',['id'=>$value->user_id],'row');
                                    ?>
                               <tr>
                                <td><?= $n++ ?></td>
                                <td><?= substr($value->comment,0,200)  ?></td>
                                 <td><?= ($user1) ? $user1->name : ''; ?></td>
                                <td><?= $value->date; ?></td>
                                <td><span class="badge <?php echo $value->status == 'Active' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->status ?></span></td>
                                <td> 
                                  <a class="btn btn-info cus-btn2" href="<?= base_url('Auth/Backend/News_Desp/edit_comment/'.$value->id)?>">
                                        <i class="la la-pencil"></i>
                                    </a>
                                    <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $value->id ?>')" href="#">
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
                $.ajax({url: "<?= base_url('Auth/Backend/News_Desp/delete_comment/') ?>" + value, success: function (result) {
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


      