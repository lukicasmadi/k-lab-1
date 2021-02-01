var options = {
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
            fontSize: '16px',
            fontFamily: "Quicksand, sans-serif"
        }
    },
    stroke: {
        show: true,
        curve: 'smooth',
        width: 2,
        lineCap: 'square'
    },
    series: [],
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
            left: -10
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
    options
)

chartRequest.render()



$(document).ready(function() {
    setInterval(function() {
        callDataFromServer()
    }, 2000);
})

function callDataFromServer() {
    axios.get(route('totalinputan')).then(function(response) {
        var polda = response.data.polda
        var total = response.data.total

        chartRequest.updateSeries([{
            name: 'Total',
            data: total
        }])

        chartRequest.updateOptions({
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
                    offsetY: 5,
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Quicksand, sans-serif',
                        cssClass: 'apexcharts-xaxis-title',
                    },
                },
                categories: polda
            },
        })
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