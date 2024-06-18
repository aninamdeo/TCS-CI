<form class="form form-horizontal" method="post" enctype="multipart/form-data">
  <div class="form-body">
    <div class="form-group row">
      <div class="col-md-4 mb10">
        <label class="label-control" for="projectinput1">Highlight Title :</label>
        <input type="text" autocomplete="" value="<?= $video->title; ?>" name="title" id="projectinput1" class="form-control" >
      </div>
      <!--  <div class="col-md-6 mb10">
        <label class="label-control" for="projectinput1">Ordering :</label>
        <input type="number" min="0" value="<?= $video->ordering; ?>" name="ordering" id="projectinput1" class="form-control" >
      </div> -->
       <div class="col-md-8 mb10">
        <label class="label-control" for="projectinput1">Title :</label>
        <input type="text" autocomplete="" value="<?= $video->title_hindi; ?>" name="title_hindi" id="projectinput1" class="form-control" >
      </div>
       <div class="col-md-12">
          <label class="label-control" for="projectinput1">Title (English) :</label>
          <input type="text" autocomplete="" id="projectinput2" name="link" class="form-control" placeholder="eg. Enter Title  In English" required=""  value="<?= $video->link; ?>">
      </div>
       <div class="col-md-12">
          <label class="label-control" > Short Description :</label>
          <textarea name="short_description" id="ckeditor1" placeholder="eg. Short Description " ><?= $video->short_description; ?></textarea>
      </div>
      <div class="col-md-6 mb10">
        <label class="label-control" for="projectinput1">Image :</label>
        <input type="file" autocomplete="" name="image" id="projectinput1" class="form-control" >
        <input type="hidden" name="old_image" value="<?= $video->image; ?>" /><br>
      </div> 
      <div class="col-md-6 mb10">
        <img src="<?= base_url() ?><?= $video->image; ?>" class="img-responsive" width="100px"  />
      </div>
       <div class="col-md-6 video_type" >
            <label class="label-control" for="projectinput1">Video Type :</label>
            <select name="vtype" class=" vtype form-control" id="">
             <option value="">Select</option>
               <option <?= ($video->type == 'Video') ? 'selected' : '' ?> value="Video">Video</option>
              <option <?= ($video->type == 'Youtube') ? 'selected' : '' ?>  value="Youtube">Youtube</option>
            </select>
        </div>
       <div class="col-md-6" >
            <label class="label-control text_type" for="projectinput1">Upload Video</label>
           <input type="file" name="video"  class="form-control tube" >
           <input type="hidden" name="old_video" value="<?= $video->video ?>" >
           <input type="text" style="display:none;"  name="video_link" class="form-control tube">
        </div>
      <div class="col-md-12 mb10">
          <video class="file_video" width="150" height="100" controls >
            <source src="<?=  base_url().$video->video; ?>" accept="video/mp4" type="video/mp4">
          </video>
      </div>
        <div class="col-md-6">
            <label class="label-control text-danger" for="projectinput1">Date* :</label>
            <input type="date" id="projectinput2" name="date" class="form-control" value="<?= $video->date ?>" required="">
        </div>
          <div class="col-md-6">
          <label class="label-control text-danger" for="projectinput1">Time* :</label>
          <input type="text" id="projectinput2" name="time" class="form-control" value="<?= ($video->time) ? $video->time : date("h:i:a") ?>" required="">
      </div>
       <div class="col-md-12">
          <label class="label-control" for="projectinput1">Meta Title  :</label>
          <textarea name="title_share" class="form-control" required="" style="resize: none;"><?= $video->title_share; ?></textarea>
       </div>
       <div class="col-md-12">
             <label class="label-control" for="projectinput1">Meta Key : </label>
             <textarea name="meta_key" class="form-control"  style="resize: none;"><?= $video->meta_key; ?></textarea>
         </div>
         <div class="col-md-12">
             <label class="label-control" for="projectinput1">Meta Content : </label>
             <textarea name="meta_content" class="form-control"  style="resize: none;"><?= $video->meta_content; ?></textarea>
         </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Video_Bulletin/update_bulletin/'.$video->id) ?>">
                Update
              </button>
              <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </form>

<script>
    $('.vtype').click(function(){
        if(this.value == 'Youtube')
        {
           $('.text_type').text('Video Link');
            $('.tube:eq(1)').show().attr('required',true);
            $('.tube:eq(0)').hide().removeAttr('required',true);

        }else if(this.value == 'Video'){
             $('.text_type').text('Video ');
            $('.tube:eq(0)').show().attr('required',true);
            $('.tube:eq(1)').hide().removeAttr('required',true);
        }
    })
  
</script>