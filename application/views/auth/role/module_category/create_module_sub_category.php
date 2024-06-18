<form class="form form-horizontal cus-page" method="post">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-12 mb10">
                <label class="label-control" >Module Category Name : <b><?= $values->role_ba_category_name ?></b></label>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control" >Sub-Category Name :</label>
                <input type="text"   name="sub_category_name" class="form-control" placeholder="eg. About Us" required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control " >Ordering :</label>
                <input type="number" name="sub_category_ordering" class="form-control" placeholder="" required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control " >Status :</label>
                <br>
                <input type="radio" id="Active" name="sub_category_status" checked value="Enabled">
                <label for="Active"> Enabled</label>
                <input type="radio"  id="Inactive" name="sub_category_status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Module_Category/insert_module_sub_category/' . $values->role_ba_category_id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>