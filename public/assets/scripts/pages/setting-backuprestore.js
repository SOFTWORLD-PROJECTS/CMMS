jQuery(document).ready(function() {
    new Datatable().init({
        src: $("#datatable"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable").data('url'),
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
                {data: 'name', name: 'name'},
                {data: 'create_time', name: 'create_time'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });
});