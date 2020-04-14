<script src="<?php echo base_url() ?>assets/backend/template/assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url() ?>assets/backend/template/assets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>assets/backend/template/assets/js/menu.js"></script>




<script src="<?php echo base_url() ?>assets/backend/template/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/js/pcoded.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/prism/js/prism.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/js/horizontal-menu.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/js/pages/ac-slider.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/data-tables/js/datatables.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/js/menu-setting.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/lightbox2-master/js/lightbox.min.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/js/pages/data-styling-custom.js"></script>

<script src="<?php echo base_url() ?>assets/backend/template/assets/plugins/multi-select/js/jquery.quicksearch.js"></script>



<script type="text/javascript">
    // Collapse menu
    (function() {
        if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
            return;
        }
        try {
            window.layoutHelpers.setCollapsed(
                localStorage.getItem('layoutCollapsed') === 'true',
                false
            );
        } catch (e) {}
    })();
    $(function() {
        // Initialize sidenav
        $('#layout-sidenav').each(function() {
            new SideNav(this, {
                orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
            });
        });

        // Initialize sidenav togglers
        $('body').on('click', '.layout-sidenav-toggle', function(e) {
            e.preventDefault();
            window.layoutHelpers.toggleCollapsed();
            if (!window.layoutHelpers.isSmallScreen()) {
                try {
                    localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                } catch (e) {}
            }
        });
    });
    $(document).ready(function() {
        $("#pcoded").pcodedmenu({
            MenuTrigger: 'hover',
            SubMenuTrigger: 'hover',
            themelayout: 'horizontal',
        });
    });
</script>

<script>
    $(document).ready(function() {
        // [ lightbox ]
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).jquLightbox();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau upload file disini!',
                replace: 'Drag atau upload file disini atau klik untuk menimpa!',
                remove: 'dihapus',
                error: 'Error'
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".phone").inputmask({
            mask: "9999-9999-9999"
        });
        $(".nim").inputmask({
            mask: "99999999"
        });
        $(".slot").inputmask({
            mask: "999"
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
</script>
<script>
    $("body").on("click", ".remove-data", function(e) {
        e.preventDefault();
        var targetUrl = $(this).attr("href");
        var id = $(this).attr("data-id");
        swal({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak bisa dikembalikan lagi!",
            icon: 'warning',
            width: 500,
            dangerMode: true,
            buttons: {
                cancel: 'Batal',
                delete: 'Hapus'
            }
        }).then(function(willDelete) {
            if (willDelete) {
                var postData = {};
                postData["id"] = id;
                $.post(targetUrl, postData, function(willDelete) {
                    swal("Data berhasil dihapus!", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                    });
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#tanggal_pelaksanaan').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });
    });
</script>

<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')) { ?>

            function notify(message, type) {
                $.growl({
                    icon: 'feather icon-check',
                    title: 'Berhasil!',
                    message: message,
                }, {
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    spacing: 10,
                    z_index: 999999,
                    delay: 2500,
                    timer: 5000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    icon_type: 'class',
                    template: '<div data-growl="container" style="width:30%;height:80px;" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="icon"></span>' +
                        '<span data-growl="title"></span><br>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#!" data-growl="url"></a>' +
                        '</div>'
                });
            };
            notify('<?php echo $this->session->flashdata('success'); ?>', 'success');
        <?php } else if ($this->session->flashdata('danger')) { ?>

            function notify(message, type) {
                $.growl({
                    icon: 'feather icon-x-circle',
                    title: 'Error!',
                    message: message,
                }, {
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    spacing: 10,
                    z_index: 999999,
                    delay: 2500,
                    timer: 5000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    icon_type: 'class',
                    template: '<div data-growl="container" style="width:25%;height:70px;" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="icon"></span>' +
                        '<span data-growl="title"></span><br>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#!" data-growl="url"></a>' +
                        '</div>'
                });
            };
            notify('<?php echo $this->session->flashdata('danger'); ?>', 'danger');
        <?php } else if ($this->session->flashdata('warning')) { ?>

            function notify(message, type) {
                $.growl({
                    icon: 'feather icon-alert-triangle',
                    title: 'Peringatan!',
                    message: message,
                }, {
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    spacing: 10,
                    z_index: 999999,
                    delay: 2500,
                    timer: 5000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    icon_type: 'class',
                    template: '<div data-growl="container" style="width:30%;height:80px;" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="icon"></span>' +
                        '<span data-growl="title"></span><br>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#!" data-growl="url"></a>' +
                        '</div>'
                });
            };
            notify('<?php echo $this->session->flashdata('warning'); ?>', 'warning');
        <?php } else if ($this->session->flashdata('info')) { ?>

            function notify(message, type) {
                $.growl({
                    icon: 'feather icon-alert-circle',
                    title: 'Peringatan!',
                    message: message,
                }, {
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    spacing: 10,
                    z_index: 999999,
                    delay: 2500,
                    timer: 5000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    icon_type: 'class',
                    template: '<div data-growl="container" style="width:30%;height:80px;" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="icon"></span>' +
                        '<span data-growl="title"></span><br>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#!" data-growl="url"></a>' +
                        '</div>'
                });
            };
            notify('<?php echo $this->session->flashdata('info'); ?>', 'info');
        <?php } ?>
    });
</script>
<script>
    let base_url = '<?= base_url() ?>';
</script>
