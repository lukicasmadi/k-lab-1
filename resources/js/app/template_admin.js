$(document).ready(function() {
    App.init()

    function callAjaxGet(dataURL) {
        respObj = $.ajax({
            url: dataURL,
            data: "",
            dataType: 'json',
            type: 'GET'
        });
        return respObj
    }

    getAllData()

    $('body').on('click', '#report_polda_all', function(e) {
        e.preventDefault()
        $('#modalReportAllPoldaByOperation').modal('show')
    })

    function getAllData() {
        all_operation = callAjaxGet(route('get_all_operation'))
        all_operation.done(function(data, statusText, jqXHR) {
            var id = data.id
            var uuid = data.uuid
            var name = data.name

            $(data).each(function() {
                var option = $('<option />');
                option.attr('value', this.id).text(this.name);
                $('#poldaList').append(option);
            });
        })
    }

});