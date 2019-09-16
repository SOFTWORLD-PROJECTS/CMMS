jQuery(document).ready(function() {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    new Datatable().init({
        src: $("#datatable-smu"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-smu").data('url')
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
                {data: 'type_name', name: 'type_name'},
                {data: 'model_name', name: 'model_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'current_meter', name: 'current_meter'},
                {data: 'last_meter', name: 'last_meter'},
                {data: 'last_update_name', name: 'last_update_name'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-mileage"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-mileage").data('url')
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
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'current_meter', name: 'current_meter'},
                {data: 'last_meter', name: 'last_meter'},
                {data: 'last_update_name', name: 'last_update_name'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

});