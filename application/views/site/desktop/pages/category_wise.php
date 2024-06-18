<style>
    @media (max-width:767px) {
        footer {
            display: none;
        }
    }
</style>

<section class="state-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="responsive-tabs">
                    <ul>
                        <?php if ($sub_category) {
                            $i = 1;
                            foreach ($sub_category as $sub_cat) {
                                $category1 = $this->Query->select('*', 'category', ['id' => $sub_cat->cat_id], 'row');
                                ?>
                                <li><a href="<?= base_url($category1->cat_name . '/' . $sub_cat->sub_category_link) ?>"
                                        title="<?= $sub_cat->sub_category_name ?>"><?= $sub_cat->sub_category_name ?></a></li>
                                <?php $i++;
                            }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$select = "category.*,sub_category.*,news_details.*";
$join_arr = [
    ['category', 'news_details.cat_id = category.id', 'left'],
    ['sub_category', 'news_details.sub_cat_id = sub_category.sub_category_id', 'left']
];
if ($cid != '1') {
    $total = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => $cid, 'news_details.sub_cat_id' => ''], 'count');
   
    $paginate = $this->basic->create_links(base_url($category1->cat_name), $total, 31, 6);
    $links = $paginate['links'];
    $news_data1 = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => $cid, 'news_details.sub_cat_id' => ''], 'result', ['news_details.id' => 'desc'],  [$paginate['per_page'], $paginate['page']]);
} else {
    $total = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'top_news' => 'Yes'], 'count');
    $paginate = $this->basic->create_links(base_url($category1->cat_name), $total, 31, 6);
    $links = $paginate['links'];
    $news_data1 = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'top_news' => 'Yes'], 'result', ['news_details.id' => 'desc'], [$paginate['per_page'], $paginate['page']]);
}

