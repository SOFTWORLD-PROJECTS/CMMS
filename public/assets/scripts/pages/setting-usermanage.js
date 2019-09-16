jQuery(document).ready(function() {
    new Datatable().init({
        src: $("#datatable-usermanage"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "pageLength": 20,
            "ajax": {
                "url": $("#datatable-usermanage").data('url')
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
                {data: 'job_name', name: 'job_name'},
                {data: 'department', name: 'department'},
                {data: 'email', name: 'email'},
                {data: 'u_status', name: 'u_status'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });
});