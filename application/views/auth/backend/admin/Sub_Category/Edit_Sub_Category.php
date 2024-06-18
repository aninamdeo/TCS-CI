
<form class="form form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Sub Category (Hindi) :</label>
                <input type="text" autocomplete="" value="<?= $sub_category->sub_category_name; ?>" name="sub_cat_name" id="projectinput1" class="form-control">
            </div> 
             <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Sub Category (English) :</label>
                <input type="text" autocomplete="" value="<?= $sub_category->sub_category_link; ?>" name="sub_category_link" id="projectinput1" class="form-control">
            </div>
             <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Category :</label>
                <select class="form-control" name="cat_id" required="">
                    <option value="0">Select Category</option>
                    <?php
                    foreach ($category as $data1) {?>
                        <option <?= ($data1->id==$sub_category->cat_id) ? 'selected' : '' ?>  value="<?= $data1->id ?>"> <?= $data1->cat_name_hindi ?> </option>
                  <?php } ?>
                </select>
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" for="projectinput1">Ordering :</label>
                <input type="number" name="ordering" id="projectinput1" class="form-control" value="<?= $sub_category->sub_ordering?>">
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $sub_category->status == 'Enabled' ? 'Checked' : '' ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?= ($sub_category->status == 'Disabled') ? 'Checked' : '' ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
             <div class="col-md-12">
                <label class="label-control" for="projectinput1">Meta Title  : </label>
                 <textarea name="meta_title" class="form-control" required="" style="resize: none;"></textarea>
            </div>
            <div class="col-md-12">
                <label class="label-control" for="projectinput1">Meta Key : </label>
             <textarea name="meta_key" class="form-control" style="resize: none;"></textarea>
            </div>
              <div class="col-md-12">
                <label class="label-control" for="projectinput1">Meta Content : </label>
                <textarea name="meta_content" class="form-control"  style="resize: none;"></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Sub_Category/update_sub_category/' . $sub_category->sub_category_id) ?>">
                    Update
                </button>
                <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

