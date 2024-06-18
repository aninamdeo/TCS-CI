<style>
    @media (max-width:767px) {
        .topmainwrapper {
            display: none;
        }

        footer {
            display: none;
        }
    }

</style>
<section class="single-news-header visible-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url() ?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4><?= $category->cat_name_hindi?></h4>
            </div>
        </div>
    </div>
</section>

<section class="front-news singlenews">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="clearfix"></div>
                <h3 class="front-news-heading">
                    <span class="web-color"><?= $news_detail->area_hindi ?> </span> <?= strip_tags($news_detail->title_hindi) ?>
                </h3>
                <div class="clearfix"></div>
                <?php 
                    if($news_detail->sub_category_link!=""){
                         $news_link = $news_detail->cat_name.'/'.$news_detail->sub_category_link.'/news/'.$news_detail->news_link;
                    }elseif($news_detail->cat_name!=""){
                           $news_link = $news_detail->cat_name.'/news/'.$news_detail->news_link;
                    }else{
                          $news_link = 'no-category/news/'.$news_detail->news_link;
                    }
                if($news_detail->video != ''){
                   if($news_detail->video_type == 'Video'){ ?>
                <video width="100%" height="300px" controls autoplay>
                    <source src="<?= base_url($news_detail->video)?>" type="video/mp4">
                </video>
                <?php }elseif ($news_detail->video_type == 'Youtube') {
                        echo $news_detail->video;
                   } } else{ ?>
                <a class="img-zoom cropimg">
                    <img src="<?= base_url($news_detail->image)?>" class="img-responsive news-img" alt="">
                </a>
                <?php } ?>
                <style>
                    .cropimg:before {
                        background: url('<?= base_url($news_detail->image)?>');
                        background-size: cover;
                        background-position: center;
                        height: 300px;
                    }

                </style>
                <div class="clearfix"></div>
                <br />
                <p><b><?= $basic_details->name ?> :</b> <span class="text-gray"><?= date('M d,Y',strtotime($news_detail->date)) ?> <?= $news_detail->time ?> IST</span></p>
                <p><?= $news_detail->content_hindi ?></p>
                <div class="text-right">
                    <a class="commentbtn"><i class="fa fa-comment"></i> Comment (<?= $comments_count ?>)</a> &nbsp;|&nbsp;
                    <!-- <a href="#"><i class="fa fa-bookmark"></i> Bookmark</a> &nbsp;|&nbsp; -->
                    <a href="javascript:void()" class="sharetoggle"><i class="fa fa-share"></i> Share</a>
                    <ul class="custom-social" style="display:none;">
                        <li class="facebook"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url( $news_link) ?>"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="whatsapp hidden-xs"><a target="_blank" href="https://web.whatsapp.com/send?text=<?= base_url( $news_link)?>"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="whatsapp visible-xs"><a target="_blank" href="whatsapp://send?text=<?= base_url( $news_link) ?>"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                    <div class="clearfix"></div><br />
                </div>
                <div class="comment-box" style="display:none;">
                    <form method="post" class="text-right">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" placeholder="Write your comment..." required=""></textarea>
                        </div>
                        <?php if($this->session->userdata('user_id')){ ?>
                        <input type="submit" formaction="<?= base_url('Web/news_comment/'.$news_detail->id)?>" class="btn btn-default web-btn" value="Post" />
                        <?php }else{ ?>
                        <input type="button" class="btn btn-default web-btn" data-toggle="modal" data-target="#loginModal" value="Login" />
                        <?php } ?>
                    </form>
                    <div class="comment">
                        <?php if($comments_data != NULL){ 
                         foreach ($comments_data as $comment) {
                            $subcomments_data= $this->Query->select('*','news_comments',['news_id'=>$comment->news_id,'comment_id'=>$comment->id,'type'=>'Sub_Comment','status'=>'Active'],'result');
                            $user2= $this->Query->select('*','user',['id'=>$comment->user_id],'row');
                        ?>
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading pull-left"><?= $user2->name ?> | <small><?= date('d-m-y h:i a',strtotime($comment->date))?></small></h4>
                                <!--  <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Report Abuse</a></li>
                                    </ul>
                                </div> -->
                                <div class="clearfix"></div>
                                <p><?= $comment->comment ?></p>
                                <div class="clearfix"></div>
                                <a href="javascript:void(0)" class="link pull-left subcommentbtn"><i class="fa fa-comment"></i> Reply</a>
                                <div class="subcomment-box row" style="display:none;">
                                    <form method="post" class="text-right">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" placeholder="Write your comment..." required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <?php if($this->session->userdata('user_id')){ ?>
                                            <input type="submit" formaction="<?= base_url('Web/news_sub_comment/'.$news_detail->id.'/'.$comment->id)?>" class="btn btn-default web-btn" value="Post" />
                                            <?php }else{ ?>
                                            <input type="button" class="btn btn-sm btn-default web-btn" data-toggle="modal" data-target="#loginModal" value="Login" />
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a> -->
                                <div class="clearfix"></div>
                                <?php if($subcomments_data){
                              foreach ($subcomments_data as $subcomnt ){
                              $user1= $this->Query->select('*','user',['id'=>$subcomnt->user_id],'row');  ?>
                                <div class="media reply">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading pull-left"><?= ($user1) ? $user1->name : 'Admin' ?> | <small> <?= date('d-m-y h:i a',strtotime($subcomnt->date))?></small></h4>
                                        <div class="clearfix"></div>
                                        <p><?= $subcomnt->comment ?></p>
                                        <!-- <a href="#" class="link pull-left"><i class="fa fa-comment"></i> Reply</a> -->
                                        <!-- <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a> -->
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <?php } }?>
                        <!--     <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading pull-left">User Name | <small>16 मिनट पहले</small></h4>
                                <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Report Abuse</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="clearfix"></div>
                                <a href="#" class="link pull-left"><i class="fa fa-comment"></i> Reply</a>
                                <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div> -->

                        <!--  <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading pull-left">User Name | <small>16 मिनट पहले</small></h4>
                                <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Report Abuse</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="clearfix"></div>
                                <a href="#" class="link pull-left"><i class="fa fa-comment"></i> Reply</a>
                                <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a>
                                <div class="clearfix"></div>

                                <div class="media reply">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading pull-left">User Name | <small>16 मिनट पहले</small></h4>
                                        <div class="clearfix"></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <a href="#" class="link pull-left"><i class="fa fa-comment"></i> Reply</a>
                                        <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <h4>Recomended News</h4>
                <?php
                 foreach ($news_data as $news1){ 
                    if($news1->sub_category_link!=""){
                         $news1_link = $news1->cat_name.'/'.$news1->sub_category_link.'/news/'.$news1->news_link;
                    }elseif($news1->cat_name!=""){
                           $news1_link = $news1->cat_name.'/news/'.$news1->news_link;
                    }else{
                          $news1_link = 'no-category/news/'.$news1->news_link;
                    }
                    ?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url( $news1_link)?>">
                            <img class="media-object img-rounded" src="<?= base_url($news1->image)?>" alt="...">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h5>
                            <a href="<?= base_url( $news1_link)?>" class="pull-left"><span class="web-color"><?= $news1->area_hindi?> </span> <?= strip_tags($news1->title_hindi)?></a>
                            <div class="clearfix"></div>
                        </h5>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>


<div style="height:36px;" class="visible-xs"></div>
<ul class="singlenewsbottom-social visible-xs">
    <li class="home"><a href="<?= base_url('') ?>"><i class="fa fa-home"></i></a></li>
    <li class="facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url( $news_link) ?>"><i class="fa fa-facebook"></i></a>
    </li>
    <li class="whatsapp"><a href="whatsapp://send?text=<?= base_url( $news_link) ?>"><i class="fa fa-whatsapp"></i></a></li>
    <li class="play"><a href="#">
            <!-- <img src="<?= base_url() ?>assets/images/playstore.png" class="img-responsive" alt="" s> --><i class="fa fa-play"></i></a></li>
    <li class="youtube"><a href="https://www.youtube.com/channel/UCfaR8SX5u_pI9aFGY4PZZ9w"><i class="fa fa-youtube-play"></i></a></li>
</ul>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm pt-10-percent" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Log in</h3>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Web/user_login/'.$news_detail->id)?>" method="post">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Full Name" required />
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" minlength="10" maxlength="10" onkeypress="return event.charCode >=48 && event.charCode <=57" name="contact" class="form-control" placeholder="Your Mobile Number" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        <!-- <a href="#">Forgot your password?</a> -->
                    </div>
                    <div class="text-right">
                        <input type="submit" class="btn btn-default web-btn" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
