<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
                <img src="<?= base_url($basic_details->logo) ?>" class="img-responsive logo" alt="">
                <div class="login-box">
                    <form action="<?= base_url('Backend/verify_otp')?>" method="post">
                        <div class="form-group">
                            <label for="">OTP</label>
                            <!-- <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">+91</span>
                                <input type="number" class="form-control"  name="contact" minlength="6" maxlength="6" onkeypress="return event.charCode >=48 && event.charCode <=57" value="<?= $this->session->userdata('user_contact')?>" required>
                            </div> -->
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Enter 6 digit OTP" name="otp" minlength="6" maxlength="6" onkeypress="return event.charCode >=48 && event.charCode <=57" required>
                            </div>
                        </div>
                        <input type="submit" class="web-btn form-control btn-rounded" value="Verify OTP">
                    </form>
                </div>
                <!-- After mobile number verification,you will be able to see all news description -->
               <p> <br/>
               <a href="<?= base_url('Backend/')?>" class="link">BACK</a> 
               </p>
            </div>
        </div>
    </div>
</section>

