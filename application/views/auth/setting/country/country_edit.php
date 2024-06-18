<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-6 mb10">
                <label class="label-control">Country Name :</label>
                <input type="text"  value="<?= $values->common_ab_country_name ?>" name="name"  class="form-control"  required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control ">Ordering :</label>
                <input type="number" name="ordering" value="<?= $values->common_ab_country_ordering ?>" class="form-control" placeholder="" >
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $values->common_ab_country_status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?php echo $values->common_ab_country_status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Setting/Country/update/' . $values->common_ab_country_id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>