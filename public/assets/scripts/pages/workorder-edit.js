jQuery(document).ready(function () {
    var serviceType = $('input[name=service_type]').val();

    $('input[name=service_type]').change(function () {
        serviceType = $(this).val();

        if ($(this).val() == 'self') {
            $("#datatable-parts-use-self-wrapper").show();
            $("#datatable-service-self-wrapper").show();
            $("#datatable-parts-use-vendor-wrapper").hide();
            $("#datatable-service-vendor-wrapper").hide();
        } else {
            $("#datatable-parts-use-vendor-wrapper").show();
            $("#datatable-service-vendor-wrapper").show();
            $("#datatable-parts-use-self-wrapper").hide();
            $("#datatable-service-self-wrapper").hide();
        }
    })

    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    $(".form_datetime").datetimepicker({
        autoclose: true,
        isRTL: App.isRTL(),
        format: "yyyy-mm-dd hh:ii:ss",
        pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left")
    });

    var partsUseSelfGrid = new Datatable();
    var partsUseVendorGrid = new Datatable();
    var partsUseSelfForm = $('#parts-use-self-form');
    var partsUseSelfModal = $("#parts-use-self-modal");
    var partsUseVendorForm = $('#parts-use-vendor-form');
    var partsUseVendorModal = $("#parts-use-vendor-modal");

    var serviceSelfGrid = new Datatable();
    var serviceVendorGrid = new Datatable();
    var serviceSelfForm = $('#service-self-form');
    var serviceSelfModal = $("#service-self-modal");
    var serviceVendorForm = $('#service-vendor-form');
    var serviceVendorModal = $("#service-vendor-modal");

    $("#add-parts-use").click(function (e) {
        e.preventDefault();

        $('.irf_check').prop('checked', false);
        $('.irf_check').uniform();
        $('.unit_measure_wrapper').hide();
        $('.remarks_wrapper').hide();

        if(serviceType == 'self')
            partsUseSelfModal.modal('show');
        else
            partsUseVendorModal.modal('show');
    });

    $("#add-service").click(function (e) {
        e.preventDefault();
        if(serviceType == 'self')
            serviceSelfModal.modal('show');
        else
            serviceVendorModal.modal('show');
    });

    partsUseSelfGrid.init({
        src: $("#datatable-parts-use-self"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-parts-use-self").data('url')
            },
            "paginate": false,
            "bStateSave": false,
            ordering: false,
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'irf_check', name: 'irf_check'},
                {data: 'part_no', name: 'part_no'},
                {data: 'part_name', name: 'part_name'},
                {data: 'required_qty', name: 'required_qty'},
                {data: 'order_qty', name: 'order_qty'},
                {data: 'u_price', name: 'u_price'},
                {data: 'amount', name: 'amount'},
                {data: 'actions', name: 'actions'}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    serviceSelfGrid.init({
        src: $("#datatable-service-self"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-service-self").data('url')
            },
            "paginate": false,
            "bStateSave": false,
            ordering: false,
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'service_no', name: 'service_no'},
                {data: 'service_name', name: 'service_name'},
                {data: 'assigned_to', name: 'assigned_to'},
                {data: 'status', name: 'status'},
                {data: 'actions', name: 'actions'}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    partsUseVendorGrid.init({
        src: $("#datatable-parts-use-vendor"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-parts-use-vendor").data('url')
            },
            "paginate": false,
            "bStateSave": false,
            ordering: false,
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'irf_check', name: 'irf_check'},
                {data: 'part_no', name: 'part_no'},
                {data: 'part_name', name: 'part_name'},
                {data: 'required_qty', name: 'required_qty'},
                {data: 'onhand_qty', name: 'onhand_qty'},
                {data: 'order_qty', name: 'order_qty'},
                {data: 'u_price', name: 'u_price'},
                {data: 'amount', name: 'amount'},
                {data: 'actions', name: 'actions', orderable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    serviceVendorGrid.init({
        src: $("#datatable-service-vendor"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-service-vendor").data('url')
            },
            "paginate": false,
            "bStateSave": false,
            ordering: false,
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'rfs_check', name: 'rfs_check'},
                {data: 'service_no', name: 'service_no'},
                {data: 'service_name', name: 'service_name'},
                {data: 'vendor', name: 'vendor'},
                {data: 'amount', name: 'amount'},
                {data: 'status', name: 'status'},
                {data: 'actions', name: 'actions'}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    partsUseSelfForm.validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            part_no: {
                required: true
            },
            part_name: {
                required: true
            },
            required_qty: {
                required: true,
                number: true
            },
            order_qty: {
                required: true,
                number: true
            },
            u_price: {
                required: true,
                number: true
            }
        },

        highlight: function (element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
        }
    });

    partsUseVendorForm.validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            part_no: {
                required: true
            },
            part_name: {
                required: true
            },
            required_qty: {
                required: true,
                number: true
            },
            part_name: {
                required: true,
                number: true
            },
            onhand_qty: {
                required: true,
                number: true
            },
            order_qty: {
                required: true,
                number: true
            },
            u_price: {
                required: true,
                number: true
            }
        },

        highlight: function (element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
        }
    });

    serviceSelfForm.validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            service_no: {
                required: true
            },
            service_name: {
                required: true
            },
            assigned_to: {
                required: true
            }
        },

        highlight: function (element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
        }
    });

    serviceVendorForm.validate({
        errorElement: 'span',
        errorClass: 'help-block help-block-error',
        focusInvalid: false,
        ignore: "",
        rules: {
            service_no: {
                required: true
            },
            service_name: {
                required: true
            },
            vendor: {
                required: true
            },
            amount: {
                required: true,
                number: true
            }
        },

        highlight: function (element) {
            $(element)
                .closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
        }
    });

    $("#save-parts-use-self").click(function () {
        if (partsUseSelfForm.valid()) {
            partsUseSelfModal.modal('hide');
            App.blockUI({boxed: true});
            $.ajax({
                type: "POST",
                url: partsUseSelfForm.data('url'),
                data: partsUseSelfForm.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        partsUseSelfForm[0].reset();
                        App.unblockUI();
                        $("#datatable-parts-use-self").dataTable()._fnAjaxUpdate();
                    }
                }
            });
        }
    });

    $("#save-parts-use-vendor").click(function () {
        if (partsUseVendorForm.valid()) {
            partsUseVendorModal.modal('hide');
            App.blockUI({boxed: true});
            $.ajax({
                type: "POST",
                url: partsUseVendorForm.data('url'),
                data: partsUseVendorForm.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        partsUseVendorForm[0].reset();
                        App.unblockUI();
                        $("#datatable-parts-use-vendor").dataTable()._fnAjaxUpdate();
                    }
                }
            });
        }
    });

    $("#save-service-self").click(function () {
        if (serviceSelfForm.valid()) {
            serviceSelfModal.modal('hide');
            App.blockUI({boxed: true});
            $.ajax({
                type: "POST",
                url: serviceSelfForm.data('url'),
                data: serviceSelfForm.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        serviceSelfForm[0].reset();
                        App.unblockUI();
                        $("#datatable-service-self").dataTable()._fnAjaxUpdate();
                    }
                }
            });
        }
    });

    $("#save-service-vendor").click(function () {
        if (serviceVendorForm.valid()) {
            serviceVendorModal.modal('hide');
            App.blockUI({boxed: true});
            $.ajax({
                type: "POST",
                url: serviceVendorForm.data('url'),
                data: serviceVendorForm.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        serviceVendorForm[0].reset();
                        App.unblockUI();
                        $("#datatable-service-vendor").dataTable()._fnAjaxUpdate();
                    }
                }
            });
        }
    });

    $("#upload-pic").change(function () {
        var files = $(this).prop("files");
        var formData = new FormData();

        if (files.length == 0) {
            return;
        }

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if (!file.type.match('image.*')) {
                continue;
            }

            formData.append('pictures[]', file, file.name);
        }

        App.blockUI({boxed: true});
        $.ajax({
            url: $(this).data('url'),
            type: 'post',
            data: formData,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.success) {
                    App.unblockUI();
                    loadPictures();
                } else {
                    App.unblockUI();
                    toastr.error('There are some problems in uploading files to server.Please try again.');
                }
            }
        });
    });

    $("#remark-save").click(function () {
        var text = $("#remark-text").val();
        if (text != '') {
            App.blockUI({boxed: true, target: "#remark-container"});
            $.ajax({
                type: "POST",
                url: $(this).data('url'),
                data: {text: text},
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        App.unblockUI("#remark-container");
                        toastr.success('Your remark is successfully saved.');
                        $("#remark-text").val('');
                        loadRemarks();
                    }
                }
            });
        } else {
            toastr.error('Please type some text first.');
        }
    });

    $(".part_no_select").change(function () {
        $(".part_name_select").val($(this).val());
    });

    $(".part_name_select").change(function () {
        $(".part_no_select").val($(this).val());
    });

    $(".irf_check").change(function () {
        if ($(this).is(":checked")) {
            $('.unit_measure_wrapper').show();
            $('.remarks_wrapper').show();
        } else {
            $('.unit_measure_wrapper').hide();
            $('.remarks_wrapper').hide();
        }
    });

    loadPictures();

    loadRemarks();

    function loadPictures() {
        var container = $("#picture-container");
        App.blockUI({boxed: true, target: "#picture-container"});
        $.ajax({
            type: "POST",
            url: container.data('url'),
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    App.unblockUI("#picture-container");
                    container.empty();
                    for (var i in data.pictures) {
                        var picture = data.pictures[i];

                        var html = '<div class="picture-img-wrapper">' +
                            '<img src="' + $('meta[name="root-path"]').attr('content') + picture.pic_url + '" class="picture-img">' +
                            '<a href="javascript::" class="picture-delete" data-url=' + picture.delete_url + '>' +
                            '<span class="badge badge-danger"> <i class="fa fa-close"></i></span>' +
                            '</a>' +
                            '</div>'
                        container.append(html);
                    }

                    $(".picture-delete").click(function () {
                        App.blockUI({boxed: true});
                        $.ajax({
                            type: "POST",
                            url: $(this).data('url'),
                            data: {},
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    App.unblockUI();
                                    loadPictures();
                                }
                            }
                        });
                    });

                    $('.picture-img').click(function () {
                        $("#image-view-modal img").attr('src', $(this).attr('src'));
                        $("#image-view-modal").modal('show');
                    })
                }
            }
        });
    }

    function loadRemarks() {
        var container = $("#remark-menu-container");
        App.blockUI({boxed: true, target: "#remark-container"});
        $.ajax({
            type: "POST",
            url: container.data('url'),
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    App.unblockUI("#remark-container");
                    container.html(data.html);
                }
            }
        });
    }
});

