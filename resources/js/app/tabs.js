jQuery(function() {
    var DateTime = luxon.DateTime;
    DateTime.now().setZone('Asia/Jakarta')
    var now = DateTime.now().setLocale("id")
    $(document).on('change', '#changeTheme', function(e) {
        if ($(this).is(":checked")) {
            console.log("mode terang")
        } else {
            console.log("mode gelap")
        }
    })

    $(document).on('click', '#filterOperasi', function(e) {
        e.preventDefault()
    })

    $('#tbl_daily_submited tbody').on('click', '.previewPhro', function(e) {
        e.preventDefault()
        var uuid = $(this).attr('data-id')

        popupCenter({
            url: route('previewPhroDashboard', {
                uuid: uuid,
            }),
            title: 'Detail',
            w: 1000,
            h: 600
        })
    })

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
                click: function(event, chartContext, config) {
                    checkInputByChart(config.dataPointIndex)
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
                fontFamily: "Quicksand, sans-serif",
            },
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
                    cssClass: 'apexcharts-xaxis-title',
                },
            },
            categories: []
        },
        yaxis: {
            labels: {
                formatter: function(value, index) {
                    return value
                },
                offsetX: -10,
                offsetY: 0,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Quicksand, sans-serif',
                    cssClass: 'apexcharts-yaxis-title',
                },
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
                    show: true,
                }
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 10
            },
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
                show: true,
            },
            x: {
                show: false,
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
                    offsetY: -30,
                },
            },
        }]
    }

    var chartRequest = new ApexCharts(
        document.querySelector("#incoming_report"),
        optionsAbsensiPolda
    )

    chartRequest.render()

    //=================================================================================================================================================

    var optionLapHarLeft = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        colors: ['#00adef', '#ea1c26'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
            },
        },
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
                fontSize: '15px',
                fontFamily: "Quicksand, sans-serif",
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Total'
            }
        },
    }

    var leftLaphar = new ApexCharts(
        document.querySelector("#total_laphar_pelanggaran_lalin"),
        optionLapHarLeft
    )

    leftLaphar.render()

    var optionLapHarRight = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        colors: ['#00adef', '#ea1c26', '#fd7e14', '#ffc107'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
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
                fontSize: '15px',
                fontFamily: "Quicksand, sans-serif",
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Total'
            }
        },
        fill: {
            opacity: 1
        },
    }

    var rightLaphar = new ApexCharts(
        document.querySelector("#total_laphar_kecelakaan_lalin"),
        optionLapHarRight
    )

    rightLaphar.render()

    //=================================================================================================================================================

    var optionLapHarAllLeft = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        colors: ['#00adef', '#ea1c26'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
            },
        },
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
                fontSize: '15px',
                fontFamily: "Quicksand, sans-serif",
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Total'
            }
        },
        fill: {
            opacity: 1
        },
    }

    var leftLapharAll = new ApexCharts(
        document.querySelector("#total_laphar_pelanggaran_lalin_all_project"),
        optionLapHarAllLeft
    )

    leftLapharAll.render()

    var optionLapHarAllRight = {
        chart: {
            fontFamily: 'Quicksand, sans-serif',
            height: 365,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        colors: ['#00adef', '#ea1c26', '#fd7e14', '#ffc107'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
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
                fontSize: '15px',
                fontFamily: "Quicksand, sans-serif",
            },
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [],
        xaxis: {
            categories: [],
        },
        yaxis: {
            title: {
                text: 'Total'
            }
        },
        fill: {
            opacity: 1
        },
    }

    var rightLapharAll = new ApexCharts(
        document.querySelector("#total_laphar_kecelakaan_lalin_all_project"),
        optionLapHarAllRight
    )

    rightLapharAll.render()

    //=================================================================================================================================================

    //=================================================================================================================================================

    //=================================================================================================================================================

    setInterval(function() {

        dashboardChart = wrapAjax(route('dashboardChart'))
        dashboardChart.done(function(data, statusText, jqXHR) {
            var rangeDate = data.rangeDate
            var totalPerDate = data.totalPerDate
            var projectName = data.projectName

            if (!_.isEmpty(rangeDate) && !_.isEmpty(totalPerDate)) {

                $("#projectName").html("" + projectName + "")

                chartRequest.updateOptions({
                    xaxis: {
                        labels: {
                            offsetX: 0,
                            offsetY: 5,
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Quicksand, sans-serif',
                                cssClass: 'apexcharts-xaxis-title',
                            },
                        },
                        categories: rangeDate
                    },
                })

                chartRequest.updateSeries([{
                    name: 'Total',
                    data: totalPerDate
                }])

            }
        })

        chart_laphar = wrapAjax(route('chart_laphar'))
        chart_laphar.done(function(data, statusText, jqXHR) {
            leftLaphar.updateOptions({
                xaxis: {
                    categories: [data.year]
                },
            })

            leftLaphar.updateSeries([{
                name: 'Tilang',
                data: [data.tilang]
            }, {
                name: 'Teguran',
                data: [data.teguran]
            }])

            rightLaphar.updateOptions({
                xaxis: {
                    categories: [data.year]
                },
            })

            rightLaphar.updateSeries([{
                    name: 'Jumlah Kejadian',
                    data: [data.jumlah_kejadian]
                },
                {
                    name: 'Korban Meninggal Dunia',
                    data: [data.jumlah_korban_meninggal]
                },
                {
                    name: 'Korban Luka Berat',
                    data: [data.jumlah_korban_luka_berat]
                },
                {
                    name: 'Korban Luka Ringan',
                    data: [data.jumlah_korban_luka_ringan]
                }
            ])
        })

        chart_laphar_all_project = wrapAjax(route('chart_laphar_all_project'))
        chart_laphar_all_project.done(function(data, statusText, jqXHR) {
            leftLapharAll.updateOptions({
                xaxis: {
                    categories: [data.year]
                },
            })

            leftLapharAll.updateSeries([{
                name: 'Tilang',
                data: [data.tilang]
            }, {
                name: 'Teguran',
                data: [data.teguran]
            }])


            rightLapharAll.updateOptions({
                xaxis: {
                    categories: [data.year]
                },
            })

            rightLapharAll.updateSeries([{
                    name: 'Jumlah Kejadian',
                    data: [data.jumlah_kejadian]
                },
                {
                    name: 'Korban Meninggal Dunia',
                    data: [data.jumlah_korban_meninggal]
                },
                {
                    name: 'Korban Luka Berat',
                    data: [data.jumlah_korban_luka_berat]
                },
                {
                    name: 'Korban Luka Ringan',
                    data: [data.jumlah_korban_luka_ringan]
                }
            ])
        })

    }, $('meta[name=reload_time]').attr('content'))

    // https://lodash.com/docs/#isEmpty
})

