jQuery(document).ready(function() {
    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        autoclose: true
    });

    new Datatable().init({
        src: $("#datatable"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable").data('url'),
                data: function (data) {
                    data["date_from"] = $("#date_from").val();
                    data["date_to"] = $("#date_to").val();

                    return data;
                }
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
                {data: 'date_time', name: 'date_time'},
                {data: 'user', name: 'user'},
                {data: 'level', name: 'level'},
                {data: 'module', name: 'module'},
                {data: 'action', name: 'action'},
                {data: 'reference', name: 'reference'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    $('#search-btn').click(function() {
        $('#datatable').dataTable()._fnAjaxUpdate();
    })
});