<section class="single-news-header pageheaderwithtabs">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4>फोटो गैलरी</h4>
            </div>
            <div class="col-xs-12">
                <div class="responsive-tabs">
                    <ul class="header-tabs">
                         
                        <li class="active">
                           <a href="<?= base_url('Backend/photo_gallery')?>">फोटो गैलरी</a>
                        </li>
                         <li >
                            <a href="<?= base_url('Backend/video_gallery')?>">वीडियो गैलरी</a>
                          </li>
                           <?php $i=1; foreach($category_data as $cat){ ?>
                              <li ><a href="<?= base_url('Backend/c_wise/'.$cat->id)?>"><?= $cat->cat_name_hindi ?></a>
                              </li>
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
             <?php foreach ($photo_gallery as $gallery) {?>
                <div class="newsbox">
                    <a href="<?= base_url('Backend/single_photo/'.$gallery->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$gallery->title_share)))?>">
                        <img src="<?= base_url($gallery->image)?>" alt="" />
                    </a>
                    <h6><a href="<?= base_url('Backend/single_photo/'.$gallery->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$gallery->title_share)))?>"><span class="web-color"><?= $gallery->title?></span> <?= $gallery->title_hindi ?></a></h6>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>



