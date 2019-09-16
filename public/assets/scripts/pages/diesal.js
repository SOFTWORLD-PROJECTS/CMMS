jQuery(document).ready(function () {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    new Datatable().init({
        src: $("#datatable-usage"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-usage").data('url')
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
                {data: 'create_date', name: 'create_date'},
                {
                    data: 'month_year', name: 'month_year',
                    render: function (data) {
                        return moment(data).format('MMM YYYY');
                    }
                },
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'driver', name: 'driver'},
                {data: 'litres', name: 'litres'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-stocks"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-stocks").data('url')
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
                {data: 'create_date', name: 'create_date'},
                {data: 'supplier_name', name: 'supplier_name'},
                {data: 'purchased', name: 'purchased'},
                {data: 'actual', name: 'actual'},
                {data: 'variance', name: 'variance'},
                {data: 'before_balance', name: 'before_balance'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-request"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-request").data('url')
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
                {data: 'request_no', name: 'request_no'},
                {data: 'create_date', name: 'create_date'},
                {data: 'last_update_name', name: 'last_update_name'},
                {data: 'remaining_cm', name: 'remaining_cm'},
                {data: 'remaining_litre', name: 'remaining_litre'},
                {data: 'request_quality', name: 'request_quality'},
                {data: 'status', name: 'status'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });
});