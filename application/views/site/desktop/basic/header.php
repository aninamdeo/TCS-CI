<div class="topmainwrapper">
<header id="Header" class="hidden-xs">
    <section class="headertop">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url() ?>"><img src="<?= base_url( $basic_details->logo)?>" class="img-responsive logo" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <section class="header-bottom">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
         <!-- टॉप न्यूज़ <a class="navbar-brand" href="#">Brand</a>-->
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="<?= ($pagetitle == 'टॉप न्यूज़') ? 'active' : ''?>"><a href="<?= base_url()?>">टॉप न्यूज़</a></li>
                        <?php $i=1; foreach($category_data as $cat){ 
                                if($cat->cat_name_hindi==$pagetitle ) {
                                       $i='active';
                                }else{
                                    $i='';
                                }?>
                        <li class="<?= $i?>"><a href="<?= base_url($cat->cat_name)?>"><?= $cat->cat_name_hindi ?></a></li>
                        <?php $i++; } ?>
                       
                        <li>
                            <button type="button" class="desktophamburger is-closed" data-toggle="offcanvas">
                                <span class="hamb-top"></span>
                                <span class="hamb-middle"></span>
                                <span class="hamb-bottom"></span>
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li class="livetv"><a href="<?= base_url('Web/live_tv')?>"><img src="<?= Base_url() ?>assets/desktop/images/tv.gif" class="img-responsive" alt=""></a></li> -->
                        <!--  <li><a href="#"><i class="fa fa-commenting"></i></a></li>
                        <li><a href="#"><i class="fa fa-bell"></i></a></li>
                        <li><a href="#"><i class="fa fa-search"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</header>
<div id="desktopwrapper" class="hidden-xs">
    <!--    <div class="desktopoverlay"></div>-->

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <div class="desktopmenucontent">
           <?php $k=1; foreach ($other_cat as $special_categoty) {  if($k==1){
                    $btncolor= '';
                }elseif ($k%2 == 0 && $k != '4') {
                    $btncolor= 'yellow-btn';
                }elseif ($k%3 == 0) {
                    $btncolor= 'green-btn';
                }elseif ($k == 4) {
                    $btncolor= 'red-btn';
                }else{
                    $btncolor = '';
                   } ?>
                <a href="<?= ($special_categoty->id == 30) ?  base_url('Videos/bulletin') : base_url($special_categoty->cat_name) ?>" class="btn btn-default web-btn <?= $btncolor ?>"><?= $special_categoty->cat_name_hindi?></a>
                <?php $k++; } ?>
             <div class="row">
                <?php $s=1; 
                foreach ($sidebar_category_data as $side_cate) {
                    if($s%2==0){
                        $color = 'purple';
                    }elseif($s%3==0 || $s%5==0) {
                        $color = 'green';
                    }elseif($s%7==0 || $s%11==0) {
                        $color = 'blue';
                    }else{
                         $color = '';
                    }
                $side_sub_category = $this->Query->select('*','sub_category',['cat_id'=>$side_cate->id,'status'=>'Enabled'],'result',['sub_ordering'=>'asc']);
                    ?>
                <div class="col-md-3 col-sm-6">
                    <div class="menubox <?= $color ?>">
                        <h4><a href="<?= base_url($side_cate->cat_name)?>"><?= $side_cate->cat_name_hindi ?></a></h4>
                        <?php if($side_sub_category){ ?>
                        <ul>
                        <?php  foreach ($side_sub_category as $side_sub_cate) {?>
                        <li><a href="<?= base_url($side_cate->cat_name.'/'.$side_sub_cate->sub_category_link)?>"><?= $side_sub_cate->sub_category_name?></a></li>
                        <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <?php $s++; } ?>
                 <div class="col-md-3 col-sm-6">
                    <div class="menubox">
                         <h4>मेरा राज्य / मेरा क्षेत्र</h4>
                         <ul>
                            <?php  foreach($state_data as $state){?>
                                <li><a href="<?= base_url('mera-shaher/'.$state->state_english)?>"><?= $state->name ?></a></li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /#sidebar-wrapper -->
</div>
<div class="visible-xs">
    <section class="mobileheader">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= base_url('') ?>" class="logo"><img src="<?= base_url( $basic_details->logo)?>" class="img-responsive" alt=""></a>
                    <div class="responsive-tabs">
                        <ul class="header-tabs">
                            <li class="<?= ($pagetitle == 'टॉप न्यूज़') ? 'active' : ''?>"><a href="<?= base_url('Top-News')?>">टॉप न्यूज़</a></li>
                            <?php $i=1; foreach($category_data as $cat){ 
                                if($cat->cat_name_hindi==$pagetitle ) {
                                       $i='active';
                                }else{
                                    $i='';
                                }?>
                            <li class="<?= $i?>"><a href="<?= base_url($cat->cat_name)?>"><?= $cat->cat_name_hindi ?></a></li>
                            <?php $i++; } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <a href="<?= base_url('Web/live_tv')?>" class="moblivetv"><img src="<?= base_url() ?>assets/images/tv.gif" alt=""></a> -->
    <button type="button" class="mobilehamburger is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </button>
    <div id="mobilewrapper">
        <div class="mobileoverlay mobilehamburger is-closed" data-toggle="offcanvas"></div>
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <div class="sidebar-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            मेन्यू
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="sidebar-profile">
                    <a href="<?= base_url()?><?= ($this->session->userdata('user_id')) ? 'Web/profile' : 'Web/login'?>">
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
                        <li><a href="<?= base_url('mera-shaher/'.$state->state_english)?>"><?= $state->name ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="<?= ($pagetitle == 'टॉप न्यूज़') ? 'active' : ''?>"><a href="<?= base_url('Top-News')?>">टॉप न्यूज़</a></li>
                <?php $i=1; foreach($category_data as $cate){
                $sub_cat1 = $this->Query->select('*', 'sub_category',['status'=>'Enabled','cat_id'=>$cate->id], 'result',['sub_ordering'=>'asc']);
                if($sub_cat1){
             ?>
                <li class="dropdown">
                    <a href="<?= base_url($cate->cat_name)?>" class="dropdown-toggle" data-toggle="dropdown"><?= $cate->cat_name_hindi ?><span class="fa fa-angle-down pull-right"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach($sub_cat1 as $scat) { ?>
                        <li><a href="<?= base_url($cate->cat_name.'/'.$scat->sub_category_link)?>"><?= $scat->sub_category_name?></a></li>
                        <?php } ?>
                    </ul>

                </li>
                <?php }else{ ?>
                <li class="dropdown">
                    <a href="<?= base_url($cate->cat_name)?>" class=""><?= $cate->cat_name_hindi ?></a>
                </li>
                <?php } ?>
                <?php } ?>
            </ul>
        </nav>
    </div>
    <div style="height:108px;"></div>
</div>


<section class="front-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clr-btns">
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
                   }?>
                 <a href="<?= ($scat->id == 30) ?  base_url('Videos/bulletin') : base_url($scat->cat_name) ?>" class="btn btn-default web-btn <?= $btn ?>"><?= $scat->cat_name_hindi?></a>
                <?php $i++; } ?>
            </div>
        </div>
    </div>
</section>
</div>