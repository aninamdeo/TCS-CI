<section class="state-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="responsive-tabs">
                    <ul>
                        <?php  $i=1;foreach ($sub_category as $sub_cat) {?>
                        <li class="<?php if($cid==$sub_cat->cat_id){echo 'active' ; }elseif($sid==$sub_cat->sub_category_id) {echo 'active'; }else{}?>"><a href="<?= base_url('Backend/s_wise/'.$sub_cat->cat_id.'/'.$sub_cat->sub_category_id)?>" title="<?= $sub_cat->sub_category_name?>"><?= $sub_cat->sub_category_name?></a></li>
                        <?php $i++; } ?>
                        <!--   <li><a href="#" title="छत्तीसगढ़">छत्तीसगढ़ </a></li>
                    <li><a href="#" title="राजस्थान">राजस्थान </a></li>
                    <li><a href="#" title="चंडीगढ़ + हिमाचल">चंडीगढ़ + हिमाचल </a></li>
                    <li><a href="#" title="पंजाब">पंजाब </a></li>
                    <li><a href="#" title="हरियाणा">हरियाणा </a></li>
                    <li><a href="#" title="बिहार">बिहार </a></li>
                    <li><a href="#" title="झारखण्ड">झारखण्ड </a></li>
                    <li><a href="#" title="उत्तर-प्रदेश">उत्तर-प्रदेश </a></li>
                    <li><a href="#" title="महाराष्ट्र">महाराष्ट्र </a></li>
                    <li><a href="#" title="दिल्ली">दिल्ली </a></li>
                    <li><a href="#" title="गुजरात">गुजरात </a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div>
            <?php $n=1; foreach ($news_data as $news) { if($n==1){ ?>
            <div class="col-xs-12">
                <h5 class="front-news-heading">
                    <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                    <!-- <a href="#" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                    <div class="clearfix"></div>
                </h5>
                <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>">
                    <ul class="newsul">
                        <?= substr($news->content_hindi, 0,600) ?>
                    </ul>
                </a>
            </div>
            <img src="<?= base_url($news->image)?>" class="img-responsive news-img" alt="">
            <div class="clearfix"></div>
            <div class="col-xs-12">
                <?php }else{ ?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>">
                            <img class="media-object" src="<?= base_url($news->image)?>" alt="...">
                            <!-- div class="play-btn">
                                <i class="fa fa-play"></i>
                            </div> -->
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h6>
                            <a href="<?= base_url('Backend/single_news/'.$news->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$news->title)))?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                            <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                            <div class="clearfix"></div>
                        </h6>
                    </div>
                </div>
                <?php  } if($n >1){ ?>
                <div class="clearfix"></div>
                <?php }$n++; } ?>
            </div>
        </div>
    </div>
</section>
