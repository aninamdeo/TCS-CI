<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
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