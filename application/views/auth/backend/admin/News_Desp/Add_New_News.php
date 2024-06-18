<section id="striped-label-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="striped-label-layout-basic">Add More News</h4>
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
                                    <script>
                                    $(document).ready(function(){
                                        $('.selected_type').click(function(){
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
                                        <td><input type="radio" class="selected_type" name="type" value="Image">Image
                                        <input type="radio" class="selected_type" name="type" value="Video"> Video
                                        </td>
                                    </tr>
                                    <tr class="video_type" style="display:none;">
                                        <th>Video Type</th>
                                        <td>
                                            <input type="radio" class="vtype" name="vtype" value="Youtube"> Youtube
                                            <input type="radio" name="vtype" class="vtype" value="Video"> Video 
                                        </td>
                                    </tr>
                                     <tr>
                                        <th class="text_type">Image/Video</th>
                                        <td><input type="file" name="image" accept="video/*" class="form-control-static tube" required />
                                            <input type="text" style="display:none;" class="form-control tube" name="image">
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Status</th>
                                        <td>
                                            <input type="radio" name="status" value="Enable" checked>Enable
                                            <input type="radio" name="status" value="Disable"> Disable
                                        </td>    
                                     </tr> 
                                    <tr>
                                        <th >Date</th>
                                        <td><input type="date" name="date" value="<?= date("Y-m-d") ;?>" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <td><input type="text" name="time" value="<?= date("h:i:a") ;?>" class="form-control"></td>
                                    </tr>
                                     <tr>
                                        <th>Area(English)</th>
                                        <td><input type="text" name="area" class="form-control" ></td>
                                    </tr>
                                     <tr>
                                        <th>Title(English)</th>
                                        <td><textarea name="title" class="form-control"  ></textarea></td>
                                    </tr> 
                                     <tr>
                                        <th>Content(English)</th>
                                        <td>
                                            <textarea name="content" id="cktext" cols="30" rows="10" ></textarea>
                                        </td>
                                    </tr>
                                     <tr>
                                        <th>Area(Hindi)</th>
                                        <td><input type="text" name="area_hindi" class="form-control" ></td>
                                    </tr>
                                    <tr>
                                        <th>Title(Hindi)</th>
                                        <td> <textarea name="title_hindi" class="form-control"  ></textarea></td>
                                    </tr> 
                                     <tr>
                                        <th>Content(Hindi)</th>
                                        <td>
                                            <textarea name="content_hindi" id="cktext1" cols="30" rows="10" ></textarea>
                                        </td>
                                    </tr>


                                     <!-- <tr>
                                        <th>Area(Urdu)</th>
                                        <td><input type="text" name="area_urdu" class="form-control" ></td>
                                    </tr>
                                     <tr>
                                        <th>Title(Urdu)</th>
                                        <td>
                                        <textarea name="title_urdu" class="form-control"  ></textarea>
                                        </td>
                                    </tr> 
                                     <tr>
                                        <th>Content(Urdu)</th>
                                        <td>
                                            <textarea name="content_urdu" id="cktext2" cols="30" rows="10" ></textarea>
                                        </td>
                                    </tr> -->

                                    
                                </table>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-lg btn-primary" formaction="<?= base_url();?>Admin/News_Desp/insert_new_news/complete/<?= $news_id;?>">
                                    <i class="icon-check2"></i> Save
                                </button>
                                <button type="submit" class="btn btn-lg btn-primary" formaction="<?= base_url();?>Admin/News_Desp/insert_new_news/addmore/<?= $news_id;?>">
                                    <i class="icon-check2"></i> Add More
                                </button>
                                <?php if($this->session->flashdata('msg') !='')
                                        { echo '<script>
                                                    $(document).ready(function(){
                                                        swal("Successfully Add!"," News Details !","success")
                                                    });
                                                </script>';
                                        }?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
