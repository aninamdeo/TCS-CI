<section class="single-news-header pageheaderwithtabs">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4>वीडियो गैलरी</h4>
            </div>
            <div class="col-xs-12">
                <div class="responsive-tabs">
                    <ul class="header-tabs">
                         <li class="active"><a href="<?= base_url('Backend/video_gallery')?>">वीडियो गैलरी</a></li>
                        <li><a href="<?= base_url('Backend/photo_gallery')?>">फोटो गैलरी</a></li>
                           <?php $i=1; foreach($category_data as $cat){ ?>
                              <li ><a href="<?= base_url('Backend/c_wise/'.$cat->id)?>"><?= $cat->cat_name_hindi ?></a></li>
                         <?php $i++; } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-gallery page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <?php foreach ($video_gallery as $video) {?>
                <div class="newsbox">
                    <a href="<?= base_url('Backend/single_video/'.$video->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$video->title_share)))?>">
                        <img src="<?= base_url($video->image)?>" alt="" />
                        <div class="play-btn">
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                    <h6><a href="<?= base_url('Backend/single_video/'.$video->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$video->title_share)))?>"><span class="web-color"><?= $video->title ?></span> <?= $video->title_hindi ?></a></h6>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>