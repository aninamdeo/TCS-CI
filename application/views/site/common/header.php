<header>
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= base_url('Backend') ?>" class="logo"><img src="<?= base_url( $basic_details->logo)?>" class="img-responsive" alt=""></a>
                    <div class="responsive-tabs">
                        <ul class="header-tabs">
                             <li class="<?= ($pagetitle == 'टॉप न्यूज़') ? 'active' : ''?>"><a href="<?= base_url('Backend/top_news/Yes')?>">टॉप न्यूज़</a></li>
                            <?php $i=1; foreach($category_data as $cat){ 
                                if($cat->cat_name_hindi==$pagetitle ) {
                                       $i='active';
                                }else{
                                    $i='';
                                }?>
                            <li class="<?= $i?>"><a href="<?= base_url('Backend/c_wise/'.$cat->id)?>"><?= $cat->cat_name_hindi ?></a></li>
                            <?php $i++; } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
<!-- <a href="<?= base_url()?>" class="livetv"><img src="<?= base_url() ?>assets/images/tv.gif" alt=""></a> -->
<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
    <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
    <span class="hamb-bottom"></span>
</button>
<div id="wrapper">
    <div class="overlay hamburger is-closed" data-toggle="offcanvas"></div>
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <div class="sidebar-header">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 text-center">
                        मेन्यू
                    </div>

                    <!--
                    <div class="col-xs-4 text-right">
                        <a href="#"><i class="fa fa-bell"></i></a>
                        <a href="#"><i class="fa fa-cogs"></i></a>
                    </div>
                    -->

                </div>

            </div>

        </div>



        <div class="container">
            <div class="sidebar-profile">
                <a href="<?= base_url()?><?= ($this->session->userdata('user_id')) ? 'Backend/profile' : 'Backend/login'?>">
                    <?php if($user){ ?>
                    <img src="<?= base_url()?><?= ($user->image) ? $user->image : 'assets/images/user.jpeg'?>" class="img-responsive" alt="">
                    <?php }else{ ?>
                    <img src="<?= base_url()?>assets/images/user.jpeg" class="img-responsive" alt="">
                    <?php } ?>
                </a>
                <div class="content">
                    User Name
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav sidebar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">मेरा राज्य / मेरा क्षेत्र<span class="fa fa-angle-down pull-right"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php  foreach($state_data as $state){?>
                    <li><a href="<?= base_url('Backend/state_gallery/'.$state->id )?>"><?= $state->name ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="<?= ($pagetitle == 'टॉप न्यूज़') ? 'active' : ''?>"><a href="<?= base_url('Backend/top_news/Yes')?>">टॉप न्यूज़</a></li>
            <?php $i=1; foreach($category_data as $cate){
                $sub_cat1 = $this->Query->select('*', 'sub_category',['status'=>'Enabled','cat_id'=>$cate->id], 'result',['sub_ordering'=>'asc']);
                if($sub_cat1){
             ?>
            <li class="dropdown">
                <a href="<?= base_url('Backend/c_wise/'.$cate->id)?>" class="dropdown-toggle" data-toggle="dropdown"><?= $cate->cat_name_hindi ?><span class="fa fa-angle-down pull-right"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php foreach($sub_cat1 as $scat) { ?>
                    <li><a href="<?= base_url('Backend/s_wise/'.$scat->cat_id.'/'.$scat->sub_category_id) ?>"><?= $scat->sub_category_name?></a></li>
                    <?php } ?>
                </ul>

            </li>
            <?php }else{ ?>
            <li class="dropdown">
                <a href="<?= base_url('Backend/c_wise/'.$cate->id)?>" class=""><?= $cate->cat_name_hindi ?></a>
            </li>
            <?php } ?>
            <?php } ?>
            <!--             <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">एंटरटेनमेंट <span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">बॉलीवुड</a></li>

                    <li><a href="#">ह्यूमर</a></li>

                    <li><a href="#">नो फेक न्यूज़</a></li>

                    <li><a href="#">इंटरेस्टिंग</a></li>

                </ul>

            </li>

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">यूटिलिटी<span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">टेक</a></li>

                    <li><a href="#">ऑटो</a></li>

                    <li><a href="#">हेल्थ &amp; फ़ूड</a></li>

                    <li><a href="#">मेरा अधिकार</a></li>

                </ul>

            </li>

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">गैलरी<span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">फोटो</a></li>

                    <li><a href="#">वीडियो</a></li>

                </ul>

            </li>

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">जीवन मंत्र<span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">दैनिक राशिफल</a></li>

                    <li><a href="#">पंचांग</a></li>

                    <li><a href="#">उपाय</a></li>

                    <li><a href="#">धर्म</a></li>

                    <li><a href="#">हस्तरेखा</a></li>

                    <li><a href="#">वास्तु</a></li>

                    <li><a href="#">पूजा </a></li>

                </ul>

            </li>

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">वीमेन<span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">जननी</a></li>

                    <li><a href="#">लाइफस्टाइल</a></li>

                    <li><a href="#">रिलेशनशिप</a></li>

                    <li><a href="#">फैशन</a></li>

                    <li><a href="#">हैप्पी लाइफ</a></li>

                    <li><a href="#">होम डेकोर</a></li>

                    <li><a href="#">ब्यूटी</a></li>

                </ul>

            </li>

            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">मेरा शहर<span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">मेरा शहर</a></li>

                </ul>

            </li> 
            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">7i एक्सक्लूसिव<span class="fa fa-angle-down pull-right"></span></a>

                <ul class="dropdown-menu" role="menu">

                    <li><a href="#">परदे के पीछे</a></li>

				    <li><a href="#">मैनेजमेंट फंडा</a></li>

                </ul>

            </li> -->

        </ul>

    </nav>

    <!-- /#sidebar-wrapper -->



</div>

<!-- /#wrapper -->

<div style="height:108px;"></div>
<section class="front-news">
    <div class="container">
        <div class="row"> 
            <div class="col-xs-12 clr-btns">
                <?php $i=1; foreach ($other_cat as $scat) {
                if($i==1){
                $btn= '';
                }elseif ($i%2 == 0 && $i != '4') {
                $btn= 'yellow-btn';
                }elseif ($i%3 == 0) {
                $btn= 'green-btn';
                }elseif ($i == 4) {
                $btn= 'red-btn';
                }else{
                $btn= '';
                }
                ?>
                <a href="<?= base_url('Backend/c_wise/'.$scat->id)?>" class="btn btn-default web-btn <?= $btn ?>"><?= $scat->cat_name_hindi?></a>
                <?php $i++; } ?>
                <!-- <a href="<?= $basic_details->live_tv?>" target="_blank" class="btn btn-default web-btn blinking" >LIVE TV</a> -->
                <!--  <a href="" class="btn btn-default web-btn yellow-btn">डीबी ओरिजिनल</a>
                <a href="" class="btn btn-default web-btn green-btn">इवेंट कैलेंडर</a> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<style>
    .blinking {
        text-shadow: 1px 1px #000;
        font-weight: 750;
        animation: blinkingText 1s infinite;
    }

    @keyframes blinkingText {
        0% {
            color: yellow;
        }

        49% {
            color: yellow;
        }

        50% {
            color: #fff;
        }

        99% {
            color: transparent;
        }

        100% {
            color: yellow;
        }
    }

</style>
