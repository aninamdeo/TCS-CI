

<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i>
                <img src="<?= base_url($basic_details->logo) ?>" class="img-responsive logo" alt=""></a>
                <div class="login-box">
                    <form action="<?= base_url('Backend/user_login')?>" method="post">
                        <div class="form-group">
                            <label for="">Enter Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">+91</span>
                                <input type="text" class="form-control" placeholder="Mobile Number" name="contact" minlength="10" maxlength="10" onkeypress="return event.charCode >=48 && event.charCode <=57" required>
                            </div>
                        </div>
                        <input type="submit" class="web-btn form-control btn-rounded" value="Login">
                    </form>
                </div>
               <p>By proceeding, you agree to our <br/><a href="<?= base_url('Backend/page/Terms')?>" class="link">Terms & Conditions</a> & <a href="<?= base_url('Backend/page/Privacy')?>" class="link">Privacy Policy</a>
               </p>
            </div>
        </div>
    </div>
</section>

