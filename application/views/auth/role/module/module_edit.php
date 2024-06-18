<form class="form form-horizontal cus-page" method="post">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-6 mb10">
                <label class="label-control" >Module Name :</label>
                <input type="text" value="<?= $values->role_bb_module_name ?>" name="module_name"  class="form-control" placeholder="eg. 12" required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control" >Link :</label>
                <input type="text" value="<?= $values->role_bb_module_link ?>" name="link"  class="form-control" placeholder="eg. 12" >
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >View Permission :</label>
                <input type="checkbox" name="view" <?php echo $values->role_bb_module_view_permit == '1' ? 'Checked' : ''; ?> value="1">
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >Add Permission :</label>
                <input type="checkbox" name="add" <?php echo $values->role_bb_module_add_permit == '1' ? 'Checked' : ''; ?> value="1">
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >Edit Permission :</label>
                <input type="checkbox" name="edit" <?php echo $values->role_bb_module_edit_permit == '1' ? 'Checked' : ''; ?> value="1">
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >Delete Permission :</label>
                <input type="checkbox" name="delete" <?php echo $values->role_bb_module_delete_permit == '1' ? 'Checked' : ''; ?> value="1">
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $values->role_bb_module_status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?php echo $values->role_bb_module_status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Module/update/' . $values->role_bb_module_id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>