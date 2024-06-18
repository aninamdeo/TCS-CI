<section class="single-news-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-10">
                <h4>Verify OTP</h4>
            </div>
        </div>
    </div>
</section>
<section class="front-news" style="margin-top: 10px;">
    <div class="container">
        <div class="row">
             <div class="col-xs-12 col-md-offset-3 col-md-9">
             <div class="login-box">
                    <form action="<?= base_url('Web/mob_verify_otp')?>" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter 6 digit OTP" name="otp" minlength="6" maxlength="6" onkeypress="return event.charCode >=48 && event.charCode <=57" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                         
                        <input type="submit" class="web-btn form-control" value="Verify OTP">
                      
                        </div>
                    </form>
                </div>
                <hr />
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>



