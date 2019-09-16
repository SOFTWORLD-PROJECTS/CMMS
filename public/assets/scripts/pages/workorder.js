jQuery(document).ready(function () {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    new Datatable().init({
        src: $("#datatable-new"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-new").data('url'),
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
                {data: 'title', name: 'title'},
                {
                    data: 'create_time', name: 'create_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'wo_no', name: 'wo_no'},
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'assign_to', name: 'assign_to'},
                {
                    data: 'estimate_time', name: 'estimate_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'last_update_name', name: 'last_update_name'},
                {
                    data: 'last_update', name: 'last_update',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-waiting"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-waiting").data('url'),
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
                {data: 'title', name: 'title'},
                {
                    data: 'create_time', name: 'create_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'wo_no', name: 'wo_no'},
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'assign_to', name: 'assign_to'},
                {
                    data: 'estimate_time', name: 'estimate_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'last_update_name', name: 'last_update_name'},
                {
                    data: 'last_update', name: 'last_update',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    new Datatable().init({
        src: $("#datatable-complete"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-complete").data('url'),
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
                {data: 'title', name: 'title'},
                {
                    data: 'create_time', name: 'create_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'wo_no', name: 'wo_no'},
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'assign_to', name: 'assign_to'},
                {
                    data: 'estimate_time', name: 'estimate_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'last_update_name', name: 'last_update_name'},
                {
                    data: 'last_update', name: 'last_update',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
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
                "url": $("#datatable-kiv").data('url'),
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
                {data: 'title', name: 'title'},
                {
                    data: 'create_time', name: 'create_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'wo_no', name: 'wo_no'},
                {data: 'type_name', name: 'type_name'},
                {data: 'reg_no', name: 'reg_no'},
                {data: 'assign_to', name: 'assign_to'},
                {
                    data: 'estimate_time', name: 'estimate_time',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'last_update_name', name: 'last_update_name'},
                {
                    data: 'last_update', name: 'last_update',
                    render: function (data) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    $('.nav-tabs li').click(function() {
        $("#datatable-" + $(this).data('type')).dataTable()._fnAjaxUpdate();
    })
});