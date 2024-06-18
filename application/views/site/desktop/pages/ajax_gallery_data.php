 <?php foreach ($gallery_data as $gallery) {
     $v_state = $this->Query->select('*','states',['country_id'=>'101','id'=>$gallery->state_id],'row','');
     $v_city = $this->Query->select('*','selected_city',['state_id'=>$gallery->state_id,'id'=>$gallery->city_id],'row');
    ?>
            <div class="col-xs-6 col-sm-4">
                <div class="newsbox">
                    <a href="<?= base_url('mera-shaher/'.$v_state->state_english.'/'.$v_city->city_english.'/'.$gallery->link)?>">
                        <img src="<?= base_url($gallery->image)?>" alt="" />
                        <div class="play-btn">
                            <i class="fa fa-play"></i>
                        </div>
                    </a>
                    <h5>
                        <a href="<?= base_url('mera-shaher/'.$v_state->state_english.'/'.$v_city->city_english.'/'.$gallery->link)?>"><span class="web-color">
                        <?= $gallery->title ?></span>  <?= $gallery->title_hindi ?></a>
                        <div class="clearfix"></div>
                        <!-- <a href="#" class="pull-right"><small><i class="fa fa-share"></i> Share</small></a> -->
                        <div class="clearfix"></div>
                    </h5>

                </div>
            </div>
            <?php } ?>