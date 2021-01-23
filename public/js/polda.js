/******/ (() => { // webpackBootstrap
/*!***********************************!*\
  !*** ./resources/js/app/polda.js ***!
  \***********************************/
$(document).ready(function () {
  var table = $('#tbl_polda').DataTable({
    processing: true,
    serverSide: true,
    ajax: route('polda_data'),
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
      data: 'aka'
    }, {
      data: 'province'
    }, {
      data: 'city'
    }, {
      data: 'address'
    }, {
      data: 'small_img',
      render: function render(data, type, row) {
        if (_.isEmpty(data)) {
          return '<td class="text-center"><span><img src="' + route('dashboard') + '/template/assets/img/90x90.jpg" class="profile-img" width="40" height="40"></span></td>';
        }
      },
      searchable: false,
      sortable: false
    }, {
      data: 'logo',
      render: function render(data, type, row) {
        if (_.isEmpty(data)) {
          return '<td class="text-center"><span><img src="' + route('dashboard') + '/template/assets/img/90x90.jpg" class="profile-img" width="40" height="40"></span></td>';
        }
      },
      searchable: false,
      sortable: false
    }, {
      data: 'profile',
      render: function render(data, type, row) {
        if (_.isEmpty(data)) {
          return '<span class="text-center">-</span>';
        } else {
          return '<span class="text-center">' + data + '</span>';
        }
      }
    }, {
      data: 'uuid',
      render: function render(data, type, row) {
        return '<div class="icon-container"><a href="' + route('polda_edit', data) + '"><i class="far fa-edit"></i><span class="icon-name"></span></a> <a href="" uuid="' + data + '" class="confirm"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a></div>';
      },
      searchable: false,
      sortable: false
    }]
  });
  $('#tbl_polda tbody').on('click', '.confirm', function (e) {
    // var data = table.row(this).data();
    e.preventDefault();
    var uuid = $(this).attr('uuid');
    swal({
      title: 'Are you sure?',
      text: "Detele this data!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      padding: '2em'
    }).then(function (result) {
      swal.showLoading();

      if (result.value) {
        axios["delete"](route('polda_destroy', uuid)).then(function (response) {
          table.ajax.reload();
          swal('Deleted!', response.data.output, 'success');
        })["catch"](function (error) {
          swal("Error deleting!", error.response.data.output, "error");

          if (error.response) {
            // Request made and server responded
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            // The request was made but no response was received
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', error.message);
          }
        });
      }
    });
  });
});
/******/ })()
;