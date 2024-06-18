
<section class="single-news-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <a href="<?= base_url('Backend/profile')?>"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-xs-10">
                <h4>Edit Profile</h4>
            </div>
        </div>
    </div>
</section>

<section class="login profile edit-profile">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="login-box">
                    <img src="<?= base_url()?><?= ($user->image) ? $user->image : 'assets/images/user.jpeg'?>" class="img-responsive" alt="">
                    <div class="profile-content">
                        <h4>Profile</h4>
                        <div class="clearfix"></div>
                    </div>
                    <hr />
                    <form action="<?= base_url('Backend/update_profile')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $user->name ?>" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="xxxxxxxxxx@7inews.in" value="<?= $user->email ?>">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" id="sizing-addon2">+91</span>
                                <input type="text" class="form-control" placeholder="Mobile Number" value="<?= $user->contact ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                           <select name="gender" class="form-control" required="" >
                               <option value="">Select Gender</option>
                               <option <?= ($user->gender=='Male') ? 'selected' : ''?> value="Male">Male</option>
                               <option <?= ($user->gender=='Female') ? 'selected' : ''?> value="Female">Female</option>
                               <option <?= ($user->gender=='Other') ? 'selected' : ''?> value="Other">Other</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="birth_date" value="<?= date('Y-m-d',strtotime($user->birth_date)) ?>" placeholder="Date of Birth">
                        </div>
                        <div class="form-group">
                            <label>Upload Profile Image</label>
                            <input type="file" name="file" class="form-control" >
                            <input type="hidden" name="old_file" value="<?= $user->image ?>">
                        </div>
                        <input type="submit" class="web-btn form-control btn-rounded" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

