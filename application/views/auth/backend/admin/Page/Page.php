<div class="content-detached content-right">
    <div class="content-body">

        <section id="descriptioin" class="card">
            <div class="card-header">
                <a href="<?= base_url('Auth/Backend/Page/add_page')?>" class="btn btn-sm btn-primary pull-right">Add Page</a>
                <h4 class="card-title"><i class="ft-user"></i> View Page</h4>
            </div>
            <div class="card-content">
                <div class="search-panel">

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="getfilter">
                        <thead>
                            <tr>
                                <th>S.No.</th>

                                <th>Page Name</th>

                                <th>Title</th>

                                <th>Page Link</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($page_data as $data) {?>

                               <tr>
                                <td><?= $n++ ?></td>
                                <td><?= $data->pagename ?></td>
                                <td><?= $data->title ?></td>
                                <td><?= $data->pagelink ?></td>
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
        $.get("<?= base_url('Auth/Backend/Page/edit_page/') ?>" + value, function (data) {
            $("#modal-header").html('Edit Page');
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
                $.ajax({url: "<?= base_url('Auth/Backend/Page/delete_page/') ?>" + value, success: function (result) {
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

