$(document).ready(function() {
    $('#tbl_polda').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('polda_data'),
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            "sProcessing": '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>',
        },
        order: [
            [0, "desc"]
        ],
        columns: [{
                data: 'id',
                visible: false,
                searchable: false
            },
            {
                data: 'name',
            },
            {
                data: 'aka',
            },
            {
                data: 'province',
            },
            {
                data: 'city',
            },
            {
                data: 'address',
            },
            {
                data: 'small_img',
                render: function(data, type, row) {
                    if (data == null) {
                        return '<td class="text-center"><span><img src="' + route('dashboard') + '/template/assets/img/90x90.jpg" class="profile-img" width="40" height="40"></span></td>'
                    }
                },
                searchable: false,
                sortable: false
            },
            {
                data: 'logo',
                render: function(data, type, row) {
                    if (data == null) {
                        return '<td class="text-center"><span><img src="' + route('dashboard') + '/template/assets/img/90x90.jpg" class="profile-img" width="40" height="40"></span></td>'
                    }
                },
                searchable: false,
                sortable: false
            },
            {
                data: 'profile',
                render: function(data, type, row) {
                    if (data == null) {
                        return '<span class="text-center">-</span>'
                    }
                },
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return '<div class="icon-container"><a href="' + route('polda_edit', data) + '"><i class="far fa-edit"></i><span class="icon-name"></span></a> <a href="' + route('polda_destroy', data) + '"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a></div>';
                },
                searchable: false,
                sortable: false
            }
        ]
    });
});