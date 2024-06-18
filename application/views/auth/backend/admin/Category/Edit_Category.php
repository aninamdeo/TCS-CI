<form class="form form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Category Link (English) :</label>
                <input type="text" autocomplete="" value="<?= $category->cat_name; ?>" name="cat_name_link" id="projectinput1" class="form-control" required="">
            </div>
              <div class="col-md-6">
                <label class="label-control" for="projectinput1">Category Type :</label>
                   <select name="type" id="" class="form-control">
                      <option <?= ($category->type == 'Category') ? 'selected' : '' ?> value="Category"> Main Category</option>
                        <option  <?= ($category->type == 'Other') ? 'selected' : '' ?>  value="Other"> Other Category</option>
                   </select>
            </div>
              <div class="col-md-6 mb10">
                <label class="label-control" for="projectinput1">Ordering :</label>
                <input type="number" value="<?= $category->ordering ?>" name="ordering" id="projectinput1" class="form-control">
            </div>
            <!-- <?php echo  $category->id;?> -->
            <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Category (Hindi) :</label>
                <input type="text" autocomplete="" value="<?= $category->cat_name_hindi; ?>" name="cat_name_hindi" id="projectinput1" class="form-control" >
            </div>
         <!--    <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Image :</label>
                <input type="file" autocomplete="" name="image" id="projectinput1" class="form-control" >
                 <input type="hidden" name="old_image" value="<?= $category->image; ?>" /><br>
                 <img src="<?= base_url() ?><?= $category->image; ?>" class="img-responsive" width="100px"  />
            </div> -->
            <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $category->status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?php echo $category->status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
             <div class="col-md-6 mb10">
                <label class="label-control">Top Menu :</label>
                <br>
                <input type="radio" id="Yes" name="top_menu" <?php echo $category->top_menu == 'Yes' ? 'Checked' : ''; ?> value="Yes" >
                <label for="Yes"> Yes</label>
                <input type="radio" <?php echo $category->top_menu == 'No' ? 'Checked' : ''; ?> id="No" name="top_menu" value="No" >
                <label for="No">No</label>
            </div>
             <div class="col-md-12">
                <label class="label-control" for="projectinput1">Meta Title  : </label>
                 <textarea name="meta_title" class="form-control" required="" style="resize: none;"><?= $category->meta_title; ?></textarea>
            </div>
            <div class="col-md-12">
                <label class="label-control" for="projectinput1">Meta Key : </label>
             <textarea name="meta_key" class="form-control" style="resize: none;"><?= $category->meta_key; ?></textarea>
            </div>
              <div class="col-md-12">
                <label class="label-control" for="projectinput1">Meta Content : </label>
                <textarea name="meta_content" class="form-control"  style="resize: none;"><?= $category->meta_content; ?></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Category/update_Category/' . $category->id) ?>">
                    Update
                </button>
                <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

