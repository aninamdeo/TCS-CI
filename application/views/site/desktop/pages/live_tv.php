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
                <h4> LIVE TV</h4>
            </div>
        </div>
    </div>
</section>
<section class="front-news">
    <div class="container">
        <div class="row">
             <div class="col-xs-12">
             <iframe width="100%" height="500" src="<?= $basic_details->live_tv ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               <!--  <video https://www.youtube.com/embed/LKTNg0-EjeE
                  controls
                  height="auto"
                  width="100%"
                  src="http://167.99.227.149:8080/hls/paigam.m3u8"
                  data-viblast-key="44cd3ae4-0401-4fc4-91cf-c516e2ffc86c"
                  data-viblast-enable-realtime-logger="true"
                  autoplay="true"  >

                </video> -->
           
                <hr />
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
