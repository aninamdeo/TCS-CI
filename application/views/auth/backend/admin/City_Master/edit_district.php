<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-12">
                <label class="label-control" >District :</label>
                <input type="text"   value="<?= $values->city ?>" name="city" class="form-control" placeholder="eg. District name" required>
            </div>
           <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $values->status == 'Enabled' ? 'Checked' : ''; ?> value="Enabled">
                <label for="Active"> Enabled</label>

                <input type="radio" <?php echo $values->status == 'Disabled' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/City_Master/update/' .$values->id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>

</form>