
<section class="single-news-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url('Backend/single_news/'.$news_id)?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4>Comment (<?= count($comments_data)?>)</h4>
            </div>
        </div>
    </div>
</section>

<section class="comment">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <?php if($comments_data == NULL){ ?>
            <h4 class="media-heading pull-left">No Comments | <small>Be the one to comment first</small></h4>
            <?php } ?>
               <?php foreach ($comments_data as $comment) {
                     $subcomments_data= $this->Query->select('*','news_comments',['news_id'=>$news_id,'comment_id'=>$comment->id,'type'=>'Sub_Comment','status'=>'Active'],'result');
                     $user2= $this->Query->select('*','user',['id'=>$comment->user_id],'row');
                   ?>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading pull-left"><?= $user2->name ?> | <small><!-- 16 मिनट पहले -->
                        <?= date('d-m-y h:i a',strtotime($comment->date))?></small></h4>
                        <div class="dropdown pull-right">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Report Abuse</a></li>
                            </ul> -->
                        </div>
                        <div class="clearfix"></div>
                        <p><?= $comment->comment ?></p>
                        <div class="clearfix"></div>
                       <a href="javascript:void(0)" onclick="subcomnt_form('<?= $news_id?>','<?= $comment->id ?>')" class="link pull-left"><i class="fa fa-comment"></i> Reply</a>
                        <!-- <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a> -->
                        <div class="clearfix"></div>
                       <?php if($subcomments_data){
                          foreach ($subcomments_data as $subcomnt ){
                             $user1= $this->Query->select('*','user',['id'=>$subcomnt->user_id],'row');
                           ?>
                            <div class="media reply">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="<?= base_url()?>assets/images/user.jpeg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?= $user1->name ?> | <small> <?= date('d-m-y h:i a',strtotime($subcomnt->date))?></small></h4>
                                    <p><?= $subcomnt->comment ?></p>
                                   <!--  <a href="#" class="link pull-left"><i class="fa fa-comment"></i> Reply</a>
                                    <a href="#" class="pull-right"><i class="fa fa-thumbs-o-up"></i></a> -->
                                </div>
                            </div>
                      <?php } }?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="comment-input">
    <div class="container">
        <div class="row">
        <?php if($user != NULL){ if($user->verification_status == 'Verified') {  ?>
            <div class="col-xs-12">
                  <form action="<?= base_url('Backend/news_comment/'.$news_id)?>" id="main_comment" method="post">
                    <div class="input-group">
                        <input type="text" name="comment" class="form-control" placeholder="Write your comment..." required="">
                        <span class="input-group-btn">
                            <button class="btn btn-default web-btn" type="submit"><i class="fa fa-angle-right"></i></button>
                        </span>
                    </div>
                </form>
                 <form action="" id="sub_comment" style="display: none;" method="post">
                    <div class="input-group">
                        <input type="text" name="comment" class="form-control" placeholder="Write your comment reply here..." required="">
                        <span class="input-group-btn">
                            <button class="btn btn-default web-btn" type="submit"><i class="fa fa-angle-right"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <?php }else{ ?>
                <a class="btn btn-default btn-lg web-btn" style="width: 100%"  href="<?= base_url('Backend/mobile_verification') ?>">First Verify Your Mobile Number</a>
            <?php }}else{ ?>
            <div class="col-md-12 col-sm-12">        
                <a class="btn btn-default btn-lg web-btn" style="width: 100%" href="<?= base_url('Backend/login') ?>">Login</a>
            </div>  
             <?php } ?>
        </div>
    </div>
</section>


