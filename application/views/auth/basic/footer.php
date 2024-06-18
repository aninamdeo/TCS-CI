<div class="clearfix"></div>
</div>
</div>
<footer class="footer footer-static footer-light navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="http://www.crisilinfotech.com" target="_blank">CRISIL INFOTECH </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info white">
                <h4 class="modal-title white" id="myModalLabel8"><i class="la la-gears"></i> <span id="modal-header">Basic Modal</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="modal-value">

            </div>
        </div>

    </div>
</div>
<script src="<?= base_url('asset/auth') ?>/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/jquery.cookie.js" type="text/javascript"></script>

<script src="<?= base_url('asset/auth') ?>/js/core/jquery.amsify.suggestags.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/core/multiple-select.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/core/jquery.multiselect.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('asset/auth') ?>/js/moment.js"></script>
<script type="text/javascript" src="<?= base_url('asset/auth') ?>/js/jquery-ui-timepicker-addon.js"></script>
<script>
    $('.datetimepicker').timepicker({timeFormat: 'hh:mm tt'});
    $(".datepicker").datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});</script>
<script type="text/javascript" src="<?= base_url('asset/auth') ?>/vendors/js/ui/jquery.sticky.js"></script>
<script type="text/javascript" src="<?= base_url('asset/auth') ?>/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>

<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/jquery.raty.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/jquery.knob.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/wNumb.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/extensions/nouislider.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/core/app.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/scripts/extensions/knob.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/scripts/pages/content-sidebar.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/bootstrap-checkbox.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('asset/auth') ?>/vendors/js/owl.carousel.js"></script>
<script src="<?= base_url('asset/auth') ?>/js/printThis.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/pdfmake.min.js" type="text/javascript"></script>
<script src="<?= base_url('asset/auth') ?>/js/vfs_fonts.js" type="text/javascript"></script>
<script>
    function print_this(print_header) {
        $(".print_container").printThis({
            importCSS: true,
            importStyle: true,
            header: print_header,
            loadCSS: "<?= base_url('asset/auth') ?>/css/print.css"
        });
    }
    function export_this() {
        var doc = new jsPDF();
        var content = $('.export_container').html();
        doc.text(content, 10, 10);
        doc.save('a4.pdf');
    }
</script>
<script type="text/javascript">

    $('.checkbox').checkboxpicker({
        html: true,
        offLabel: 'Disabled',
        onLabel: 'Enabled'
    });
    $(function () {
        var top = parseInt($.cookie("top"));
        if (top)
            $(document).scrollTop(top);
        $(document).scroll(function () {
            var top = $(document).scrollTop();
            $.cookie("top", top);
        })
    });
    $(document).ready(function () {
        $("button[type='submit']").click(function () {
            $('.blobs').show();
        });
    });</script>
<script type="text/javascript">
    $(function () {
        var top = parseInt($.cookie("top"));
        if (top)
            $(document).scrollTop(top);
        $(document).scroll(function () {
            var top = $(document).scrollTop();
            $.cookie("top", top);
        })
    });
   
</script>
<script>
    $(".datepicker").datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
    $(function ()
    {
        $multiple1 = $('#multiple1');
        $multiple1.multiselect({});
        $multiple2 = $('#multiple2');
        $multiple2.multiselect({});
    });
    $('.tag-input').amsifySuggestags();
    function img_script(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img' + id).show();
                $('#img' + id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function restart_scripts() {
        $(".datepicker").datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true});
        $('.checkbox').checkboxpicker({
            html: true,
            offLabel: 'Disabled',
            onLabel: 'Enabled'
        });
        CKEDITOR.replace('ckeditor1', {
            //extraPlugins: 'imageuploader'
        });

    }
    CKEDITOR.replace('ckeditor', {
        //extraPlugins: 'imageuploader'
    });
    CKEDITOR.replace('ckeditor2', {
        //extraPlugins: 'imageuploader'
    });
    CKEDITOR.replace('ckeditor3', {
        //extraPlugins: 'imageuploader'
    });

    CKEDITOR.plugins.add('imageuploader', {
        init: function (editor) {
            editor.config.filebrowserBrowseUrl = '<?= base_url() ?>asset/auth/vendors/ckeditor/plugins/imageuploader/imgbrowser.php';
        }
    });

</script>
<?php
if ($msg[0] == 'Error') {
    echo '<script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("#err_msg").addClass("show");
                }, 1000);
                setTimeout(function () {
                    $("#err_msg").removeClass("show");
                }, 5000);
            });
        </script>';
} elseif ($msg[0] == 'Success') {
    echo '<script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("#success_msg").addClass("show");
                }, 500);
                setTimeout(function () {
                    $("#success_msg").removeClass("show");
                }, 5000);
            });
        </script>';
}
?>
<?php ?>
 <script>
   var expanded = false;
   document.getElementById("checkboxes").style.display = "none";
function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
      checkboxes.style.display = "block";
       expanded = true;
  }else{
      checkboxes.style.display = "none";
      expanded = false;
  }
}
</script>
 <script>
   var expanded = false;
function showCheckboxes1() {
  var checkboxes1 = document.getElementById("checkboxes1");
  if (!expanded) {
       checkboxes1.style.display = "block";
       expanded = true;
  }else{
      checkboxes1.style.display = "none";
      expanded = false;
  }
}
</script>
 
</body>
</html>