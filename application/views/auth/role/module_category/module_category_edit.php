<form class="form form-horizontal cus-page" method="post">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-6 mb10">
                <label class="label-control" >Module Category Name :</label>
                <input type="text"  value="<?= $values->role_ba_category_name ?>" name="category_name"  class="form-control" placeholder="eg. 12" required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control " >Ordering :</label>
                <input type="number" name="ordering" value="<?= $values->role_ba_category_ordering ?>" class="form-control" placeholder="" >
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $values->role_ba_category_status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?php echo $values->role_ba_category_status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Module_Category/update/' . $values->role_ba_category_id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>