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
                option.attr('value', this.uuid).text(this.name);
                $('#operation_uuid').append(option);
            })
        })
    }

    $('body').on('click', '#btnViewReportHTML', function(e) {
        e.preventDefault()
        var url = route('all_polda_by_operation', $('#operation_uuid').val())
        if ($('#operation_uuid').val() == '') {
            alert("Anda belum memilih operasi")
        } else {
            window.open(url, '_blank').focus()
        }
    })

});