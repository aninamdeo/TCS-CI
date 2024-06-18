<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
             <a href="<?= base_url('Auth/Backend/Video_Bulletin/') ?>" class="btn btn-primary btn-sm pull-right">View Video Bulletin</a>
                <h4 class="card-title"><i class="ft-user"></i> Add Video Bulletin</h4>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="label-control" for="projectinput1">Highlight Title:</label>
                                    <input type="text" id="projectinput2" name="title" class="form-control" placeholder="eg. " >
                                </div>
                                 
                                <div class="col-md-8">
                                    <label class="label-control" for="projectinput1">Title hindi (Hindi) :</label>
                                    <input type="text" autocomplete="" id="projectinput2" name="title_hindi" class="form-control" placeholder="eg. Enter Title  In Hindi" required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="label-control" for="projectinput1">Image :</label>
                                    <input type="file" style="border:none" class="form-control" id="projectinput2" name="image" required="">
                                </div>
                                 <div class="col-md-8">
                                    <label class="label-control" for="projectinput1">Title (English) :</label>
                                    <input type="text" autocomplete="" id="projectinput2" name="link" class="form-control" placeholder="eg. Enter Title  In English" required="">
                                </div>
                                 <div class="col-md-4 video_type" >
                                    <label class="label-control" for="projectinput1">Video Type :</label>
                                    <select name="vtype" class=" vtype form-control" id="">
                                        <option value="">Select Type</option>
                                        <option value="Video" selected="">Video</option>
                                        <option value="Youtube">Youtube</option>
                                    </select>
                                </div>
                                 <div class="col-md-8" >
                                    <label class="label-control text_type" for="projectinput1">Upload Video</label>
                                    <input type="file" name="video"  class="form-control tube" accept="video/mp4" >
                                    <input type="text" style="display:none;"  name="video_link" class="form-control tube">
                                </div>
                                <!-- <div class="col-md-6">
                                 <label class="label-control" for="projectinput1">Ordeirng :</label>
                                    <input type="number" min ="0" class="form-control" id="projectinput2" name="ordering" >
                                </div> -->
                                 <div class="col-md-12">
                                      <label class="label-control" >Description :</label>
                                      <textarea name="short_description" id="ckeditor" placeholder="eg. Short Description" ></textarea>
                                  </div>
                                  <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Date* :</label>
                                    <input type="date" id="projectinput2" name="date" class="form-control" value="<?= date("Y-m-d") ;?>" required="">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Time* :</label>
                                    <input type="text" id="projectinput2" name="time" class="form-control" value="<?= date("h:i:a") ;?>" required="">
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
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/Video_Bulletin/insert_bulletin') ?>">
                                        Save
                                    </button>
                               <a href="<?= base_url('Auth/Backend/Video_Bulletin/') ?>" class="btn btn-warning cus-btn" >BACK</a>
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