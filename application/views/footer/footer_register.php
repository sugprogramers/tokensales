
<!-- Core  -->
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2"></script>


<!-- Plugins -->
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/switchery/switchery.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/intro-js/intro.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/screenfull/screenfull599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/toastr/toastr.min599c.js?v4.0.2"></script>
  

<!-- Plugins For This Page -->
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/jquery-placeholder/jquery.placeholder599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min599c.js?v4.0.2"></script>

<!-- Scripts -->
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Component.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Plugin.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Base.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Config.min599c.js?v4.0.2"></script> 

<script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/Section/Menubar.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/Section/Sidebar.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/Section/PageAside.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/Plugin/menu.min599c.js?v4.0.2"></script>

<!-- Config -->
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/config/colors.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/config/tour.min599c.js?v4.0.2"></script>
<script>
    Config.set('assets', '<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets');
</script>

<!-- Page -->
<script src="<?php echo base_url() . "themes/default/remark/topbar"; ?>/assets/js/Site.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Plugin/switchery.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Plugin/jquery-placeholder.min599c.js?v4.0.2"></script>
<script src="<?php echo base_url() . "themes/default/remark"; ?>/global/js/Plugin/bootstrap-datepicker.min599c.js?v4.0.2"></script>

<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>

<script>
    function showWarning(val) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr["warning"](val, "Alert");

    }

    function showSuccess(val) {


        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr["success"](val, "Success");
    }

    function showError(val) {


        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "2000",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr["error"](val, "Error");
    }

</script>

</body>


<!-- Mirrored from getbootstrapadmin.com/remark/topbar/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 Jul 2018 16:06:42 GMT -->
</html>