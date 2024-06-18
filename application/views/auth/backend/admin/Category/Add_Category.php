<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="ft-user"></i> Add New Category</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                  <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Category Type :</label>
                                       <select name="type" id="" class="form-control">
                                            <option value="Category"> Main Category</option>
                                            <option value="Other"> Other Category</option>
                                       </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Category (Hindi) :</label>
                                    <input type="text" autocomplete="" id="projectinput2" name="cat_name_hindi" class="form-control" placeholder="eg. Enter Category Name In Hindi">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Category Link(English) :</label>
                                    <input type="text" autocomplete="" id="projectinput2" name="cat_name_link" class="form-control" placeholder="eg. Enter Category Link In English" required="">
                                </div>
                              <!--   <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Image :</label>
                                    <input type="file" class="form-control" id="projectinput2" name="image" >
                                </div> -->
                                <div class="col-md-6">
                                  <label class="label-control" for="projectinput1">Ordering :</label>
                                  <input type="number" class="form-control" id="projectinput2" name="ordering">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control " for="projectinput1">Status :</label>
                                    <br>
                                    <input type="radio" id="Active" name="status" checked value="Enabled">
                                    <label for="Active"> Enabled</label>
                                    <input type="radio"  id="Inactive" name="status" value="Disabled">
                                    <label for="Inactive">Disabled</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control " for="projectinput1">Top Menu :</label>
                                    <br>
                                    <input type="radio" id="Yes" name="top_menu"  value="Yes">
                                    <label for="Yes"> Yes</label>
                                    <input type="radio"  id="No" checked name="top_menu" value="No">
                                    <label for="No">No</label>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Title  : </label>
                                     <textarea name="meta_title" class="form-control" required="" style="resize: none;"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Key : </label>
                                 <textarea name="meta_key" class="form-control" style="resize: none;"></textarea>
                                </div>
                                  <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Content : </label>
                                    <textarea name="meta_content" class="form-control"  style="resize: none;"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Category/insert_category') ?>">
                                        Save
                                    </button>
                                    <!-- <button type="button" class="btn btn-warning cus-btn" onclick="reset()">
                                        Clear
                                    </button> -->
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

       
        <!--/ Description -->
    </div>
</div>


      