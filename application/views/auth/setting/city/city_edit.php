<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-6 mb10">
                <label class="label-control" >Country Name :</label>
                <select name="country_id" class="form-control" required>
                    <option value="">Select Country</option>
                    <?php foreach ($countrys as $country) { ?>
                        <option <?= $values->common_ab_country_id == $country->common_ab_country_id ? 'Selected' : '' ?> value="<?= $country->common_ab_country_id ?>"><?= $country->common_ab_country_name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control" >State Name :</label>
                <select name="state_id" id="state" class="form-control" required>
                    <option value="">Select State</option>
                    <?php foreach ($states as $state) { ?>
                        <option <?= $values->common_ac_state_id == $state->common_ac_state_id ? 'Selected' : '' ?> value="<?= $state->common_ac_state_id ?>"><?= $state->common_ac_state_name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control">City Name :</label>
                <input type="text"  value="<?= $values->common_ad_city_name ?>" name="name"  class="form-control"  required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control ">Ordering :</label>
                <input type="number" name="ordering" value="<?= $values->common_ad_city_ordering ?>" class="form-control" placeholder="" >
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $values->common_ad_city_status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?php echo $values->common_ad_city_status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Setting/City/update/' . $values->common_ad_city_id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>