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
                <h4><?= ($state) ? $state->name : 'राज्य'?></h4>
            </div>
        </div>
    </div>
</section>

<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-sm-8">
                <h3 class="front-news-heading">
                    <a href="#" class="pull-left"><span class="web-color"><?= $video->title ?> </span><?= $video->title_hindi ?> </a>

                    <div class="clearfix"></div>
                </h3>
                <section class="videogallery-single thumbnail">
                    <video width="100%" autoplay controls controlsList="nodownload">
                        <source src="<?= base_url($video->video)?>" type="video/mp4">
                    </video>
                </section>
                <p class="pull-left"><b><?= $basic_details->name ?> :</b> <span class="text-gray"><?= date('M d,Y',strtotime($video->date)) ?> <?= $video->time ?> IST</span></p>
                <div class="text-right pull-right">
                    <a href="javascript:void()" class="pull-right sharetoggle"><i class="fa fa-share"></i></a>
                    <ul class="custom-social" style="display:none;">
                        <li class="facebook"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('mera-shaher/'.$state->state_english.'/'.$city->city_english.'/'.$video->link)?>"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="whatsapp hidden-xs"><a target="_blank" href="https://web.whatsapp.com/send?text=<?= base_url('mera-shaher/'.$state->state_english.'/'.$city->city_english.'/'.$video->link)?>"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="whatsapp visible-xs"><a target="_blank" href="whatsapp://send?text=<?= base_url('mera-shaher/'.$state->state_english.'/'.$city->city_english.'/'.$video->link)?>"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-sm-4">
                <h4>Related Videos</h4>
                <?php foreach ($video_data as $data) { 
                 $v_state = $this->Query->select('*','states',['country_id'=>'101','id'=>$data->state_id],'row','');
                 $v_city = $this->Query->select('*','selected_city',['state_id'=>$data->state_id,'id'=>$data->city_id],'row');
              ?>
                <div class="box media">
                    <div class="media-left">
                        <a href="<?= base_url('mera-shaher/'.$v_state->state_english.'/'.$v_city->city_english.'/'.$data->link)?>">
                            <img class="media-object" src="<?= base_url($data->image)?>" alt="...">
                            <div class="play-btn">
                                <i class="fa fa-play"></i>
                            </div>
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <h6>
                            <a href="<?= base_url('mera-shaher/'.$v_state->state_english.'/'.$v_city->city_english.'/'.$data->link)?>" class="pull-left"><span class="web-color"><?= $data->title ?> </span> <?= $data->title_hindi ?></a>
                            <div class="clearfix"></div>
                        </h6>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>



<div style="height:36px;" class="visible-xs"></div>
<ul class="singlenewsbottom-social visible-xs">
    <li class="home"><a href="<?= base_url('') ?>"><i class="fa fa-home"></i></a></li>
    <li class="facebook">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('mera-shaher/'.$state->state_english.'/'.$city->city_english.'/'.$video->link)?>"><i class="fa fa-facebook"></i></a>
    </li>
    <li class="whatsapp"><a href="whatsapp://send?text=<?= base_url('mera-shaher/'.$state->state_english.'/'.$city->city_english.'/'.$video->link)?>"><i class="fa fa-whatsapp"></i></a></li>
    <li class="play"><a href="https://play.google.com/store/apps/details?id=crisil.app.android.SevenINews">
            <!-- <img src="<?= base_url() ?>assets/images/playstore.png" class="img-responsive" alt="" s> --><i class="fa fa-play"></i></a></li>
    <li class="youtube"><a href="https://www.youtube.com/channel/UCfaR8SX5u_pI9aFGY4PZZ9w"><i class="fa fa-youtube-play"></i></a></li>
</ul>
