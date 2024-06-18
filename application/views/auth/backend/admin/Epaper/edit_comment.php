<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                  <a  class="btn btn-primary btn-sm pull-right" href="<?= base_url('Auth/Backend/News_Desp/comments/'.$comment->news_id) ?>"> View Comments</a>
                <h4 class="card-title"><i class="ft-user"></i> Edit Comments</h4>
              </div>
              <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                               <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Comment :</label>
                                    <textarea name="comment" style="resize: none;" placeholder="comment" class="form-control" required=""><?= $comment->comment ;?></textarea>
                                </div>
                                <div class="col-md-4">
                                <label class="label-control " for="projectinput1">Status :</label>
                                    <br>
                                    <input type="radio" id="Active" <?php if($comment->status=='Active'){ echo 'checked';} ?> name="status" checked value="Active">
                                    <label for="Active"> Active</label>
                                    <input type="radio" <?php if($comment->status=='Deactive'){ echo 'checked';} ?> id="Inactive" name="status" value="Deactive">
                                    <label for="Inactive">Deactive</label>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/News_Desp/update_comment/' .$comment->id) ?>">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-warning cus-btn" onclick="reset()">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if($reply == NULL){ ?>
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                               <div class="col-md-10">
                                    <label class="label-control" for="projectinput1">Reply :</label>
                                    <textarea name="reply" style="resize: none;" placeholder="comment's Reply" class="form-control" required=""></textarea>
                                    <input type="hidden" name="news_id" value="<?= $comment->news_id?>">
                                </div>
                                <div class="col-md-2" style="margin-top: 10px;">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/News_Desp/insert_reply/'.$comment->id) ?>"> Save </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php }else{ ?>
                  <p style="overflow-wrap: break-word;"> <b>Reply : </b> <?= $reply->comment ?><b class="pull-right"><?= date('d-m-Y | h:i A',strtotime($reply->date)) ?></b> </p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i>View All Subcomments</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="getfilter">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Date</th>
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
                                <td><?= substr($value->comment,0,250)  ?></td>
                                <td><?= ($user1) ? $user1->name : 'Admin'; ?></td>
                                <td><?= $value->date; ?></td>
                                <td><span class="badge <?php echo $value->status == 'Active' ? 'badge-primary' : 'badge-danger'; ?>"><?= $value->status ?></span></td>
                                <td> 
                                   <a class="btn btn-info cus-btn2" href="#" onclick="edit('<?= $value->id ?>')">
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
                               
                             </td>
                         </tr>
                     </tfoot>
                 </table>
             </div>
         </div>
     </section>
    </div>
    <!--/ Description -->
</div>
<script>


    function edit(value) {
        // alert(value);
        $.get("<?= base_url('Auth/Backend/News_Desp/edit_subcomment/') ?>" + value, function (data) {
            $("#modal-header").html('Edit Sub Comment');
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


      