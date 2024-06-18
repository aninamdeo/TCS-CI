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
<section class="state-bar hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?= base_url()?>" title="">Home </a></li>|
                    <li><a href="#" title="" style="color: red;"><?= ($state) ? $state->name : 'राज्य'?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="single-news-header visible-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url() ?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4><?= ($state) ? $state->name : 'राज्य'?></h4>
            </div>
        </div>
    </div>
</section>



<section class="video-gallery page">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h3 class="front-news-heading mt-0"><?= ($state) ? $state->name : 'राज्य'?></h3>
            </div>
            <div class="col-sm-3">
                <form method="post">
                    <div class="form-group">
                        <select class="form-control destrict_select" name="district">
                            <option value="">जिले का चयन करें</option>
                            <?php foreach ($city_data as $city) {?>
                            <option value="<?= $city->id ?>"><?= $city->city?></option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div><br />
            <div class="district_gallery">
                <?php foreach ($gallery_data as $gallery) {
                 $v_state = $this->Query->select('*','states',['country_id'=>'101','id'=>$gallery->state_id],'row','');
                 $v_city = $this->Query->select('*','selected_city',['state_id'=>$gallery->state_id,'id'=>$gallery->city_id],'row');
                    ?>
                <div class="col-sm-4 col-xs-6">
                    <div class="newsbox">
                        <a href="<?= base_url('mera-shaher/'.$v_state->state_english.'/'.$v_city->city_english.'/'.$gallery->link)?>">
                            <img src="<?= base_url($gallery->image)?>" alt="" />
                            <div class="play-btn">
                                <i class="fa fa-play"></i>
                            </div>
                        </a>
                        <h5>
                            <a href="<?= base_url('mera-shaher/'.$v_state->state_english.'/'.$v_city->city_english.'/'.$gallery->link)?>"><span class="web-color">
                                    <?= $gallery->title ?></span> <?= $gallery->title_hindi ?></a>
                            <div class="clearfix"></div>
                            <!-- <a href="#" class="pull-right"><small><i class="fa fa-share"></i> Share</small></a> -->
                            <div class="clearfix"></div>
                        </h5>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
