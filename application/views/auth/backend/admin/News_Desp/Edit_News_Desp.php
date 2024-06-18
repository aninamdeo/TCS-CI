<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                  <a  class="btn btn-primary btn-sm pull-right" href="<?= base_url('Auth/Backend/News_Desp') ?>"> View News Details </a>
                <h4 class="card-title"><i class="ft-user"></i> Edit News Details</h4>
              </div>
              <div class="card-content">
                <div class="col-md-12">
                    <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                             <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Category Name* :</label>
                                     <select class="form-control" name="category" id="category" onchange="get_subcategory(this.value)" required="">
                                        <option value="">Select  Category</option>
                                        <?php foreach ($category as $cat) {?>
                                            <option <?php if($cat->id == $News_Desp->cat_id){echo "selected";} ?> value="<?= $cat->id?>"><?= $cat->cat_name_hindi ;  ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Sub Category Name :</label>
                                        <select class="form-control" name="subcategory" id="subcategory">
                                        <option value="">Select Sub Category</option>
                                          <?php foreach ($sub_cat as $subcat) {?>
                                            <option <?php if($subcat->sub_category_id == $News_Desp->sub_cat_id){echo "selected";} ?> value="<?= $subcat->sub_category_id?>"><?= $subcat->sub_category_name ;  ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                  <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Top News :</label>
                                        <select class="form-control" name="top_news" >
                                            <option <?php if($News_Desp->top_news == 'Yes'){echo "selected";} ?> value="Yes">Yes</option>
                                            <option value="No" <?php if($News_Desp->top_news == 'No'){echo "selected";} ?> >No</option>
                                        </select>
                                 </div>
                                 <div class="col-md-6" >
                                    <label class="label-control text-danger " for="projectinput1">Image</label>
                                   <input type="file" name="image"  class="form-control " >
                                   <input type="hidden" name="old_image" value="<?= $News_Desp->image ?>" >
                                </div> 
                                <div class="col-md-6 video_type" >
                                    <label class="label-control" for="projectinput1">Video Type :</label>
                                    <select name="vtype" class=" vtype form-control" id="">
                                     <option value="">Select</option>
                                        <option <?= ($News_Desp->video_type == 'Video') ? 'selected' : '' ?> value="Video">Video</option>
                                        <option <?= ($News_Desp->video_type == 'Youtube') ? 'selected' : '' ?>  value="Youtube">Youtube</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Date* :</label>
                                    <input type="date" id="projectinput2" name="date" class="form-control" value="<?= $News_Desp->date ?>" required="">
                                </div>
                                  <div class="col-md-6" >
                                    <label class="label-control text_type" for="projectinput1">Upload Video</label>
                                   <input type="file" name="video"  class="form-control tube" >
                                   <input type="hidden" name="old_video" value="<?= $News_Desp->video ?>" >
                                   <input type="text" style="display:none;"  name="video_link" class="form-control tube">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Time* :</label>
                                    <input type="text" id="projectinput2" name="time" class="form-control" value="<?= $News_Desp->time ?>" required="">
                                </div>
                                  <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Highlight Starting Word :</label>
                                    <input type="text" id="projectinput2" name="area_hindi" value="<?= $News_Desp->area_hindi ;?>" class="form-control" placeholder="New Delhi">
                                </div>
                                   <div class="col-md-6">
                                     <label class="label-control " for="projectinput1">Status :</label>
                                    <br>
                                    <input type="radio" id="Active" <?php if($News_Desp->status=='Enabled'){ echo 'checked';} ?> name="status" checked value="Enabled">
                                    <label for="Active"> Enabled</label>
                                    <input type="radio" <?php if($News_Desp->status=='Disabled'){ echo 'checked';} ?> id="Inactive" name="status" value="Disabled">
                                    <label for="Inactive">Disabled</label>
                                </div>
                                 <div class="col-md-3" ><br>
                                     <img src="<?= base_url() ?><?= $News_Desp->image; ?>" class="img-responsive" width="80px" height="90px"  />
                                </div>

                                <div class="col-md-3">
                                    <label class="label-control " for="projectinput1" >Video:</label>
                                            <?php   
                                                    if($News_Desp->video_type == 'Youtube'){?>
                                                <?= $News_Desp->video; ?>
                                                <?php    }elseif($News_Desp->video_type == 'Video'){ ?>
                                                     <video width="100%" height = "100px" controls>
                                                        <source src="<?= base_url(); ?><?= $News_Desp->video; ?>" >
                                                    </video>
                                                <?php       } ?>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control text-danger" for="projectinput1">Title(Hindi)* :</label>
                                    <textarea class="form-control" name="title_hindi" required="" id="ckeditor"><?= $News_Desp->title_hindi ;?></textarea>
                                </div>
                                 <div class="col-md-12">
                                    <label class="label-control text-danger" for="projectinput1">Title* (English)  : </label>
                                     <textarea name="news_link" class="form-control" required="" style="resize: none;"><?= $News_Desp->news_link ;?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Content(Hindi)* :</label>
                                    <textarea class="form-control" name="content_hindi" id="ckeditor2"><?= $News_Desp->content_hindi ;?></textarea>
                                </div>
                               <!--  <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Ordering :</label>
                                    <input type="number" id="projectinput2" name="ordering" value="<?= $News_Desp ->ordering ;?>" class="form-control">
                                </div> -->
                                 <div class="col-md-12">
                                    <label class="label-control text-danger" for="projectinput1">Meta Title*  : </label>
                                    <textarea name="title_share" class="form-control" required="" style="resize: none;"><?= $News_Desp->title; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Key : </label>
                                    <textarea name="meta_key" class="form-control"  style="resize: none;"><?= $News_Desp->meta_key; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Content : </label>
                                 <textarea name="meta_content" class="form-control"  style="resize: none;"><?= $News_Desp->meta_content; ?></textarea>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/News_Desp/update_news_desp/' . $News_Desp->id) ?>">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-warning cus-btn" onclick="reset()">
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
    <!--/ Description -->
</div>
<script>
    function get_types(news_type){
        switch(news_type)
        {
            case 'International':
                 $('.type_show:eq(0)').hide();
                 $('.type_show:eq(3)').hide();
            break;
            case 'National':
                $('.type_show:eq(0)').show();
                $('.type_show:eq(1)').text('National');
                $('.type_show:eq(2)').html('<input type="text" class="form-control" name="news_info" value="India" readonly>');
                $('.type_show:eq(3)').hide();
                $('.type_show:eq(4)').html('');
            break;
            case'State':
                $('.type_show:eq(1)').text('Select State');
               $.post("<?= base_url('Auth/Backend/News_Desp/news_type')  ?>",{'type':news_type})
                 .done(function(data){
                    console.log(data);
                   $('.type_show:eq(2)').html(data);
                   $('.type_show:eq(3)').hide();
                   $('.type_show:eq(4)').html('');
                });
            break;
            case'City':
                $('.type_show:eq(1)').text('Select State');
                $.post("<?= base_url('Auth/Backend/News_Desp/news_type')  ?>",{'type':news_type})
                 .done(function(data){
                    $('.type_show:eq(0)').show();
                    $('.type_show:eq(2)').html(data);
                    $('.type_show:eq(3)').show();
                    $('.type_show:eq(4)').html('');
                });
            break;
        }
     }
        function state_select(id){
        $.post("<?= base_url('Auth/Backend/News_Desp/selected_state')  ?>",{'state_id':id})
         .done(function(data){
            $('.type_show:eq(4)').html(data);
        });
    }
    </script>
    <script>
        function get_subcategory(id){
            // alert(id);
        $.post("<?= base_url('Auth/Backend/News_Desp/get_subcategory')  ?>",{'cat_id':id})
         .done(function(data){
            $('#subcategory').html(data);
        });
     }
    </script>

<!-- <script>
   $('.selected_type').change(function(){
        if(this.value == 'Image')
        {
            $('.text_type').text('Image');
            $('.video_type').hide();
            $('.tube:eq(0)').show().attr('required',true);
            $('.tube:eq(1)').hide().removeAttr('required',true);
        }else{
            $('.text_type').text('Video');
            $('.video_type').show();
            //                                                    alert($('.vtype').val());
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

            }
            });

</script> -->
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