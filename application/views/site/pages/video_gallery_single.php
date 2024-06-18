<section class="videogallery-single">
    <video width="100%" controls autoplay>
        <source src="<?= base_url($video->video)?>" type="video/mp4">
    </video>
</section>
<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-xs-12">
                <h5 class="front-news-heading">
                    <a href="#" class="pull-left"><span class="web-color"><?= $video->title ?> </span><?= $video->title_hindi ?> </a>
                    <a href="javascript:void()" class="pull-right sharetoggle"><i class="fa fa-share"></i></a>
                    <ul class="custom-social" style="display:none;">
                        <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('Backend/single_video/'.$video->id.'/'.preg_replace('/-+/','-',preg_replace('/[^A-Za-z0-9\-]/','-',$video->title_share))) ?>"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="whatsapp hidden-xs"><a target="_blank" href="https://web.whatsapp.com/send?text=<?= base_url( $news_link)?>"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="whatsapp visible-xs"><a target="_blank" href="whatsapp://send?text=<?= base_url( $news_link) ?>"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </h5>
                 <p><?= $video->short_description ?></p>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12">
                <h4>Related Videos</h4>
                <?php foreach ($video_data as $data) { ?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url('Backend/single_video/'.$data->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$data->title_share)))?>">
                            <img class="media-object" src="<?= base_url($data->image)?>" alt="...">
                            <div class="play-btn">
                                <i class="fa fa-play"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h6>
                            <a href="<?= base_url('Backend/single_video/'.$data->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$data->title_share)))?>" class="pull-left"><span class="web-color"><?= $data->title ?> </span> <?= $data->title_hindi ?></a>
                            <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a>
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


<div style="height:36px;" class="visible-xs"></div>
<ul class="singlenewsbottom-social visible-xs">
    <li class="home"><a href="<?= base_url('') ?>"><i class="fa fa-home"></i></a></li>
    <li class="facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url( $news_link) ?>"><i class="fa fa-facebook"></i></a>
    </li>
    <li class="whatsapp"><a href="whatsapp://send?text=<?= base_url( $news_link) ?>"><i class="fa fa-whatsapp"></i></a></li>
    <li class="play"><a href="https://play.google.com/store/apps/details?id=crisil.app.android.SevenINews">
            <!-- <img src="<?= base_url() ?>assets/images/playstore.png" class="img-responsive" alt="" s> --><i class="fa fa-play"></i></a></li>
    <li class="youtube"><a href="https://www.youtube.com/channel/UCfaR8SX5u_pI9aFGY4PZZ9w"><i class="fa fa-youtube-play"></i></a></li>
</ul>
