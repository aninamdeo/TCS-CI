<footer>
    <section class="footer">
        <div class="container">
            <div class="row">
            <div class="col-md-4 col-sm-12">
                    <div class=" text-center"><a href="<?= base_url() ?>" class=" text-center"><img
                            src="<?= base_url($basic_details->logo) ?>"
                            style="max-height:60px;" alt=""/></a>
                    </div>
                    <ul class="footer-links">
                        <li><?= $basic_details->about_us ?></li>
                    </ul>
                    <h4>Follow Us</h4>
                    <ul class="footer-social  pb-2">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                    <!-- <h4>App Download</h4>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-android"></i></a></li>
                        <li><a href="#"><i class="fa fa-apple"></i></a></li>
                        <li><a href="#"><i class="fa fa-mobile"></i></a></li>
                    </ul> -->
                </div>
               
                <div class="col-md-4 col-sm-6 border">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">RSS Feed</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <h4>Contact Us</h4>
                    <ul class="footer-links text-left">
                        <!-- <li><a href="#">ePaper</a></li> -->
                        <li><a href="#"><?= $basic_details->address ?></a></li>
                        <li><a href="#">Email : <?= $basic_details->email ?><</a></li>
                        <li><a href="#">Mobile : <?= $basic_details->contact ?></a></li>
                    </ul>
                </div>
               
            </div>
        </div>
    </section>
    <section class="footer-mid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="footer-mid-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a target="_blank" href="<?= base_url('sitemap.xml') ?>">Site MAP</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; Copyright @ 2019-20 <a href="<?= base_url() ?>"><?= $basic_details->site_name ?></a> | All
                        Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>
</footer>