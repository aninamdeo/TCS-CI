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
                <ul>
                        <?php if($sub_category_data){
                    $i=1;foreach ($sub_category_data as $sub_cat) {
                         $category1 = $this->Query->select('*','category',['id'=>$sub_cat->cat_id],'row');
                        ?>
                        <li class="<?= ($sub_category->sub_category_id == $sub_cat->sub_category_id) ? 'active' : '' ?>"><a href="<?= base_url($category1->cat_name.'/'.$sub_cat->sub_category_link)?>" title="<?= $sub_cat->sub_category_name?>"><?= $sub_cat->sub_category_name?></a></li>
                        <?php $i++; }} ?>
                    </ul>
            </div>
        </div>
    </div>
</section>

<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="web-heading2">
                    <h4><?= $sub_category->sub_category_name ?></h4>
                </div>
            </div>
            <?php $n=1;
            // var_dump($news_data);
             foreach ($news_data as $news) {
                  if($news->sub_category_link!=""){
                          $news_link = $news->cat_name.'/'.$news->sub_category_link.'/news/'.$news->news_link;
                    }elseif($news->cat_name!=""){
                           $news_link = $news->cat_name.'/news/'.$news->news_link;
                    }else{
                          $news_link = 'no-category/news/'.$news->news_link;
                    }
             if($n==1){ ?>
            <div class="col-sm-4">
                <h4 class="front-news-heading">
                    <a href="<?= base_url($news_link )?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                    <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                    <div class="clearfix"></div>
                </h4>
                <a href="<?= base_url($news_link )?>"><img src="<?= base_url($news->image)?>" class="img-responsive img-rounded news-img" alt=""></a>
            </div>
            <?php }elseif($n <= round(count($news_data)/2)) { if($n==2){echo ' <div class="col-sm-4">'; } ?>
            <div class="box media">
                <div class="media-left">
                    <a href="<?= base_url($news_link )?>">
                        <img class="media-object img-rounded" src="<?= base_url($news->image)?>" alt="...">
                    </a>
                </div>
                <div class="media-body media-middle">
                    <h5>
                        <a href="<?= base_url($news_link )?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                        <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                        <div class="clearfix"></div>
                    </h5>
                </div>
            </div>
            <?php }else{if($n== round(count($news_data)/2)+1){ echo '</div> <div class="col-sm-4">'; } ?>
            <div class="box media">
                <div class="media-left">
                    <a href="<?= base_url($news_link )?>">
                        <img class="media-object img-rounded" src="<?= base_url($news->image)?>" alt="...">
                    </a>
                </div>
                <div class="media-body media-middle">
                    <h5>
                        <a href="<?= base_url($news_link )?>" class="pull-left"><span class="web-color"><?= $news->area_hindi ?> </span> <?= strip_tags($news->title_hindi) ?></a>
                        <!-- <a href="" class="pull-right"><i class="fa fa-ellipsis-v"></i></a> -->
                        <div class="clearfix"></div>
                    </h5>
                </div>
            </div>
            <?php } $n++;}?>
        </div>
    </div>
</section>