function changePoldaClass() {
    axios.get(route('today_check')).then(response => {
            $.each(response.data, function(key, value) {
                if (_.isEmpty(value.daily_input)) {
                    $('#' + value.short_name).removeClass("glowblue").addClass("glowred")
                } else {
                    $('#' + value.short_name).removeClass("glowred").addClass("glowblue")
                }
            })
        })
        .catch(err => {
            console.error(err);
        })
}

function notificationLoad() {
    var DateTime = luxon.DateTime
    $(".timeline-line").empty()

    axios.get(route('notifikasi'))
        .then(res => {
            if (_.isEmpty(res.data)) {
                $(".timeline-line").append("<p class='centered'>Belum ada polda yang mengirim data hari ini</p>")
                $("#loadingPanel").addClass("invisible")
                $("#dataPanel").removeClass("invisible")
            } else {
                $.each(res.data, function(key, value) {
                    var status = value.status
                    var created_at = value.created_at
                    var polda_name = value.polda.name

                    var html = `
                <div class="item-timeline timeline-new">
                    <div class="t-dot">
                        <div class="t-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </div>
                    </div>
                    <div class="t-content">
                        <div class="t-uppercontent">
                            <h5>` + polda_name + `</h5>
                            <span class="">` + DateTime.fromISO(created_at, { locale: "id" }).toRelative() + `</span>
                        </div>
                        <p>STATUS : ` + status.toUpperCase() + `</p>
                    </div>
                </div>
                `;

                    $(".timeline-line").append(html)

                    $("#loadingPanel").addClass("invisible")
                    $("#dataPanel").removeClass("invisible")
                })
            }
        })
        .catch(err => {
            console.error(err);
        })
}

