<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-12">
                <label class="label-control" >State :</label>
                <input type="text"   value="<?= $values->name ?>" name="state" class="form-control" placeholder="eg. State name" required>
            </div>
           <div class="col-md-6 mb10">
                <label class="label-control">Status :</label>
                <br>
                <input type="radio" id="Active" name="status" <?php echo $values->status == 'Active' ? 'Checked' : ''; ?> value="Active">
                <label for="Active"> Active</label>

                <input type="radio" <?php echo $values->status == 'Deactive' ? 'Checked' : ''; ?> id="Inactive" name="status" value="Deactive">
                <label for="Inactive">Deactive</label>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/City_Master/update_state/' .$values->id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>

</form>