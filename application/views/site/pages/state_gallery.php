
<section class="single-news-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4><?= ($state) ? $state->name : 'राज्य'?> </h4>
            </div>
        </div>
    </div>
</section>

<section class="video-gallery page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form method="post">
                    <div class="form-group">
                        <select class="form-control destrict_select" name="district" >
                            <option value="">जिले का चयन करें</option>
                         <?php foreach ($city_data as $city) {?>
                             <option value="<?= $city->id ?>"><?= $city->city?></option>
                        <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="district_gallery">
            <?php foreach ($gallery_data as $gallery) {?>
            <div class="col-xs-6">
                <div class="newsbox">
                    <a href="<?= base_url('Backend/single_gallery/'.$gallery->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$gallery->title_share)))?>">
                        <img src="<?= base_url($gallery->image)?>" alt="" />
                        <div class="play-btn">
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                    <h6>
                        <a href="<?= base_url('Backend/single_gallery/'.$gallery->id.'/'.preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$gallery->title_share)))?>"><span class="web-color">
                        <?= $gallery->title ?></span>  <?= $gallery->title_hindi ?></a>
                        <div class="clearfix"></div>
                        <!-- <a href="#" class="pull-right"><small><i class="fa fa-share"></i> Share</small></a> -->
                        <div class="clearfix"></div>
                    </h6>

                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
</section>

