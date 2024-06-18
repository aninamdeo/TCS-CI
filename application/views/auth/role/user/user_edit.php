<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
            <div class="form-group row">
                <div class="col-md-6 mb10">
                    <label class="label-control" >Role:</label>
                    <select name="usertype_id" class="form-control" required>
                        <option value="">Select Role</option>
                        <?php foreach ($usertypes as $usertype) { ?>
                            <option <?php echo $usertype->role_aa_usertype_id==$values->role_aa_usertype_id ? 'Selected':''; ?> value="<?= $usertype->role_aa_usertype_id ?>"><?= $usertype->role_aa_usertype_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb10">
                    <label class="label-control" >Name:</label>
                    <input type="text" name="name" class="form-control" value="<?= $values->role_ab_user_name ?>" required>
                </div>
                <div class="col-md-6 mb10">
                    <label class="label-control" >Username:</label>
                    <input type="text" name="username" value="<?= $values->role_ab_user_username ?>" class="form-control" required>
                </div>
                <div class="col-md-6 mb10">
                    <label class="label-control" >New Password:</label>
                    <input type="text" name="password" class="form-control" >
                </div>
                <div class="col-md-6 mb10">
                    <label class="label-control" >User Image :</label>
                    <input type="file"  onchange="img_script(this, '1');"  name="file1" class="form-control" >
                    <input type="hidden" name="old_file1" value="<?= $values->role_ab_user_image ?>">
                </div>
                <div class="col-md-2">
                    <img id="img1" src="#" class="img-50 mt-10" style="display: none;"/>
                </div>
                <div class="col-md-6 mb10">
                    <label class="label-control">Status :</label>
                    <br>
                    <input type="radio" id="Active" name="status" <?php echo $values->role_ab_user_status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                    <label for="Active"> Enabled</label>

                    <input type="radio" <?php echo $values->role_ab_user_status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                    <label for="Inactive">Disabled</label>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/User/update/' . $values->role_ab_user_id) ?>">
                        Save
                    </button>
                </div>
            </div>
    </div>
</form>