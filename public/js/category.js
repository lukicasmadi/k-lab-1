/******/ (() => { // webpackBootstrap
/*!**************************************!*\
  !*** ./resources/js/app/category.js ***!
  \**************************************/
$(document).ready(function () {
  var table = $('#tbl_category').DataTable({
    processing: true,
    serverSide: true,
    ajax: route('category_data'),
    "oLanguage": {
      "oPaginate": {
        "sPrevious": '<i class="fas fa-arrow-circle-left dtIconSize"></i>',
        "sNext": '<i class="fas fa-arrow-circle-right dtIconSize"></i>'
      },
      "sInfo": "Showing page _PAGE_ of _PAGES_",
      "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      "sSearchPlaceholder": "Search...",
      "sLengthMenu": "Results :  _MENU_",
      "sProcessing": '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>'
    },
    order: [[0, "desc"]],
    columns: [{
      data: 'id',
      visible: false,
      searchable: false
    }, {
      data: 'name'
    }, {
      data: 'img',
      render: function render(data, type, row) {
        if (data == null) {
          return '<td class="text-center"><span><img src="' + route('dashboard') + '/template/assets/img/90x90.jpg" class="profile-img" width="40" height="40"></span></td>';
        } else {
          return '<td class="text-center"><span><img src="' + route('dashboard') + '/storage/upload/' + data + '" class="profile-img" width="40" height="40"></span></td>';
        }
      },
      searchable: false
    }, {
      data: 'user.name',
      name: 'user.name'
    }, {
      data: 'uuid',
      render: function render(data, type, row) {
        return '<div class="icon-container"><a href="' + route('category_edit', data) + '"><i class="far fa-edit"></i><span class="icon-name"></span></a> <a href="' + route('category_delete', data) + '"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a></div>';
      },
      searchable: false,
      sortable: false
    }]
  });
});
/******/ })()
;