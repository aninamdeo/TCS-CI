<style>
    @media (max-width:767px) {
        footer {
            display: none;
        }
    }
</style>

<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom:20px">
                        <div class="blue-box">
                            <h5><a href="<?= base_url('Interesting-News') ?>">देश-दुनिया की 10 सबसे रोचक खबरें <span class="fa fa-angle-double-right pull-right"></span></a></h5>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <?php $m = 1;
                                    foreach ($interesting_data as $interes) {
                                        if ($interes->sub_category_link != "") {
                                            $interes_link = $interes->cat_name . '/' . $interes->sub_category_link . '/news/' . $interes->news_link;
                                        } elseif ($interes->cat_name != "") {
                                            $interes_link = $interes->cat_name . '/news/' . $interes->news_link;
                                        } else {
                                            $interes_link = 'no-category/news/' . $interes->news_link;
                                        } ?>
                                        <div class="item <?= ($m == 1) ? 'active' : '' ?>">
                                            <a href="<?= base_url($interes_link) ?>">
                                                <div class="set_img">
                                                    <img src="<?= base_url($interes->image) ?>" alt="...">
                                                </div>
                                                <div class="carousel-caption">
                                                    <span class="web-color2"><?= $interes->title ?></span>
                                                    <?= strip_tags($interes->title_hindi) ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php $m++;
                                    } ?>
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
                    </div>
                    <div class="col-sm-12">
                        <div class="common-box">
                            <h2 class="home-sect-heading">EXCLUSIVE</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="front-news-heading">
                                        <?php if ($news->sub_category_link != "") {
                                            $news_link = $news->cat_name . '/' . $news->sub_category_link . '/news/' . $news->news_link;
                                        } elseif ($news->cat_name != "") {
                                            $news_link = $news->cat_name . '/news/' . $news->news_link;
                                        } else {
                                            $news_link = 'no-category/news/' . $news->news_link;
                                        }
                                        ?>
                                        <a href="<?= base_url($news_link) ?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span>
                                            <?= strip_tags($news->title_hindi) ?></a>
                                        <div class="clearfix"></div>
                                    </h4>
                                    <a href="<?= base_url($news_link) ?>"> <img src="<?= base_url($news->image) ?>" class="img-responsive img-rounded news-img" alt=""></a>
                                    <?php $n = 1;
                                    foreach ($news_data as $news1) {
                                        if ($news1->sub_category_link != "") {
                                            $news1_link = $news1->cat_name . '/' . $news1->sub_category_link . '/news/' . $news1->news_link;
                                        } elseif ($news1->cat_name != "") {
                                            $news1_link = $news1->cat_name . '/news/' . $news1->news_link;
                                        } else {
                                            $news1_link = 'no-category/news/' . $news1->news_link;
                                        }
                                        if ($n <= 5) { ?>
                                            <div class="box media">
                                                <div class="media-left">
                                                    <img class="media-object img-rounded" src="<?= base_url($news1->image) ?>" alt="...">
                                                </div>
                                                <div class="media-body media-middle">
                                                    <h5>
                                                        <a href="<?= base_url($news1_link) ?>" class="pull-left"><span class="web-color"><?= $news1->area_hindi ?></span>
                                                            <?= strip_tags($news1->title_hindi) ?> </a>
                                                        <div class="clearfix"></div>
                                                    </h5>
                                                </div>
                                            </div>
                                        <?php } else {
                                            if ($n == 6) {
                                                echo '</div> <div class="col-sm-6">';
                                            } ?>
                                            <div class="box media">
                                                <div class="media-left">
                                                    <img class="media-object img-rounded" src="<?= base_url($news1->image) ?>" alt="...">
                                                </div>
                                                <div class="media-body media-middle">
                                                    <h5>
                                                        <a href="<?= base_url($news1_link) ?>" class="pull-left"><span class="web-color"><?= $news1->area_hindi ?> </span>
                                                            <?= strip_tags($news1->title_hindi) ?></a>
                                                        <div class="clearfix"></div>
                                                    </h5>
                                                </div>
                                            </div>
                                    <?php }
                                        $n++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <a href="#">
                    <img src="<?= base_url('asset/site_images/Images_advs/5f420d27eab23026865639.jpg') ?>" class="img-responsive w-100 home-ad-img" />
                </a>
                <!-- <div class="dark-blue-box">
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
                                <img src="<?= base_url('assets/desktop/') ?>images/bhopal.jpg" class="img-responsive"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Indore</p>
                                <img src="<?= base_url('assets/desktop/') ?>images/bhopal.jpg" class="img-responsive"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <p>Mumbai</p>
                                <img src="<?= base_url('assets/desktop/') ?>images/bhopal.jpg" class="img-responsive"
                                    alt="">
                            </a>
                        </li>
                    </ul>
                </div> -->
                <!--                 <div class="rashifal">
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
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <div class="item">
                                    <a href="#">
                                        <img src="<?= base_url('assets/desktop/') ?>images/rashi.png" alt="">
                                        <p>मिथुन</p>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>

                            <a href="#" class="btn btn-default web-btn">क्लिक करें</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-sm-2">
                <div class="small-common-box">
                    <div class="common-box-heading">
                        <h3>POLL</h3>
                    </div>
                    <div class="common-box-content">
                        <p>कोरोना महामारी: भारत सरकार का आर्थिक पैकेज ​आम जनता के लिए लाभदायक होगा ?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                हां
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                नहीं
                            </label>
                        </div>
                        <a href="#" class="web-btn-new">VOTE</a>
                    </div>
                </div>
                <div class="small-common-box">
                    <div class="common-box-heading">
                        <h3>LINKS</h3>
                    </div>
                    <div class="common-box-content">
                        <a href="https://" class="link-box">
                            <img src="<?= base_url('asset/site_images/home-link-img.jpg') ?>" alt="">
                            <span>mpinfo.org</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div>
            <div class="div col-sm-12">
                <a href="<?= base_url('Videos/gallery') ?>">
                    <h4 class="web-heading web-color">वीडियो गैलरी</h4>
                </a>
                <div class="owl-carousel video-gallery-slider">
                    <?php foreach ($video_gallery as $video) { ?>
                        <div class="item">
                            <div class="newsbox">
                                <a href="<?= base_url('Videos/news/' . $video->link) ?>">
                                    <img src="<?= base_url($video->image) ?>" alt="" />
                                    <div class="play-btn">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                                <h5><a href="<?= base_url('Videos/news/' . $video->link) ?>"><span class="web-color"><?= $video->title ?></span> <?= $video->title_hindi ?></a>
                                </h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="video-gallery">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div>
            <div class="div col-sm-12">
                <a href="<?= base_url('Photo/gallery') ?>">
                    <h4 class="web-heading web-color">फोटो गैलरी</h4>
                </a>
                <div class="owl-carousel video-gallery-slider">
                    <?php foreach ($photo_gallery as $gallery) { ?>
                        <div class="item">
                            <div class="newsbox">
                                <a href="<?= base_url('Photos/news/' . $gallery->link) ?>">
                                    <img src="<?= base_url($gallery->image) ?>" alt="" />
                                </a>
                                <h5><a href="<?= base_url('Photos/news/' . $gallery->link) ?>"><span class="web-color"><?= $gallery->title ?></span> <?= $gallery->title_hindi ?></a>
                                </h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="bollywood">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="web-heading2 pink">
                    <h4>बॉलीवुड</h4>
                    <?php if ($bolly_sub_cat) { ?>
                        <div class="dropdown pull-right">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                MORE
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php foreach ($bolly_sub_cat as $bol_scat) {
                                    $category1 = $this->Query->select('*', 'category', ['id' => $bol_scat->cat_id], 'row');
                                ?>
                                    <li><a href="<?= base_url($category1->cat_name . '/' . $bol_scat->sub_category_link) ?>"><?= $bol_scat->sub_category_name ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="pull-right">
                            <a href="<?= base_url('Bollywood') ?>">MORE</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php foreach ($bollywood_data as $bolly) {
            if ($bolly->sub_category_link != "") {
                $bolly_link = $bolly->cat_name . '/' . $bolly->sub_category_link . '/news/' . $bolly->news_link;
            } elseif ($bolly->cat_name != "") {
                $bolly_link = $bolly->cat_name . '/news/' . $bolly->news_link;
            } else {
                $bolly_link = 'no-category/news/' . $bolly->news_link;
            }
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="bollywood-box">
                    <h5>
                        <a href="<?= base_url($bolly_link) ?>" class="pull-left"><span class="web-color"><?= $bolly->area_hindi ?></span>
                            <?= strip_tags($bolly->title_hindi) ?></a>
                        <!-- <a href="#" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                        <div class="clearfix"></div>
                    </h5>
                    <a href="<?= base_url($bolly_link) ?>"><img src="<?= base_url($bolly->image) ?>" class="img-responsive" alt=""></a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<!-- <section class="video-gallery pink">
    <div class="container">
        <div class="row">
            <div class="div col-sm-12">
                <h4 class="web-heading web-color">फोटो शूट</h4>
            </div>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="newsbox">
                    <a href="#">
                        <img src="<?= base_url('assets/desktop/') ?>images/newsbox.jpg" alt="" />
                    </a>
                    <h5><a href="#"><span class="web-color">आईएनएक्स घोटाला /</span> सीबीआई ने चिदंबरम के घर पर नोटिस लगाया</a></h5>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="video-gallery pink">
    <div class="container">
        <div class="row">
            <div class="div col-sm-12">
                <h4 class="web-heading web-color">शो रील</h4>
            </div>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="newsbox">
                    <a href="#">
                        <img src="<?= base_url('assets/desktop/') ?>images/newsbox.jpg" alt="" />
                        <div class="play-btn">
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                    <h5><a href="#"><span class="web-color">आईएनएक्स घोटाला /</span> सीबीआई ने चिदंबरम के घर पर नोटिस लगाया</a></h5>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section> -->


<?php $v = 1;
foreach ($categorys_data as $categorys) {
    if ($v == 1) {
        $clas = 'blue';
    } elseif ($v == 2) {
        $clas = 'brown';
    } elseif ($v == 3) {
        $clas = 'pink';
    } elseif ($v == 4) {
        $clas = 'green';
    } else {
        $clas = 'blue';
    }
    $sub_cat = $this->Query->select('*', 'sub_category', ['status' => 'Enabled', 'cat_id' => $categorys->id], 'result');
    $select = "category.*,sub_category.*,news_details.*";
    $join_arr = [
        ['category', 'news_details.cat_id = category.id', 'left'],
        ['sub_category', 'news_details.sub_cat_id = sub_category.sub_category_id', 'left']
    ];

    $s_news = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => $categorys->id], 'row', ['news_details.id' => 'desc'], '1');
    if ($s_news) {
        if ($s_news->sub_category_link != "") {
            $s_news_link = $s_news->cat_name . '/' . $s_news->sub_category_link . '/news/' . $s_news->news_link;
        } elseif ($s_news->cat_name != "") {
            $s_news_link = $s_news->cat_name . '/news/' . $s_news->news_link;
        } else {
            $s_news_link = 'no-category/news/' . $s_news->news_link;
        }
        $s_all_news = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => $categorys->id, 'news_details.id !=' => $s_news->id], 'result', ['news_details.id' => 'desc'], '8');
?>
        <section class="front-news <?= $clas ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="web-heading2 <?= $clas ?>">
                            <h4><?= $categorys->cat_name_hindi ?></h4>
                            <?php if ($sub_cat) { ?>
                                <div class="dropdown pull-right">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> MORE <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <?php foreach ($sub_cat as $scat) { ?>
                                            <li><a href="<?= base_url($categorys->cat_name . '/' . $scat->sub_category_link) ?>"><?= $scat->sub_category_name ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div class="pull-right">
                                    <a href="<?= base_url($categorys->cat_name) ?>">MORE</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="front-news-heading">
                            <a href="<?= base_url($s_news_link) ?>" class="pull-left"><span class="web-color"><?= $s_news->area_hindi ?></span> <?= strip_tags($s_news->title_hindi) ?>
                            </a>

                            <div class="clearfix"></div>
                        </h4>
                        <a href="<?= base_url($s_news_link) ?>"><img src="<?= base_url($s_news->image) ?>" class="img-responsive img-rounded news-img" alt=""></a>
                    </div>
                    <div class="col-sm-4">
                        <?php $k = 1;
                        if ($s_all_news != NULL) {
                            foreach ($s_all_news as $all_news) {
                                if ($all_news->sub_category_link != "") {
                                    $all_news_link = $all_news->cat_name . '/' . $all_news->sub_category_link . '/news/' . $all_news->news_link;
                                } elseif ($all_news->cat_name != "") {
                                    $all_news_link = $all_news->cat_name . '/news/' . $all_news->news_link;
                                } else {
                                    $all_news_link = 'no-category/news/' . $all_news->news_link;
                                }
                                if ($k <= 4) { ?>
                                    <div class="box media">
                                        <div class="media-left">
                                            <a href="<?= base_url($all_news_link) ?>">
                                                <img class="media-object img-rounded" src="<?= base_url($all_news->image) ?>" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h5>
                                                <a href="<?= base_url($all_news_link) ?>" class="pull-left"><span class="web-color"><?= $all_news->area_hindi ?> </span>
                                                    <?= strip_tags($all_news->title_hindi) ?> </a>
                                                <div class="clearfix"></div>
                                            </h5>
                                        </div>
                                    </div>
                                <?php } else {
                                    if ($k == 5) {
                                        echo '</div> <div class="col-sm-4">';
                                    } ?>
                                    <div class="box media">
                                        <div class="media-left">
                                            <a href="<?= base_url($all_news_link) ?>">
                                                <img class="media-object img-rounded" src="<?= base_url($all_news->image) ?>" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h5>
                                                <a href="<?= base_url($all_news_link) ?>" class="pull-left"><span class="web-color"><?= $all_news->area_hindi ?></span>
                                                    <?= strip_tags($all_news->title_hindi) ?> </a>
                                                <div class="clearfix"></div>
                                            </h5>
                                        </div>
                                    </div>
                        <?php }
                                $k++;
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </section>
<?php }
    $v++;
} ?>