function updatePartsUseIRF(c) {
    // var control = $(c);
    // App.blockUI({boxed: true});
    // $.ajax({
    //     type: "POST",
    //     url: control.data('url'),
    //     data: {
    //         'irf': control.is(":checked") ? 1 : 0
    //     },
    //     dataType: 'json',
    //     success: function (data) {
    //         if (data.success) {
    //             App.unblockUI();
    //             $("#datatable-parts-use").dataTable()._fnAjaxUpdate();
    //         }
    //     }
    // });
}

function deletePartsUse(c) {
    var control = $(c);
    App.blockUI({boxed: true});
    $.ajax({
        type: "POST",
        url: control.data('url'),
        data: {},
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                App.unblockUI();
                $("#datatable-parts-use").dataTable()._fnAjaxUpdate();
            }
        }
    });
}

function completePartsUse(c) {
    var control = $(c);
    App.blockUI({boxed: true});
    $.ajax({
        type: "POST",
        url: control.data('url'),
        data: {
            'status': 'complete'
        },
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                App.unblockUI();
                $("#datatable-parts-use-self").dataTable()._fnAjaxUpdate();
                $("#datatable-parts-use-vendor").dataTable()._fnAjaxUpdate();
            }
        }
    });
}


function updateServiceRFS(c) {
    // var control = $(c);
    // App.blockUI({boxed: true});
    // $.ajax({
    //     type: "POST",
    //     url: control.data('url'),
    //     data: {
    //         'rfs': control.is(":checked") ? 1 : 0
    //     },
    //     dataType: 'json',
    //     success: function (data) {
    //         if (data.success) {
    //             App.unblockUI();
    //             $("#datatable-service").dataTable()._fnAjaxUpdate();
    //         }
    //     }
    // });
}

function deleteService(c) {
    var control = $(c);
    App.blockUI({boxed: true});
    $.ajax({
        type: "POST",
        url: control.data('url'),
        data: {},
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                App.unblockUI();
                $("#datatable-service-self").dataTable()._fnAjaxUpdate();
                $("#datatable-service-vendor").dataTable()._fnAjaxUpdate();
            }
        }
    });
}

function completeService(c) {
    var control = $(c);
    App.blockUI({boxed: true});
    $.ajax({
        type: "POST",
        url: control.data('url'),
        data: {
            'status': 'complete'
        },
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                App.unblockUI();
                $("#datatable-service-self").dataTable()._fnAjaxUpdate();
                $("#datatable-service-vendor").dataTable()._fnAjaxUpdate();
            }
        }
    });
}