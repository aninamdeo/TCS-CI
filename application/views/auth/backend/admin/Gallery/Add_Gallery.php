<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
            <a href="<?= base_url('Auth/Backend/Gallery/') ?>" class="btn btn-primary btn-sm pull-right">View Gallery</a>
                <h4 class="card-title"><i class="ft-user"></i> Add Photo Gallery</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Highlight Title:</label>
                                    <input type="text" id="projectinput2" name="title" class="form-control" placeholder="eg." >
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Title (Hindi) :</label>
                                    <input type="text" autocomplete="" id="projectinput2" name="title_hindi" class="form-control" placeholder="eg. Enter Title  In Hindi">
                                </div>
                                 <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Title (English) :</label>
                                    <input type="text" autocomplete="" id="projectinput2" name="link" class="form-control" placeholder="eg. Enter Title  In English" required="">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Image :</label>
                                    <input type="file"  class="form-control" id="projectinput2" name="image" required="">
                                </div> 
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Ordering :</label>
                                    <input type="number" min="0" class="form-control" id="projectinput2" name="ordering" >
                                </div>
                                  <div class="col-md-12">
                                        <label class="label-control" > Short Description :</label>
                                        <textarea name="short_description" id="ckeditor" placeholder="eg. Short Description " ></textarea>
                                    </div>
                                 <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Title  :</label>
                                    <textarea name="title_share" class="form-control" required="" style="resize: none;"></textarea>
                                </div>
                                 <div class="col-md-12">
                                     <label class="label-control" for="projectinput1">Meta Key : </label>
                                     <textarea name="meta_key" class="form-control"  style="resize: none;"></textarea>
                                 </div>
                                 <div class="col-md-12">
                                     <label class="label-control" for="projectinput1">Meta Content : </label>
                                     <textarea name="meta_content" class="form-control"  style="resize: none;"></textarea>
                                 </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Gallery/insert_gallery') ?>">
                                        Save
                                    </button>
                                    <a href="<?= base_url('Auth/Backend/Gallery/') ?>" class="btn btn-warning cus-btn" >BACK</a>
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

