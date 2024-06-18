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
                <h4>फोटो गैलरी</h4>
            </div>
        </div>
    </div>
</section>
  
   <section class="single-news-header pageheaderwithtabs hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="responsive-tabs">
                    <ul class="header-tabs">
                        <li class="active">
                            <a href="<?= base_url('Web/photo_gallery')?>">फोटो गैलरी</a>
                        </li>
                        <li>
                            <a href="<?= base_url('Web/video_gallery')?>">वीडियो गैलरी</a>
                        </li>
<!--
                        <?php $i=1; foreach($category_data as $cat){ ?>
                        <li><a href="<?= base_url($cat->cat_name)?>"><?= $cat->cat_name_hindi ?></a>
                        </li>
                        <?php $i++; } ?>
-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="video-gallery page">
    <div class="container">
        <div class="row">
            <?php foreach ($photo_gallery as $gallery) {?>
            <div class="col-sm-4">
                <div class="newsbox">
                    <a href="<?= base_url('Photos/news/'.$gallery->link)?>">
                        <img src="<?= base_url($gallery->image)?>" alt="" />
                    </a>
                    <h5><a href="<?= base_url('Photos/news/'.$gallery->link)?>"><span class="web-color"><?= $gallery->title?></span> <?= $gallery->title_hindi ?></a></h5>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