function donutData() {

    axios.get(route('donut')).then(function(response) {

        $("#donut-chart").empty()

        if (_.isEmpty(response.data.filled)) {
            var filled = response.data.filled
            var nofilled = response.data.nofilled

            var donutChart = {
                chart: {
                    height: 350,
                    fontFamily: 'Bahnschrift',
                    type: 'donut',
                    toolbar: {
                        show: false,
                    }
                },
                legend: {
                    show: true,
                    showForSingleSeries: false,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    floating: false,
                    fontSize: '10px',
                    fontFamily: 'Bahnschrift',
                    fontWeight: 400,
                    formatter: undefined,
                    inverseOrder: false,
                    width: undefined,
                    height: undefined,
                    tooltipHoverFormatter: undefined,
                    offsetX: 0,
                    offsetY: 0,
                    labels: {
                        colors: undefined,
                        useSeriesColors: false
                    },
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        fillColors: undefined,
                        radius: 12,
                        customHTML: undefined,
                        onClick: undefined,
                        offsetX: 0,
                        offsetY: 0
                    },
                    itemMargin: {
                        horizontal: 0,
                        vertical: 10
                    },
                    onItemClick: {
                        toggleDataSeries: true
                    },
                    onItemHover: {
                        highlightDataSeries: true
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 0.8,
                        opacityFrom: 0.9,
                        opacityTo: 0.9,
                        stops: [50, 190, 100]
                    }
                },
                colors: ['#00adef', '#ea1c26'],
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%',
                            background: 'transparent',
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '12px',
                                    fontFamily: 'Bahnschrift',
                                    color: undefined,
                                    offsetY: -35,
                                },
                                value: {
                                    show: true,
                                    fontSize: '60px',
                                    fontFamily: 'Bahnschrift',
                                    color: '20',
                                    offsetY: 17,
                                    formatter: function(val) {
                                        return val + "%"
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: false,
                                    label: 'DATA MASUK',
                                    color: '#888ea8',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce(function(a, b) {
                                            return a + "%"
                                        })
                                    }
                                }
                            }
                        }
                    }
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    lineCap: 'butt',
                    colors: undefined,
                    width: 1,
                    dashArray: 0,
                },
                series: [filled, nofilled],
                labels: ['[ MASUK ]', '[ BELUM MASUK ]'],
                responsive: [{
                    breakpoint: 500,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }

            var donut = new ApexCharts(
                document.querySelector("#donut-chart"),
                donutChart
            )

            donut.render()
        }

    }).catch(function(error) {
        if (error.response) {
            console.log(error.response.data)
            console.log(error.response.status)
            console.log(error.response.headers)
        } else if (error.request) {
            console.log(error.request)
        } else {
            console.log('Error', error.message)
        }
    })
}

function loadDataTable() {
    var table = $('#tbl_daily_submited').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('dailycheck'),
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<i class="fas fa-arrow-circle-left dtIconSize"></i>',
                "sNext": '<i class="fas fa-arrow-circle-right dtIconSize"></i>'
            },
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
                data: 'has_submited',
                name: 'dailyInput.status',
                render: function(data, type, row) {
                    if (data == "BELUM MENGIRIMKAN LAPORAN") {
                        return `<p class="red">` + data + `</p>`
                    } else {
                        return `<p>` + data + `</p>`
                    }
                },
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    if (row.has_submited == "BELUM MENGIRIMKAN LAPORAN") {
                        return "-"
                    } else {
                        return `
                        <div class="icon-container">
                            <a href="` + route('previewPhroDashboard', data) + `" class="previewPhro" data-id="` + data + `">
                            <img src="{{ asset('/img/search.png') }}" width="55%">
                            </a>
                        </div>
                        `;
                    }
                },
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    if (row.has_submited == "BELUM MENGIRIMKAN LAPORAN") {
                        return "-"
                    } else {
                        return `
                        <div class="ubah-change text-center">
                            <a href="` + route('downloadPrho', data) + `">
                                Unduh
                            </a>
                        </div>
                        `;
                    }
                },
                searchable: false,
                sortable: false,
            }
        ]
    })
}

function checkInputByChart(id) {
    popupCenter({
        url: route('viewInputFromChart', {
            indexData: id,
        }),
        title: 'Detail',
        w: 750,
        h: 700
    })
}

function absensiPolda() {

}

function wrapAjax(dataURL) {
    respObj = $.ajax({
        url: dataURL,
        data: "",
        dataType: 'json',
        type: 'GET'
    });
    return respObj
}