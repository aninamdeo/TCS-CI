
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page blank-page">
    <!-- START PRELOADER-->

    <div id="preloader-wrapper">
      <div id="loader">
        <div class="line-scale-pulse-out-rapid loader-white">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <div class="loader-section section-top bg-cyan"></div>
      <div class="loader-section section-bottom bg-cyan"></div>
    </div>

    <!-- END PRELOADER-->
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-3 p-0">
        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <img src="<?= base_url($basic_details->logo) ?>" width="50%" alt="branding logo">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Administrator</span></h6>
                 <?php if(isset($msg)){ echo '<div class="error">'.$msg.'</div>'; } ?>
                   
            </div>
            <div class="card-body collapse in">
               
                <div class="card-block">
                    <form class="form-horizontal" method="post" action="<?= base_url('Login/verifylogin') ?>">
                        <fieldset class="form-group has-feedback has-icon-left">
                            <input type="text" class="form-control" name="username"  id="username" value="" placeholder="Your Username" required>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                           
                        </fieldset>
                        <fieldset class="form-group has-feedback has-icon-left">
                            <input type="password" class="form-control" name="userpassword" id="userpassword" value="" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                            
                        </fieldset>
                        
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-xs-12 float-sm-left text-xs-center"><a href="#" class="card-link">Forgot Password?</a></div>
                        </fieldset>
                        <button type="submit" class="btn btn-outline-primary btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
<!--                <p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2 my-1"><span>New to Robust ?</span></p>
                <div class="card-block">
                    <a href="register-with-bg-image.html" class="btn btn-outline-primary btn-block"><i class="icon-head"></i> Register</a>
                </div>-->
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
  