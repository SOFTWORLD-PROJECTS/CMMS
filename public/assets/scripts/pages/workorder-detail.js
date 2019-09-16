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

    var partsUseSelfGrid = new Datatable();
    var partsUseVendorGrid = new Datatable();

    var serviceSelfGrid = new Datatable();
    var serviceVendorGrid = new Datatable();

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
            ],
            "pagingType": "bootstrap_full_number",
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
                            '</div>'
                        container.append(html);
                    }

                    $('.picture-img').click(function() {
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