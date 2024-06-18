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
                        <a href="#" class="pull-right"><small><i class="fa fa-share"></i> Share</small></a>
                        <div class="clearfix"></div>
                    </h6>

                </div>
            </div>
            <?php } ?>