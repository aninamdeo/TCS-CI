<div id="main-menu" data-scroll-to-active="true" class="main-menu menu-dark menu-fixed menu-shadow menu-accordion">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <br>
            <br>
            <br>

            <li <?= $p1 ?> >
                <a href="<?= base_url('Webadmin') ?>">
                    <i class="icon-graphic_eq"></i>
                    <span data-i18n="nav.morris_charts.main" class="menu-title">Dashboard</span>
                </a>
            </li>
            
            <li <?= $p2 ?> >
                <a href="<?= base_url('') ?>Admin/Basic_details">
                    <i class="icon-cog"></i>
                    <span data-i18n="nav.morris_charts.main" class="menu-title">Basic Details</span>
                </a>
            </li>
            
            <li <?= $p40 ?> >
                <a href="<?= base_url('') ?>Admin/Basic_details/view_enquiry">
                    <i class="icon-comments"></i>
                    <span data-i18n="nav.morris_charts.main" class="menu-title">Enquiries</span>
                </a>
            </li>
            
            <li <?= $p11 ?> >
                <a href="<?= base_url('') ?>Admin/City_Master/">
                    <i class="icon-sitemap"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Add State & City</span>
                </a>
            </li>

           <!--  <li class=" nav-item">
                <a href="#">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.dash.main" class="menu-title">Category</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p3 ?>>
                        <a href="<?= base_url('') ?>Admin/Category/add_category" data-i18n="nav.dash.project" class="menu-item">Add Category</a>
                    </li>
                    <li <?= $p4 ?>>
                        <a href="<?= base_url('') ?>Admin/Category" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Category</a>
                    </li>
                </ul>
            </li> -->
            
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-bar-chart"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Category</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p5 ?>>
                        <a href="<?= base_url('') ?>Admin/Sub_Category/add_sub_category" data-i18n="nav.dash.project" class="menu-item">Add Category</a>
                    </li>
                    <li <?= $p6 ?>>
                        <a href="<?= base_url('') ?>Admin/Sub_Category/" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Category</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-bar-chart"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Sub Category</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p5 ?>>
                        <a href="<?= base_url('') ?>Admin/Sub_Category/add_subb_category" data-i18n="nav.dash.project" class="menu-item">Add Sub Category</a>
                    </li>
                    <li <?= $p6 ?>>
                        <a href="<?= base_url('') ?>Admin/Sub_Category/show_sub_cat" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Sub Category</a>
                    </li>
                </ul>
            </li>
            
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-align-justify"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">News Description</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p7 ?>>
                        <a href="<?= base_url('') ?>Admin/News_Desp/add_news_desp" data-i18n="nav.dash.project" class="menu-item">Add News Description</a>
                    </li>
                    <li <?= $p8 ?>>
                        <a href="<?= base_url('') ?>Admin/News_Desp/" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete News </a>
                    </li>
                </ul>
            </li>
            
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-xing"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Slider</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p9 ?>>
                        <a href="<?= base_url('') ?>Admin/Slider/add_slider" data-i18n="nav.dash.project" class="menu-item">Add Slider</a>
                    </li>
                    <li <?= $p10 ?>>
                        <a href="<?= base_url('') ?>Admin/Slider" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Slider</a>
                    </li>
                </ul>
            </li>
            
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-paste"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Page</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p12?>>
                        <a href="<?= base_url('') ?>Admin/Page/add_page" data-i18n="nav.dash.project" class="menu-item">Add Page</a>
                    </li>
                    <li <?= $p13 ?>>
                        <a href="<?= base_url('') ?>Admin/Page/page" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Page</a>
                    </li>
                </ul>
            </li> 
            
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-trello"></i>
                    <span data-i18n="nav.dash.main" class="menu-title">Ads</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p26 ?>>
                        <a href="<?= base_url('') ?>Admin/Ads" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Ads</a>
                    </li>
                </ul>
            </li>
