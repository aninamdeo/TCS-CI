<form class="form form-horizontal cus-page" method="post">
    <div class="form-body">
        <div class="form-group row">
            <div class="col-md-6 mb10">
                <label class="label-control" >Module Category Name : <b><?= $category->role_ba_category_name ?></b></label>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control" >Module Sub-Category Name : <b><?= $sub_category->role_ba_category_name ?></b></label>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control" >Module Name :</label>
                <input type="text" name="module_name" class="form-control" placeholder="eg. About Us" required>
            </div>
            <div class="col-md-6 mb10">
                <label class="label-control " >Link :</label>
                <input type="text" name="link" class="form-control" placeholder="" >
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >View Permission :</label>
                <input type="checkbox" name="view" value="1" checked>
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >Add Permission :</label>
                <input type="checkbox" name="add" value="1" checked>
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >Edit Permission :</label>
                <input type="checkbox" name="edit" value="1" checked>
            </div>
            <div class="col-md-12 mb10">
                <label class="label-control" >Delete Permission :</label>
                <input type="checkbox" name="delete" value="1" checked>
            </div>

            <div class="col-md-6 mb10">
                <label class="label-control " >Status :</label>
                <br>
                <input type="radio" id="Active" name="status" checked value="Enabled">
                <label for="Active"> Enabled</label>
                <input type="radio"  id="Inactive" name="status" value="Disabled">
                <label for="Inactive">Disabled</label>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Role/Module/insert/' . $sub_category->role_ba_category_id) ?>">
                    Save
                </button>
            </div>
        </div>
    </div>
</form>