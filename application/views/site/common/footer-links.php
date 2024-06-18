<script src="<?= base_url()?>assets/js/jquery.min.js"></script>
<script src="<?= base_url()?>assets/js/owl.carousel.js"></script>
<script src="<?= base_url()?>assets/js/script.js"></script>
<script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script>
    $(".overlay").click(function() {
        $(".overlay").hide();
    });

</script>
<script>
    $(".sharetoggle").click(function() {
        $(".custom-social").slideToggle();
    });

</script>
<script>
    function subcomnt_form(news_id, coment_id) {
        $("#main_comment").toggle();
        $("#sub_comment").toggle();
        $("#sub_comment").attr('action', '<?= base_url("Backend/news_sub_comment/")?>' + news_id + '/' + coment_id);
    }

</script>
<script>
    $(".destrict_select").change(function() {
        var id = $(".destrict_select").val();
        $.post("<?= base_url('Backend/ajax_gallery_data')  ?>", {
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