<!--
           <li <?= $p9 ?> >
                <a href="<?= base_url('') ?>Admin/About_us">
                    <i class="icon-home3"></i>
                    <span data-i18n="nav.morris_charts.main" class="menu-title">About Us</span>
                </a>
            </li>
           <li class=" nav-item">
                <a href="#">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.dash.main" class="menu-title">Services</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p10 ?>>
                        <a href="<?= base_url('') ?>Admin/Services/add_service" data-i18n="nav.dash.project" class="menu-item">Add Services</a>
                    </li>
                    <li <?= $p11 ?>>
                        <a href="<?= base_url('') ?>Admin/Services" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Services</a>
                    </li>
                </ul>
            </li>
             <li class=" nav-item">
                <a href="#">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.dash.main" class="menu-title">Gallery</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p12 ?>>
                        <a href="<?= base_url('') ?>Admin/Gallery/add_gallery" data-i18n="nav.dash.project" class="menu-item">Add Gallery</a>
                    </li>
                    <li <?= $p13 ?>>
                        <a href="<?= base_url('') ?>Admin/Gallery" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Gallery</a>
                    </li>
                </ul>
            </li>
             <li class=" nav-item">
                <a href="#">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.dash.main" class="menu-title">Testimonial</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p14 ?>>
                        <a href="<?= base_url('') ?>Admin/Testimonials/add_testimonials" data-i18n="nav.dash.project" class="menu-item">Add Testimonial</a>
                    </li>
                    <li <?= $p15 ?>>
                        <a href="<?= base_url('') ?>Admin/Testimonials" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Testimonial</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.dash.main" class="menu-title">Our Team</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p18 ?>>
                        <a href="<?= base_url('') ?>Admin/Team/add_team" data-i18n="nav.dash.project" class="menu-item">Add Team</a>
                    </li>
                    <li <?= $p19 ?>>
                        <a href="<?= base_url('') ?>Admin/Team" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Team</a>
                    </li>
                </ul>
            </li>
             <li class=" nav-item">
                <a href="#">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.dash.main" class="menu-title">Partners</span>
                </a>
                <ul class="menu-content">
                    <li <?= $p16 ?>>
                        <a href="<?= base_url('') ?>Admin/Partners/add_partners" data-i18n="nav.dash.project" class="menu-item">Add Partners</a>
                    </li>
                    <li <?= $p17 ?>>
                        <a href="<?= base_url('') ?>Admin/Partners" data-i18n="nav.dash.ecommerce" class="menu-item">Edit/Delete Partners</a>
                    </li>
                </ul>
            </li>
            <li <?= $p39 ?> >
                <a href="<?= base_url('') ?>Admin/Basic_details/social">
                    <i class="icon-home3"></i>
                        <span data-i18n="nav.morris_charts.main" class="menu-title">Social Links</span>
                </a>
            </li> 
        -->

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </ul>
</div>
<!-- /main menu content-->

<!-- main menu footer-->

<div class="main-menu-footer footer-close">

    <div class="header text-xs-center"><a href="#" class="col-xs-12 footer-toggle"><i class="icon-ios-arrow-up"></i></a></div>

    <div class="content">

      <div class="insights">

        <div class="col-xs-12">

          <p>Total News</p>

          <progress value="25" max="100" class="progress progress-xs progress-success"><?= $news_count?> News
          </progress>

      </div>

      <div class="col-xs-12">

          <p>Total Enquiries</p>

          <progress value="70" max="100" class="progress progress-xs progress-info">70%</progress>

      </div>

  </div>

  <div class="actions"><a href="<?= base_url('Webadmin')?>" data-placement="top" data-toggle="tooltip" data-original-title="Dashboard"><span aria-hidden="true" class="icon-graphic_eq"></span>
  </a>
  <a href="<?= base_url('Admin/Basic_details')?>" data-placement="top" data-toggle="tooltip" data-original-title="Basic Details"><span aria-hidden="true" class="icon-cog"></span></a><a href="<?= base_url('Webadmin/logout') ?>" data-placement="top" data-toggle="tooltip" data-original-title="Logout"><span aria-hidden="true" class="icon-power3"></span></a></div>

</div>

</div>

<!-- main menu footer-->

</div>

<!-- / main menu-->

<div class="robust-content content container-fluid">

  <div class="content-wrapper">

    <div class="content-header row">

      <div class="breadcrumb-wrapper col-xs-12">

        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a>

          </li>

          <li class="breadcrumb-item"><a href="#"><?= $page ?></a>

          </li>
          
        </ol>

  </div>

