jQuery(document).ready(function() {
    var grid = new Datatable();

    grid.init({
        src: $("#datatable"),
        loadingMessage: 'Loading...',
        dataTable: {
            "dom": "t<'row'<'col-sm-12 pull-right'p>>",
            "bStateSave": true,
            "lengthMenu": [
                [10, 20, 50, 100, 150, -1],
                [10, 20, 50, 100, 150, "All"]
            ],
            "pageLength": 20,
            "ajax": {
                "url": "../setting/tabledata2",
            },
            "order": [
                [1, "asc"]
            ],
            "pagingType": "bootstrap_full_number",
        }
    });
});