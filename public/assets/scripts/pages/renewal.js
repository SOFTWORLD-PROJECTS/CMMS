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
                {data: 'reg_no', name: 'reg_no'},
                {data: 'insurance', name: 'insurance'},
                {data: 'insurance_left', name: 'insurance_left'},
                {
                    data: 'road_tax', name: 'road_tax',
                    render(data) {
                        return data ? data : '-';
                    }
                },
                {
                    data: 'road_tax_left', name: 'road_tax_left',
                    render(data) {
                        return data ? data : '-';
                    }
                },
                {
                    data: 'puspakom', name: 'puspakom',
                    render(data) {
                        return data ? data : '-';
                    }
                },
                {data: 'puspakom_left', name: 'puspakom_left',
                    render(data) {
                        return data ? data : '-';
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
                "url": $("#datatable-complete").data('url')
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
                {data: 'reg_no', name: 'reg_no'},
                {data: 'insurance', name: 'insurance'},
                {data: 'insurance_upload_col', name: 'insurance_upload_col', orderable: false, searchable: false},
                {data: 'road_tax', name: 'road_tax'},
                {data: 'road_tax_upload_col', name: 'road_tax_upload_col', orderable: false, searchable: false},
                {data: 'puspakom', name: 'puspakom'},
                {data: 'puspakom_upload_col', name: 'puspakom_upload_col', orderable: false, searchable: false},
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
                {data: 'reg_no', name: 'reg_no'},
                {data: 'insurance', name: 'insurance'},
                {data: 'insurance_routine', name: 'insurance_routine'},
                {data: 'insurance_last_renewal', name: 'insurance_last_renewal'},
                {data: 'road_tax', name: 'road_tax'},
                {data: 'road_tax_routine', name: 'road_tax_routine'},
                {data: 'road_tax_last_renewal', name: 'road_tax_last_renewal'},
                {data: 'puspakom', name: 'puspakom'},
                {data: 'puspakom_routine', name: 'puspakom_routine'},
                {data: 'puspakom_last_renewal', name: 'puspakom_last_renewal'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            "pagingType": "bootstrap_full_number",
        }
    });

    $('.nav-tabs li').click(function() {
        $("#datatable-" + $(this).data('type')).dataTable()._fnAjaxUpdate();
    })

    $('#renewal-file').change(function (evt) {
        var files = $('#renewal-file').prop("files");
        var formData = new FormData();

        if (files.length == 0)
            return;

        var file = files[0];
        formData.append('file', file, file.name);
        formData.append('id', $("#renewal-id").val());
        formData.append('type', $("#renewal-type").val());

        App.blockUI({boxed: true});
        $.ajax({
            url: $("#renewal-url").val(),
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
                    $("#datatable-complete").dataTable()._fnAjaxUpdate();
                } else {
                    App.unblockUI();
                }
            },
            error:function(data) {
                App.unblockUI();
                toastr.error('there is an error in uploading file');
            }
        });
    });
});

function uploadFile(c) {
    var control = $(c);
    $("#renewal-url").val(control.data('url'));
    $("#renewal-id").val(control.data('id'));
    $("#renewal-type").val(control.data('type'));
    $("#renewal-file").click();
}

