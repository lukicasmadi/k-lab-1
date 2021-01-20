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
        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
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
          return "- No Image -";
        } else {
          return data;
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