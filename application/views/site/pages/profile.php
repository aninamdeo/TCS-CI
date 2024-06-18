
<section class="single-news-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url()?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4>Profile</h4>
            </div>
        </div>
    </div>
</section>

<section class="login profile">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="login-box">
                    <img src="<?= base_url()?><?= ($user->image) ? $user->image : 'assets/images/user.jpeg'?>" class="img-responsive" alt="">
                    <div class="profile-content">
                    <h4>User Name <a href="<?= base_url('Backend/edit_profile')?>" class="btn btn-default web-btn"><i class="fa fa-pencil"></i></a></h4>                    
                    <div class="clearfix"></div>
                    </div>
                    <hr/>
                    <form action="">
                        <div class="form-group">
                            <label for="">7i News User ID:</label>
                            <input type="text" class="form-control" value="<?= $user->user_number ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Mobile No.:</label>
                            <input type="text" class="form-control" value="<?= $user->contact ?>" readonly>
                        </div>
                         <a href="<?= base_url('Backend/logout')?>" class="web-btn form-control btn-rounded" value="">Signout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

