<section id="striped-label-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">Edit Sub News</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form form-horizontal striped-labels form-bordered" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <table class = 'table table-bordered'>
                                   <?php foreach($sub_news as $data) {?>
                                    <script>
                                        $(document).ready(function(){
                                                if( $('.selected_type:checked').val() == 'Image')
                                                    {
                                                        $('.text_type').text('Image');
                                                        $('.video_type').hide();
                                                        $('.vtype').prop("checked", false);
                                                        $('.tube:eq(0)').show().removeAttr('required',true);
                                                        $('.tube:eq(1)').hide().removeAttr('required',true);
                                                    }else{
                                                        $('.text_type').text('Video');
                                                        $('.video_type').show();
    //                                                    alert($('.vtype').val());
                                                            if($('.vtype:checked').val() == 'Youtube')
                                                            {
                                                                $('.tube:eq(1)').show().attr('required',true);
                                                                $('.tube:eq(0)').hide().removeAttr('required',true);
                                                            }else if(this.value == 'Video'){
                                                                $('.tube:eq(0)').show().attr('required',true);
                                                                $('.tube:eq(1)').hide().removeAttr('required',true);
                                                            }
                                                        
                                                    }
                                            $('.selected_type').click(function(){
                                                if(this.value == 'Image')
                                                    {
                                                        $('.text_type').text('Image');
                                                        $('.video_type').hide();
                                                        $('.vtype').prop("checked", false);
                                                        $('.tube:eq(0)').show().removeAttr('required',true);
                                                        $('.tube:eq(1)').hide().removeAttr('required',true);
                                                    }else{
                                                        $('.text_type').text('Video');
                                                        $('.video_type').show();
    //                                                    alert($('.vtype').val());
                                                        $('.vtype').click(function(){
                                                            if(this.value == 'Youtube')
                                                            {
                                                                
                                                                $('.tube:eq(1)').show().attr('required',true);
                                                                $('.tube:eq(0)').hide().removeAttr('required',true);
                                                                
                                                            }else if(this.value == 'Video'){
                                                                $('.tube:eq(0)').show().attr('required',true);
                                                                $('.tube:eq(1)').hide().removeAttr('required',true);
                                                            }
                                                        })
                                                        
                                                    }
                                            });
                                        })  ;  
                                    </script>
                                    <tr>
                                        <th>Select Type </th>
                                        <td><input type="radio" class="selected_type" name="type" <?= ($data->type == 'Image') ? 'checked' : '' ?> value="Image">Image
                                        <input type="radio" class="selected_type" name="type" <?= ($data->type == 'Video') ? 'checked' : '' ?> value="Video"> Video
                                        </td>
                                    </tr>
                                    <tr class="video_type" style="display:none;">
                                        <th>Video Type</th>
                                        <td>
                                            <input type="radio" class="vtype" name="vtype" <?= ($data->video_type == 'Youtube') ? 'checked' : '' ?> value="Youtube"> Youtube
                                            <input type="radio" name="vtype" class="vtype" <?= ($data->video_type == 'Video') ? 'checked' : '' ?> value="Video"> Video 
                                        </td>
                                    </tr>
                                     <tr>
                                        <th class="text_type">Image/Video</th>
                                        <td>
                                            <input type="file" name="image" accept="video/*" class="form-control-static tube"  />
                                            <input type="text" style="display:none;" class="form-control tube" name="image">
                                            <input type="hidden" name="old_image" value="<?= $data->image; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image/Video</th>
                                        <td>
                                            <?php  if($data->type == 'Image'){?>
                                            <img src="<?= base_url() ?><?= $data->image; ?>" class="img-responsive" width="100px"  /><br>
                                            <?php   }else{
                                                    if($data->video_type == 'Youtube'){?>
                                                <?= $data->image; ?>
                                                <?php    }elseif($data->video_type == 'Video'){ ?>
                                                     <video width="100%" controls>
                                                        <source src="<?= base_url(); ?><?= $data->image; ?>" >
                                                    </video>
                                                <?php       } ?>
                                            <?php    } ?>
                                            
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Status</th>
                                        <td>
                                            <input type="radio" name="status" <?php if($data->status=='Enable'){ echo 'checked';} ?>  value="Enable"> Enable
                                            <input type="radio" name="status" <?php if($data->status=='Disable'){ echo 'checked';} ?> value="Disable"> Disable
                                        </td>    
                                    </tr> 
                                    <tr>
                                        <th>Date</th>
                                        <td><input type="date" name="date" value="<?= $data->date; ?>"class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <td><input type="text" name="time" value="<?= $data->time; ?>" class="form-control"></td>
                                    </tr>
                                     <tr>
                                        <th>Area(English)</th>
                                        <td>
                                             <input type="text" name="area" value="<?= $data->area; ?>" class="form-control" >
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Title(English)</th>
                                        <td>
                                         <textarea name="title"  class="form-control" ><?= $data->title; ?></textarea>
                                      </td>
                                    </tr>
                                     <tr>
                                        <th>Content(English)</th>
                                        <td>
                                            <textarea name="content" id="cktext" cols="30" rows="10" ><?= $data->content; ?></textarea>
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Area(Hindi)</th>
                                        <td><input type="text" name="area_hindi" value="<?= $data->area_hindi; ?>"   class="form-control" ></td>
                                    </tr>
                                    <tr>
                                        <th>Title(Hindi)</th>
                                        <td> <textarea name="title_hindi"  class="form-control" ><?= $data->title_hindi; ?></textarea></td>
                                    </tr> 
                                     <tr>
                                        <th>Content(Hindi)</th>
                                        <td>
                                            <textarea name="content_hindi" id="cktext1" cols="30" rows="10" ><?= $data->content_hindi; ?></textarea>
                                        </td>
                                    </tr>
                                    <!--  <tr>
                                        <th>Area(Urdu)</th>
                                        <td><input type="text" name="area_urdu" value="<?= $data->area_urdu; ?>"  class="form-control" ></td>
                                    </tr>
                                     <tr>
                                        <th>Title(Urdu)</th>
                                        <td>
                                         <textarea name="title_urdu"  class="form-control" ><?= $data->title_urdu; ?></textarea></td>
                                    </tr> 
                                     <tr>
                                        <th>Content(Urdu)</th>
                                        <td>
                                            <textarea name="content_urdu" id="cktext2" cols="30" rows="10" ><?= $data->content_urdu; ?></textarea>
                                        </td>
                                    </tr> -->
                                    
                                    <?php } ?>
                                    <tr>
                                        <th></th>
                                        <td class="text-right"> 
                                     <button type="submit" class="btn btn-outline-primary" formaction="<?= base_url('Admin/News_Desp/update_sub_news/' . $data->id) ?>">Save changes</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $("#category").change(function(){
           //alert(this.value);
            $.post("<?= base_url('Admin/Form_Details/cat_subcat_data')  ?>",{'cat_id':this.value})
             .done(function(data){
                //alert(data);
                 $("#subcategory").html(data);
            });
        });
    });
</script>