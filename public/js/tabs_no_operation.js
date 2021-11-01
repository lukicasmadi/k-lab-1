/******/ (() => { // webpackBootstrap
/*!***********************************************!*\
  !*** ./resources/js/app/tabs_no_operation.js ***!
  \***********************************************/
jQuery(function () {
  var DateTime = luxon.DateTime;
  DateTime.now().setZone('Asia/Jakarta');
  var now = DateTime.now().setLocale("id");
  $(document).on('change', '#changeTheme', function (e) {
    if ($(this).is(":checked")) {
      console.log("mode terang");
    } else {
      console.log("mode gelap");
    }
  });
  var optionsAbsensiPolda = {
    chart: {
      fontFamily: 'Quicksand, sans-serif',
      height: 365,
      type: 'area',
      zoom: {
        enabled: false
      },
      dropShadow: {
        enabled: true,
        opacity: 0.3,
        blur: 5,
        left: -7,
        top: 22
      },
      toolbar: {
        show: false
      },
      events: {
        click: function click(event, chartContext, config) {
          checkInputByChart(config.dataPointIndex);
        }
      }
    },
    colors: ['#1490cb'],
    dataLabels: {
      enabled: false
    },
    noData: {
      text: "Loading Data",
      align: 'center',
      verticalAlign: 'middle',
      offsetX: 0,
      offsetY: 0,
      style: {
        color: "#ffffff",
        fontSize: '20px',
        fontFamily: "Quicksand, sans-serif"
      }
    },
    stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
    },
    series: [{
      name: "Total",
      data: []
    }],
    xaxis: {
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        show: true
      },
      labels: {
        offsetX: 0,
        offsetY: 0,
        style: {
          fontSize: '12px',
          fontFamily: 'Quicksand, sans-serif',
          cssClass: 'apexcharts-xaxis-title'
        }
      },
      categories: []
    },
    yaxis: {
      labels: {
        formatter: function formatter(value, index) {
          return value;
        },
        offsetX: -10,
        offsetY: 0,
        style: {
          fontSize: '12px',
          fontFamily: 'Quicksand, sans-serif',
          cssClass: 'apexcharts-yaxis-title'
        }
      }
    },
    grid: {
      borderColor: '#191e3a',
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: true
        }
      },
      padding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 10
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      offsetY: -50,
      fontSize: '16px',
      fontFamily: 'Quicksand, sans-serif',
      markers: {
        width: 10,
        height: 10,
        strokeWidth: 0,
        strokeColor: '#fff',
        fillColors: undefined,
        radius: 12,
        onClick: undefined,
        offsetX: 0,
        offsetY: 0
      },
      itemMargin: {
        horizontal: 0,
        vertical: 20
      }
    },
    tooltip: {
      theme: 'dark',
      marker: {
        show: true
      },
      x: {
        show: false
      }
    },
    fill: {
      type: "gradient",
      gradient: {
        type: "vertical",
        shadeIntensity: 1,
        inverseColors: !1,
        opacityFrom: .28,
        opacityTo: .05,
        stops: [45, 100]
      }
    },
    responsive: [{
      breakpoint: 575,
      options: {
        legend: {
          offsetY: -30
        }
      }
    }]
  };
  var chartRequest = new ApexCharts(document.querySelector("#incoming_report"), optionsAbsensiPolda);
  chartRequest.render();

  function callGraph() {
    dashboardChartWithoutOperation = wrapAjax(route('dashboard_chart_without_operation'));
    dashboardChartWithoutOperation.done(function (data, statusText, jqXHR) {
      var rangeDate = data.rangeDate;
      var totalPerDate = data.totalPerDate;
      var projectName = data.projectName;
      var totalSum = data.totalSum;

      if (!_.isEmpty(rangeDate) && !_.isEmpty(totalPerDate)) {
        $("#projectName").html("" + projectName + "");
        chartRequest.updateOptions({
          xaxis: {
            labels: {
              offsetX: 0,
              offsetY: 5,
              style: {
                fontSize: '12px',
                fontFamily: 'Quicksand, sans-serif',
                cssClass: 'apexcharts-xaxis-title'
              }
            },
            categories: rangeDate
          }
        });
        chartRequest.updateSeries([{
          name: 'Total',
          data: totalPerDate
        }]);
        $(".data_total_laporan").html(totalSum + " laporan");
      }
    });
  }

  $(document).on('change', '#pilihan_operasi', function (e) {
    e.preventDefault();
    var endpoint = route('change_operation', $('#pilihan_operasi :selected').text());
    swal.queue([{
      title: 'Perbaharui Data?',
      confirmButtonText: 'Ya',
      text: 'Data akan ditampilkan secara otomatis',
      showLoaderOnConfirm: true,
      preConfirm: function preConfirm() {
        return fetch(endpoint).then(function (response) {
          callGraph();
          swal.insertQueueStep({
            type: 'success',
            text: "Data grafik akan memuat data sesuai operasi yg dipilih"
          });
        }).then(function (data) {//
        })["catch"](function () {
          swal.insertQueueStep({
            type: 'error',
            title: 'Gagal memuat data terbaru. Silahkan refresh halaman secara manual'
          });
        });
      }
    }]);
  });
  setInterval(function () {
    callGraph();
  }, $('meta[name=reload_time]').attr('content')); // https://lodash.com/docs/#isEmpty

  $('#pilihan_operasi option[value=' + $("#pilihan_operasi_flag").val() + ']').attr('selected', 'selected');
});

function checkInputByChart(id) {
  popupCenter({
    url: route('viewInputFromChart', {
      indexData: id
    }),
    title: 'Detail',
    w: 750,
    h: 700
  });
}

function wrapAjax(dataURL) {
  respObj = $.ajax({
    url: dataURL,
    data: "",
    dataType: 'json',
    type: 'GET'
  });
  return respObj;
}
/******/ })()
;