<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-6">
                <label class="label-control" >Logo : <img src="<?= base_url($values->logo) ?>" style="width:20px;"/></label>
                <input type="hidden" name="old_logo" value="<?= $values->logo ?>">
                <input type="file" class="form-control" name="logo" >
            </div>
            <div class="col-md-6">
                <label class="label-control" >Other Logo : <img src="<?= base_url($values->logo_other) ?>" style="width:20px;"/></label>
                <input type="hidden" name="old_logo_other" value="<?= $values->logo_other ?>">
                <input type="file" class="form-control" name="logo_other" >
            </div>
            <div class="col-md-6">
                <label class="label-control" >FavIcon : <img src="<?= base_url($values->icon) ?>" style="width:20px;"/></label>
                <input type="hidden" name="old_favicon" value="<?= $values->icon ?>">
                <input type="file" class="form-control" name="favicon" >
            </div>
            <div class="col-md-6">
                <label class="label-control" >Site Name : </label>
                <input type="text" class="form-control" value="<?= $values->site_name ?>" name="site_name" required>
            </div>
            <div class="col-md-6">
                <label class="label-control" >Email :</label>
                <input type="email" class="form-control" value="<?= $values->email ?>" name="email" required>
            </div>
            <div class="col-md-6">
                <label class="label-control" >Email2 :</label>
                <input type="email" class="form-control" value="<?= $values->email2 ?>" name="email2" required>
            </div>
            <div class="col-md-6">
                <label class="label-control" >Contact : </label>
                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control" value="<?= $values->contact ?>" name="contact" required>
            </div>
            <div class="col-md-6">
                <label class="label-control" >Contact2 : </label>
                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control" value="<?= $values->contact2 ?>" name="contact2" required>
            </div>
            <div class="col-md-12">
                <label class="label-control" >Address : </label>
                    <textarea name="address" class="form-control" required> <?= $values->address ?></textarea>
            </div>
             <div class="col-md-12">
                <label class="label-control" >Live TV : </label>
                    <textarea name="live_tv" class="form-control" required> <?= $values->live_tv ?></textarea>
            </div>

            <div class="col-md-12">
                <label class="label-control" >Meta Keys : </label>
                 <textarea name="meta_key" class="form-control" required> <?= $values->meta_key ?></textarea>
            </div>
            <div class="col-md-12">
                <label class="label-control" >Meta Description : </label>
                 <textarea name="meta_content" class="form-control" required><?= $values->meta_content ?></textarea>
            </div>
            <div class="col-md-12">
                <label class="label-control" >About Us : </label>
                <textarea name="about_us" class="form-control" required=""><?= $values->about_us ?></textarea>
               
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Website/Basic_Details/update/') ?>">
                    Update
                </button>
            </div>
        </div>
    </div>

</form>
