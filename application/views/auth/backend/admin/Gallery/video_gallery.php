<div class="content-detached content-right">
    <div class="content-body">

        <section id="descriptioin" class="card">
            <div class="card-header">
             <a href="<?= base_url('Auth/Backend/Gallery/add_video') ?>" class="btn btn-primary btn-sm pull-right">Add Video Gallery </a>
                <h4 class="card-title"><i class="ft-user"></i> View All Video</h4>
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
                            <button type="submit" class="btn btn-primary cus-btn1" formaction="<?= base_url('Auth/Backend/Gallery/search1') ?>">
                                <i class="la la-search"></i>
                            </button>
                            <a class="btn btn-warning cus-btn1" href="<?= base_url('Auth/Backend/Gallery/video') ?>">
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
                                <th>S No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Ordering</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($gallery_data as $data) {?>

                               <tr>
                                <td><?= $n++ ?></td>
                                <td><?= $data->title_hindi; ?></td>
                            <td><img src="<?= base_url($data->image)?>" alt="" width="50px"></td>
                                
                                 <td><?= $data->ordering; ?></td>
                                <td>
                                    <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $data->id ?>')">
                                        <i class="la la-pencil"></i>
                                    </a>

                                    <a class="btn btn-danger cus-btn2" onclick="delete_data('<?= $data->id ?>')" href="#">
                                        <i class="la la-close"></i>
                                    </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                 <!--  <?= $links ?> -->
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
        $.get("<?= base_url('Auth/Backend/Gallery/edit_video/') ?>" + value, function (data) {
            $("#modal-header").html('Edit Video');
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
                $.ajax({url: "<?= base_url('Auth/Backend/Gallery/delete_video/') ?>" + value, success: function (result) {
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



      
      