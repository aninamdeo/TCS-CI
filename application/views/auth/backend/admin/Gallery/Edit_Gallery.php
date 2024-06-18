<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
  <div class="form-body">
    <div class="form-group row">
      <div class="col-md-6 mb10">
        <label class="label-control">Highlight Title :</label>
        <input type="text" autocomplete="" value="<?= $gallery->title; ?>" name="title" class="form-control" >
      </div>
       <div class="col-md-6 mb10">
        <label class="label-control">Ordering :</label>
        <input type="number" min="0" autocomplete="" value="<?= $gallery->ordering; ?>" name="ordering" class="form-control" >
      </div>
      
      <div class="col-md-6 mb10">
        <label class="label-control">Image :</label>
        <input type="file" autocomplete="" name="image" class="form-control" >
        <input type="hidden" name="old_image" value="<?= $gallery->image; ?>" /><br>
      </div>
      <div class="col-md-6">
          <img src="<?= base_url() ?><?= $gallery->image; ?>" class="img-responsive" width="100px"  />
      </div>
      <div class="col-md-12 mb10">
        <label class="label-control">Title (Hindi):</label>
        <input type="text" autocomplete="" value="<?= $gallery->title_hindi; ?>" name="title_hindi" class="form-control" required="">
    </div>
      <div class="col-md-12">
          <label class="label-control" for="projectinput1">Title (English) :</label>
          <input type="text" autocomplete="" id="projectinput2" name="link" class="form-control" placeholder="eg. Enter Title  In English" required=""  value="<?= $gallery->link; ?>">
      </div>
    <div class="col-md-12">
          <label class="label-control" > Short Description :</label>
          <textarea name="short_description" id="ckeditor1" placeholder="eg. Short Description " ><?= $gallery->short_description; ?></textarea>
      </div>
     <div class="col-md-12">
        <label class="label-control" for="projectinput1">Meta Title  :</label>
        <textarea name="title_share" class="form-control" required="" style="resize: none;"><?= $gallery->title_share; ?></textarea>
    </div>
      <div class="col-md-12">
             <label class="label-control" for="projectinput1">Meta Key : </label>
             <textarea name="meta_key" class="form-control"  style="resize: none;"><?= $gallery->meta_key; ?></textarea>
         </div>
         <div class="col-md-12">
             <label class="label-control" for="projectinput1">Meta Content : </label>
             <textarea name="meta_content" class="form-control"  style="resize: none;"><?= $gallery->meta_content; ?></textarea>
         </div>

            <div class="col-md-12">
              <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Gallery/update_gallery/'.$gallery->id) ?>">
                Update
              </button>
              <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>

