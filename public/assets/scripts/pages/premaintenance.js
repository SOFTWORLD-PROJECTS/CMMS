jQuery(document).ready(function () {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    new Datatable().init({
        src: $("#datatable-upcoming"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-upcoming").data('url')
            },
            "bStateSave": false,
            "order": [],
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {
                    data: 'current', name: 'current',
                    render: function (data, type, full) {
                        return data + ' ' + full.service_unit + 's';
                    }
                },
                {
                    data: 'left', name: 'left',
                    render: function (data, type, full) {
                        return data + ' ' + full.service_unit + 's';
                    }
                },
                {data: 'last_service_date', name: 'last_service_date'},
                {data: 'service_type', name: 'service_type'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-post"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-post").data('url')
            },
            "bStateSave": false,
            "order": [],
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {
                    data: 'current', name: 'current',
                    render: function (data, type, full) {
                        return data + ' ' + full.service_unit + 's';
                    }
                },
                {
                    data: 'left', name: 'left',
                    render: function (data, type, full) {
                        return data + ' ' + full.service_unit + 's';
                    }
                },
                {data: 'last_service_date', name: 'last_service_date'},
                {data: 'service_type', name: 'service_type'},
                {data: 'status', name: 'status', render: function(data) {
                    return data.toUpperCase();
                }},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-preset"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-preset").data('url')
            },
            "bStateSave": false,
            "order": [],
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'type_name', name: 'type_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'last_service_date', name: 'last_service_date'},
                {data: 'routine_service', name: 'routine_service'},
                {
                    data: 'service_unit', name: 'service_unit',
                    render: function (data) {
                        return data.toUpperCase();
                    }
                },
                {data: 'service_type', name: 'service_type'},
                {
                    data: 'status', name: 'status',
                    render: function (data) {
                        return data.toUpperCase();
                    }
                },
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-kiv"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-kiv").data('url')
            },
            "bStateSave": false,
            "order": [],
            columns: [
                {
                    name: 'no',
                    render: function (data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                {data: 'type_name', name: 'type_name'},
                {data: 'brand_name', name: 'brand_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'last_update_name', name: 'last_update_name'},
                {data: 'last_update', name: 'last_update'},
                {data: 'reason', name: 'reason'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    $('.nav-tabs li').click(function() {
        $("#datatable-" + $(this).data('type')).dataTable()._fnAjaxUpdate();
    })
});

function updateKiv(c) {
    var control = $(c);
    $("#kiv-form").attr('action', control.data('url'));
    $("#kiv-modal").modal('show');
}