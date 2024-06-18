<div class="content-detached content-right">
    <div class="content-body">
        <section id="descriptioin" class="card">
            <div class="card-header">
                  <a  class="btn btn-primary pull-right" href="<?= base_url('Auth/Backend/Category/news/'.$cid) ?>"> View News Details </a>
                <h4 class="card-title"><i class="ft-user"></i> Add News Details</h4>
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
                                        <?php
                                           foreach ($category as $cat) {?>
                                            <option <?= ($cid==$cat->id) ? 'selected':'' ?> value="<?= $cat->id?>"><?= $cat->cat_name_hindi   ?> (<?= $cat->type?>)</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Sub Category Name :</label>
                                           <select class="form-control" name="subcategory" id="subcategory">
                                        <option value="">Select Sub Category</option>
                                        
                                        </select>
                                    </div>
                                <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Top News :</label>
                                        <select class="form-control" name="top_news" >
                                            <option value="Yes" >Yes</option>
                                            <option value="No" selected="">No</option>
                                        </select>
                                 </div>
                                <div class="col-md-6" >
                                    <label class="label-control text-danger" for="projectinput1">Image*</label>
                                      <input type="file" name="image"  class="form-control " accept="image/*" required="">
                                  
                                </div>
                                <div class="col-md-6 video_type" >
                                    <label class="label-control" for="projectinput1">Video Type :</label>
                                    <select name="vtype" class=" vtype form-control" id="">
                                        <option value="">Select Type</option>
                                        <option value="Video">Video</option>
                                        <option value="Youtube">Youtube</option>
                                    </select>
                                </div>
                                   <div class="col-md-6" >
                                    <label class="label-control text_type" for="projectinput1">Upload Video</label>
                                   <input type="file" name="video"  class="form-control tube" accept="video/mp4" >
                                   <input type="text" style="display:none;"  name="video_link" class="form-control tube">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Date* :</label>
                                    <input type="date" id="projectinput2" name="date" class="form-control" value="<?= date("Y-m-d") ;?>" required="">
                                </div>
                                <div class="col-md-6">
                                    <label class="label-control text-danger" for="projectinput1">Time* :</label>
                                    <input type="text" id="projectinput2" name="time" class="form-control" value="<?= date("h:i:a") ;?>" required="">
                                </div>
                                 <div class="col-md-6">
                                    <label class="label-control" for="projectinput1">Highlight Starting Word : </label>
                                    <input type="text" id="projectinput2" name="area_hindi" class="form-control" placeholder="New Delhi">
                                </div>
                                <div class="col-md-6">
                                <label class="label-control " for="projectinput1">Status :</label>
                                    <br>
                                    <input type="radio" id="Active" name="status" checked value="Enabled">
                                    <label for="Active"> Enabled</label>
                                    <input type="radio"  id="Inactive" name="status" value="Disabled">
                                    <label for="Inactive">Disabled</label>
                                </div>
                                <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Title(Hindi) :</label>
                                    <textarea class="form-control" name="title_hindi" id="ckeditor"></textarea>
                                </div>
                                 <div class="col-md-12">
                                    <label class="label-control text-danger" for="projectinput1">Title* (English)  : </label>
                                     <textarea name="news_link" class="form-control" required="" style="resize: none;"></textarea>
                                </div>
                                <div class="col-md-12">
                                  <label class="label-control" for="projectinput1">Content :</label>
                                  <textarea class="form-control" name="content_hindi" id="ckeditor2"></textarea>
                                </div>
                             <!--    <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Ordering :</label>
                                    <input type="number" id="projectinput2" name="ordering" class="form-control">
                                </div> -->
                                  <div class="col-md-12">
                                    <label class="label-control" for="projectinput1">Meta Title  : </label>
                                     <textarea name="title_share" class="form-control" required="" style="resize: none;"></textarea>
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
                                    <button type="submit" class="btn btn-primary cus-btn" formaction="<?= base_url('Auth/Backend/News_Desp/insert_news_desp') ?>">
                                        Save
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

<script>
   // $(document).ready(function(){
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
// })  ;  
</script>