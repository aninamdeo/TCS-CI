<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h5 class="front-news-heading">
                    <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                    <!-- <a href="#" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                    <div class="clearfix"></div>
                </h5>
                <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>">
                    <img src="<?= base_url($news->image) ?>" class="img-responsive news-img" alt=""></a>
                <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>">
                    <ul class="newsul">
                        <?= substr($news->content_hindi,0,600) ?>
                    </ul>
                </a>
            </div>

            <div class="clearfix"></div>
            <div class="col-xs-12">
                <?php foreach ($news_data as $news1) {?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url('Backend/single_news/'.$news1->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news1->title)))?>">
                            <img class="media-object" src="<?= base_url($news1->image) ?>" alt="...">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h6>
                            <a href="<?= base_url('Backend/single_news/'.$news1->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news1->title)))?>" class="pull-left"><span class="web-color"> <?= $news1->area_hindi ?> /</span> <?= strip_tags($news1->title_hindi) ?></a>
                            <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                            <div class="clearfix"></div>
                        </h6>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="blue-box">
                    <h5><a href="<?= base_url('Backend/c_wise/27')?>">देश-दुनिया की 10 सबसे रोचक खबरें <span class="fa fa-angle-double-right pull-right"></span></a></h5>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $n=1; foreach ($interesting_data as $interes) {?>
                            <div class="item <?= ($n==1) ? 'active' : ''?>">
                                <a href="<?= base_url('Backend/single_news/'.$interes->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$interes->title)))?>">
                                    <img src="<?= base_url($interes->image)?>" alt="...">
                                    <div class="carousel-caption">
                                        <span class="web-color2"><?= $interes->title ?></span> <?= strip_tags($interes->title_hindi) ?>
                                    </div>
                                </a>
                            </div>
                            <?php $n++ ; } ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!--
                <div class="dark-blue-box">
                    <h4><a href="#">ई-पेपर</a></h4>
                    <select class="form-control">
                        <option value="">Select City</option>
                        <option value="">Bhopal</option>
                        <option value="">Indore</option>
                        <option value="">Mumbai</option>
                        <option value="">Delhi</option>
                    </select>
                    <div class="clearfix"></div>
                    <ul class="newspaper">
                        <li>
                            <a href="#">
                                <p>Bhopal</p>
                                <img src="assets/images/bhopal.jpg" class="img-responsive" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Indore</p>
                                <img src="assets/images/bhopal.jpg" class="img-responsive" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Mumbai</p>
                                <img src="assets/images/bhopal.jpg" class="img-responsive" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="rashifal">
                    <h4>आज का राशिफल</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">पाएं अपना तीनों तरह का राशिफल, रोजाना</div>
                        <div class="panel-body text-center">
                            <input type="text" class="form-control" placeholder="dd-mm-yyyy" />
                            <div class="input-group">
                                <div id="radioBtn" class="btn-group">
                                    <a class="btn btn-default btn-sm active" data-toggle="fun" data-title="Y">Male</a>
                                    <a class="btn btn-default btn-sm notActive" data-toggle="fun" data-title="X">Female</a>
                                    <a class="btn btn-default btn-sm notActive" data-toggle="fun" data-title="N">Others</a>
                                </div>
                                <input type="hidden" name="fun" id="fun">
                            </div>
                            <div class="clearfix"></div>

                            <div class="owl-carousel rashi-slider">
                                <?php for($i=1;$i<=5;$i++){ ?>
                                <div class="item">
                                    <a href="#">
                                        <img src="assets/images/rashi.png" alt="">
                                        <p>मिथुन</p>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>

                            <a href="#" class="btn btn-default web-btn">क्लिक करें</a>
                        </div>
                    </div>
                </div>
-->
                <?php foreach ($news_data1 as $news12) {?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url('Backend/single_news/'.$news12->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news12->title)))?>">
                            <img class="media-object" src="<?= base_url($news12->image) ?>" alt="...">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h6>
                            <a href="<?= base_url('Backend/single_news/'.$news12->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news12->title)))?>" class="pull-left"><span class="web-color"> <?= $news12->area_hindi ?> </span> <?= strip_tags($news12->title_hindi) ?></a>
                            <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                            <div class="clearfix"></div>
                        </h6>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?= base_url('Backend/video_gallery')?>">
                    <h4 class="web-heading web-color">वीडियो गैलरी</h4>
                </a>
                <div class="owl-carousel video-gallery-slider">
                    <?php foreach ($video_gallery as $video) {?>
                    <div class="item">
                        <div class="newsbox">
                            <a href="<?= base_url('Backend/single_video/'.$video->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$video->title_share)))?>">
                                <img src="<?= base_url($video->image)?>" alt="" />
                                <div class="play-btn">
                                    <i class="fa fa-play"></i>
                                </div>
                            </a>
                            <h6><a href="<?= base_url('Backend/single_video/'.$video->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$video->title_share)))?>"><span class="web-color"><?= $video->title ?></span> <?= $video->title_hindi ?></a></h6>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?= base_url('Backend/photo_gallery')?>">
                    <h4 class="web-heading web-color">फोटो गैलरी</h4>
                </a>
                <div class="owl-carousel video-gallery-slider">
                    <?php foreach ($photo_gallery as $gallery) {?>
                    <div class="item">
                        <div class="newsbox">
                            <a href="<?= base_url('Backend/single_photo/'.$gallery->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$gallery->title_share)))?>">
                                <img src="<?= base_url($gallery->image)?>" alt="" />
                            </a>
                            <h6><a href="<?= base_url('Backend/single_photo/'.$gallery->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$gallery->title_share)))?>"><span class="web-color"><?= $gallery->title?></span> <?= $gallery->title_hindi ?></a></h6>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="web-heading web-color">फोटो शूट</h4>
                <div class="owl-carousel video-gallery-slider">
                    <div class="item">
                        <div class="newsbox">
                            <a href="#">
                                <img src="assets/images/newsbox.jpg" alt="" />
                            </a>
                            <h6><a href="#"><span class="web-color">आईएनएक्स घोटाला /</span> सीबीआई ने चिदंबरम के घर पर नोटिस लगाया</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="web-heading web-color">शो रील</h4>
                <div class="owl-carousel video-gallery-slider">
                    <div class="item">
                        <div class="newsbox">
                            <a href="#">
                                <img src="assets/images/newsbox.jpg" alt="" />
                                <div class="play-btn">
                                    <i class="fa fa-play"></i>
                                </div>
                            </a>
                            <h6><a href="#"><span class="web-color">आईएनएक्स घोटाला /</span> सीबीआई ने चिदंबरम के घर पर नोटिस लगाया</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<?php $v=1; 
foreach ($categorys_data as $categorys) {
      if($v==1){
        $clas = 'pink';
        }elseif ($v==2) {
           $clas = 'blue';
        }elseif ($v==3) {
           $clas = 'brown';
        }elseif ($v==4) {
           $clas = 'green';
        }else{
             $clas = 'blue'; 
        }
     $sub_cat = $this->Query->select('*','sub_category',['status'=>'Enabled','cat_id'=>$categorys->id],'result'); 
     $s_news = $this->Query->select('*','news_details',['status'=>'Enabled','cat_id'=>$categorys->id],'row',['id'=>'desc'],1);
     if($s_news){
    ?>
<section class="front-news <?= $clas ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="web-heading2 <?= $clas ?>">
                    <h4><?= $categorys->cat_name_hindi?></h4>
                    <?php if($sub_cat){ ?>
                    <div class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> MORE <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php foreach ($sub_cat as $scat) {?>
                            <li><a href="<?= base_url('Backend/s_wise/'.$scat->cat_id.'/'.$scat->sub_category_id)?>"><?= $scat->sub_category_name?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php }else{?>
                    <div class="pull-right">
                        <a href="<?= base_url('Backend/c_wise/'.$categorys->id)?>">MORE</a>
                    </div>
                    <?php } ?>
                </div>
                <h4 class="front-news-heading">
                    <a href="<?= base_url('Backend/single_news/'.$s_news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$s_news->title)))?>" class="pull-left"><span class="web-color"><?= $s_news->area_hindi ?></span> <?= strip_tags($s_news->title_hindi) ?></a>
                    <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="clearfix"></div>
                </h4>
                
                <a href="<?= base_url('Backend/single_news/'.$s_news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$s_news->title)))?>"><img src="<?= base_url($s_news->image) ?>" class="img-responsive news-img" alt=""></a>
                
                <a href="<?= base_url('Backend/single_news/'.$s_news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$s_news->title)))?>">
                    <?= substr($s_news->content_hindi, 0,600) ?>
                </a>
            </div>

        </div>
    </div>
</section>
<?php }$v++;} ?>
