<form class="form form-horizontal cus-page" method="post" enctype="multipart/form-data">
  <div class="form-body">
    <div class="form-group row">
       <div class="col-md-6">
          <label class="label-control" for="projectinput1">State</label>
          <select name="state_id" class="form-control" onchange="get_city1(this.value)" required="">
              <option value="">Select State</option>
               <?php foreach ($state_data as $state) { ?>
                <option <?= ($video->state_id == $state->id) ? 'selected' : ''?> value="<?= $state->id?>"><?= $state->name?></option>
               <?php } ?>
          </select>
      </div>
       <div class="col-md-6">
          <label class="label-control" for="projectinput1">District</label>
          <select name="city_id" class="form-control" id="city_data1">
              <option value="">Select District</option>
                <?php foreach ($city_data as $city) { ?>
                <option <?= ($video->city_id == $city->id) ? 'selected' : ''?> value="<?= $city->id?>"><?= $city->city?></option>
               <?php } ?>
          </select>
      </div>
      <div class="col-md-6 mb10">
        <label class="label-control" for="projectinput1">Highlight Title :</label>
        <input type="text" autocomplete="" value="<?= $video->title; ?>" name="title" id="projectinput1" class="form-control" >
      </div>
       <div class="col-md-6 mb10">
        <label class="label-control" for="projectinput1">Ordering :</label>
        <input type="number" min="0" value="<?= $video->ordering; ?>" name="ordering" id="projectinput1" class="form-control" >
      </div>
       <div class="col-md-12 mb10">
        <label class="label-control" for="projectinput1">Title :</label>
        <input type="text" autocomplete="" value="<?= $video->title_hindi; ?>" name="title_hindi" id="projectinput1" class="form-control" >
      </div>
        <div class="col-md-12">
          <label class="label-control" for="projectinput1">Title  (English) :</label>
          <input type="text" autocomplete="" id="projectinput2" name="link" class="form-control" placeholder="eg. Enter Title  In English" required="" value="<?= $video->link; ?>">
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
       <div class="col-md-6 mb10">
        <label class="label-control">Video :</label>
        <br>
        <input type="file" name="video" accept="video/mp4" class="form-control"  >
        <input type="hidden" name="old_video" value="<?= $video->video; ?>" />
      </div> 
      <div class="col-md-6 mb10">
          <video class="file_video" width="150" height="100" controls >
            <source src="<?=  base_url().$video->video; ?>" type="video/mp4">
          </video>
      </div>
        <div class="col-md-6">
          <label class="label-control" for="projectinput1">Date :</label>
          <input type="date"  class="form-control" id="projectinput2" name="date" value="<?= $video->date; ?>" >
      </div>
      <div class="col-md-6">
          <label class="label-control" for="projectinput1">Time :</label>
          <input type="text"  class="form-control" id="projectinput2" name="time" value="<?= $video->time; ?>">
      </div>
       <div class="col-md-12">
            <label class="label-control" for="projectinput1">Meta Title :</label>
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
            <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/My_state/update_video/'.$video->id) ?>">
              Update
            </button>
            <button type="submit" class="btn btn-danger cus-btn" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </form>

<script>
        function get_city1(id){
         
        $.post("<?= base_url('Auth/Backend/My_state/get_city_data')  ?>",{'state_id':id})
         .done(function(data){
           
            $('#city_data1').html(data);
        });
     }
    </script>
