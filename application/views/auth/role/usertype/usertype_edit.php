<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <?php
        if ($values->role_aa_usertype_permission == 'Edit') {
            ?>
            <div class="form-group row">
                <div class="col-md-6 mb10">
                    <label class="label-control">Role :</label>
                    <input type="text" value="<?= $values->role_aa_usertype_name ?>" name="usertype_name"  class="form-control"  required>
                </div>
                <div class="col-md-6 mb10">
                    <label class="label-control">Status :</label>
                    <br>

                    <input type="radio" id="Active" name="status" <?php echo $values->role_aa_usertype_status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                    <label for="Active"> Enabled</label>

                    <input type="radio" <?php echo $values->role_aa_usertype_status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                    <label for="Inactive">Disabled</label>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Usertype/update/' . $values->role_aa_usertype_id) ?>">
                        Save
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>
</form>