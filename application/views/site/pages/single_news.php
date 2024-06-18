<section class="single-news-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4><?= ($category->cat_name_hindi) ? $category->cat_name_hindi : 'देश'?></h4>
            </div>
        </div>
    </div>
</section>

<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-xs-12">
                <h5 class="front-news-heading">
                    <span class="web-color"><?= $news_detail->area_hindi ?> </span> <?= strip_tags($news_detail->title_hindi) ?>
                </h5>
            </div>
            <div class="clearfix"></div>
             <?php if($news_detail->video != ''){
                if($news_detail->video_type == 'Video'){ ?>
                     <video width="100%" height="300px" controls autoplay>
                        <source src="<?= base_url($news_detail->video)?>" type="video/mp4">
                    </video>
                <?php }elseif ($news_detail->video_type == 'Youtube') {
                        echo $news_detail->video;
                  } }else{ ?>
                       <a  class="img-zoom">
                        <img src="<?= base_url($news_detail->image)?>" class="img-responsive news-img" alt="">
                        <div class="news-img-tag"><?= strip_tags($news_detail->area_hindi) ?></div>
                        <div class="clearfix"></div>
                     </a>
                <?php } ?>
             
            <div class="col-xs-12">
                <p><b><?= $basic_details->name ?> :</b> <span class="text-gray"><?= date('M d,Y',strtotime($news_detail->date)) ?>, <?= $news_detail->time ?> IST</span></p>
                <p><?= $news_detail->content_hindi ?></p>
                <div class="text-right">
                    <a href="<?= base_url('Backend/comments/'.$news_detail->id)?>"><i class="fa fa-comment"></i> Comment (<?= $comments_count ?>)</a> &nbsp;|&nbsp;
                    <!-- <a href="#"><i class="fa fa-bookmark"></i> Bookmark</a> &nbsp;|&nbsp; -->
                    <a href="javascript:void()" class="sharetoggle"><i class="fa fa-share"></i> Share</a>
                    <ul class="custom-social" style="display:none;">
                        <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('Backend/single_news/'.$news_detail->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news_detail->title))) ?>"><i class="fa fa-facebook"></i></a></li>
                        <!-- <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                        <li class="whatsapp"><a href="whatsapp://send?text=<?= base_url('Backend/single_news/'.$news_detail->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news_detail->title)))?>"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                    <div class="clearfix"></div> 
                </div>
                <hr />
                <h4>Recomended News</h4>
                <?php foreach ($news_data as $news){ ?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>">
                            <img class="media-object" src="<?= base_url($news->image)?>" alt="...">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h6>
                            <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>" class="pull-left"><span class="web-color"><?= $news->area_hindi?> </span> <?= strip_tags($news->title_hindi)?></a>
                            <!-- <a href="#" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                            <div class="clearfix"></div>
                        </h6>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</section>

<div style="height:36px;"></div>
<ul class="singlenewsbottom-social">
    <li class="home"><a href="<?= base_url('') ?>"><i class="fa fa-home"></i></a></li>
    <li class="facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('Backend/single_news/'.$news_detail->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news_detail->title))) ?>"><i class="fa fa-facebook"></i></a>
    </li>
    <li class="whatsapp"><a href="whatsapp://send?text=<?= base_url('Backend/single_news/'.$news_detail->id.'/'.preg_replace('/-+/','-',preg_replace('/[^A-Za-z0-9\-]/','-',$news_detail->title)))?>"><i class="fa fa-whatsapp"></i></a></li>
    <li class="play"><a href="https://play.google.com/store/apps/details?id=crisil.app.android.SevenINews"><!-- <img src="<?= base_url() ?>assets/images/playstore.png" class="img-responsive" alt="" s> --><i class="fa fa-play"></i></a></li>
    <li class="youtube"><a href="https://www.youtube.com/channel/UCfaR8SX5u_pI9aFGY4PZZ9w"><i class="fa fa-youtube-play"></i></a></li>
</ul>
