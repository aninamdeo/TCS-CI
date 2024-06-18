<script src="<?= base_url('assets/desktop/')?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/desktop/')?>js/owl.carousel.js"></script>
<script src="<?= base_url('assets/desktop/')?>js/script.js"></script>
<script src="<?= base_url('assets/desktop/')?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script>
$(".mobileoverlay").click(function () {
    $(".mobileoverlay").hide();
});
</script>
<script>
    $(".sharetoggle").click(function() {
        $(".custom-social").slideToggle();
    });

    $(".commentbtn").click(function() {
        $(".comment-box").slideToggle();
    });
     $(".subcommentbtn").click(function() {
        $(".subcomment-box").slideToggle();
    });

</script>

<script>
    $(".destrict_select").change(function() {
        var id = $(".destrict_select").val();
        $.post("<?= base_url('Web/ajax_gallery_data')  ?>", {
                'dist_id': id
            })
            .done(function(data) {
                $(".district_gallery").html(data);
            });
    });

</script>
<?php if ($this->session->flashdata('swal_model') == 'true') { ?>
<script>
    $(document).ready(function() {
        swal({ 
         <?php if($this->session->flashdata('msg') == 'error') {?>
                title: "Oops !!!",
                    text: "Something went wrong !",
                    icon: "error",
         <?php }elseif($this->session->flashdata('msg') == 'signup') {?>
                title: "Welcome To 7inews",
                    text: " Thank You For Registering with us ",
                    icon: "success", 
        <?php  }elseif($this->session->flashdata('msg') == 'verified') {?>
                title: "Welcome To 7inews",
                    text: " Mobile Number Verified Successfully ",
                    icon: "success", 
        <?php  }else{  ?>
                title: "Something happened wrong , Try Again !!!",
                    text: " ",
                    icon: "error", 
        <?php  } ?>
            timer : 2000,
            buttons : false,
            // dangerMode: true
        });
    });

</script>
<?php } ?>
</body>

</html>