if ($news_data1) {
    ?>
    <section class="front-news">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="web-heading2">
                        <h4><?= $category->cat_name_hindi ?></h4>
                        <!-- <div class="pull-right">
                        <a href="<?= base_url('Web/c_wise/' . $cid) ?>">MORE</a>
                    </div> -->
                    </div>
                </div>
                <?php $n = 1;
                foreach ($news_data1 as $news) {
                    if ($news->sub_category_link != "") {
                        $news_link1 = $news->cat_name . '/' . $news->sub_category_link . '/news/' . $news->news_link;
                    } elseif ($news->cat_name != "") {
                        $news_link1 = $news->cat_name . '/news/' . $news->news_link;
                    } else {
                        $news_link1 = 'no-category/news/' . $news->news_link;
                    }
                    if ($n == 1) { ?>
                        <div class="col-sm-4">
                            <h4 class="front-news-heading">
                                <a href="<?= base_url($news_link1) ?>" class="pull-left"><span
                                        class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                                <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                                <div class="clearfix"></div>
                            </h4>
                            <a href="<?= base_url($news_link1) ?>"><img src="<?= base_url($news->image) ?>"
                                    class="img-responsive img-rounded news-img" alt=""></a>
                        </div>
                    <?php } elseif ($n <= round(count($news_data1) / 2)) {
                        if ($n == 2) {
                            echo '<div class="col-sm-4">';
                        } ?>
                        <div class="box media">
                            <div class="media-left">
                                <a href="<?= base_url($news_link1) ?>">
                                    <img class="media-object img-rounded" src="<?= base_url($news->image) ?>" alt="...">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h5>
                                    <a href="<?= base_url($news_link1) ?>" class="pull-left"><span
                                            class="web-color"><?= $news->area_hindi ?> </span>
                                        <?= strip_tags($news->title_hindi) ?></a>
                                    <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                                    <div class="clearfix"></div>
                                </h5>
                            </div>
                        </div>
                    <?php } else {
                        if ($n == round(count($news_data1) / 2) + 1) {
                            echo '</div> <div class="col-sm-4">';
                        } ?>
                        <div class="box media">
                            <div class="media-left">
                                <a href="<?= base_url($news_link1) ?>">
                                    <img class="media-object img-rounded" src="<?= base_url($news->image) ?>" alt="...">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h5>
                                    <a href="<?= base_url($news_link1) ?>" class="pull-left"><span
                                            class="web-color"><?= $news->area_hindi ?> </span>
                                        <?= strip_tags($news->title_hindi) ?></a>
                                    <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                                    <div class="clearfix"></div>
                                </h5>
                            </div>
                        </div>
                    <?php }
                    $n++;
                } ?>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-sm-12 text-center">
                    <?= $links ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php if ($sub_category) {
    foreach ($sub_category as $scat) {
        // $news_data =$this->Query->select('*','news_details',['cat_id'=>$scat->cat_id,'sub_cat_id'=>$scat->sub_category_id],'result',['id'=>'desc'],9);
        $select = "category.*,sub_category.*,news_details.*";
        $join_arr = [
            ['category', 'news_details.cat_id = category.id', 'left'],
            ['sub_category', 'news_details.sub_cat_id = sub_category.sub_category_id', 'left']
        ];
        $news_data = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => $scat->cat_id, 'news_details.sub_cat_id' => $scat->sub_category_id], 'result', ['news_details.id' => 'desc'], '9');
        if ($news_data != NULL) {

            ?>
            <section class="front-news">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="web-heading2">
                                <h4><?= $scat->sub_category_name ?></h4>
                                <!--  <div class="dropdown pull-right">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            MORE
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">जीवन मंत्र</a></li>
                            <li><a href="#">दैनिक राशिफल</a></li>
                            <li><a href="#">उपाय</a></li>
                            <li><a href="#">धर्म</a></li>
                            <li><a href="#">हस्तरेखा</a></li>
                            <li><a href="#">वास्तु</a></li>
                            <li><a href="#">पंचांग</a></li>
                            <li><a href="#">पूजा-पाठ</a></li>
                        </ul>
                    </div> -->
                                <div class="pull-right">

                                    <a href="<?= base_url($category->cat_name . '/' . $scat->sub_category_link) ?>">MORE</a>
                                </div>
                            </div>
                        </div>
                        <?php $m = 1;
                        foreach ($news_data as $news) {
                            if ($news->sub_category_link != "") {
                                $news_link = $news->cat_name . '/' . $news->sub_category_link . '/news/' . $news->news_link;
                            } elseif ($news->cat_name != "") {
                                $news_link = $news->cat_name . '/news/' . $news->news_link;
                            } else {
                                $news_link = 'no-category/news/' . $news->news_link;
                            }
                            if ($m == 1) { ?>
                                <div class="col-sm-4">
                                    <h4 class="front-news-heading">
                                        <a href="<?= base_url($news_link) ?>" class="pull-left"><span
                                                class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                                        <div class="clearfix"></div>
                                    </h4>
                                    <a href="<?= base_url($news_link) ?>"><img src="<?= base_url($news->image) ?>"
                                            class="img-responsive img-rounded news-img" alt=""></a>
                                </div>
                            <?php } elseif ($m <= 5) {
                                if ($m == 2) {
                                    echo '<div class="col-sm-4">';
                                } ?>
                                <div class="box media">
                                    <div class="media-left">
                                        <a href="<?= base_url($news_link) ?>">
                                            <img class="media-object img-rounded" src="<?= base_url($news->image) ?>" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <h5>
                                            <a href="<?= base_url($news_link) ?>" class="pull-left"><span
                                                    class="web-color"><?= $news->area_hindi ?> </span>
                                                <?= strip_tags($news->title_hindi) ?></a>
                                            <div class="clearfix"></div>
                                        </h5>
                                    </div>
                                </div>
                            <?php } else {
                                if ($m == 6) {
                                    echo '</div> <div class="col-sm-4">';
                                } ?>
                                <div class="box media">
                                    <div class="media-left">
                                        <a href="<?= base_url($news_link) ?>">
                                            <img class="media-object img-rounded" src="<?= base_url($news->image) ?>" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <h5>
                                            <a href="<?= base_url($news_link) ?>" class="pull-left"><span
                                                    class="web-color"><?= $news->area_hindi ?> </span>
                                                <?= strip_tags($news->title_hindi) ?></a>
                                            <div class="clearfix"></div>
                                        </h5>
                                    </div>
                                </div>
                            <?php }
                            $m++;
                        } ?>
                    </div>
                </div>
            </section>
        <?php }
    }
} ?>