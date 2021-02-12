import chart, {helpers} from 'chart.js'

Chart.defaults.global.defaultFontFamily = "shabnam";
(function ($) {
    "use strict";

    // Chart
    if ($('#report-line-chart').length) {
        let ctx = $('#report-line-chart')[0].getContext('2d')
        let myChart = new chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: '# of Votes',
                    data: [0, 200, 250, 200, 500, 450, 850, 1050, 950, 1100, 900, 1200],
                    borderWidth: 2,
                    borderColor: '#3160D8',
                    backgroundColor: 'transparent',
                    pointBorderColor: 'transparent'
                },
                    {
                        label: '# of Votes',
                        data: [0, 300, 400, 560, 320, 600, 720, 850, 690, 805, 1200, 1010],
                        borderWidth: 2,
                        borderDash: [2, 2],
                        borderColor: '#BCBABA',
                        backgroundColor: 'transparent',
                        pointBorderColor: 'transparent'
                    }]
            },
            options: {
                legend: {
                    display: false
                },

            }
        })
    }

    $('canvas[data-chart-type="bar"]').each(function () {
        const values = $(this).data('values');
        const labels = $(this).data('labels');
        const colors = $(this).data('colors');
        const chartType = $(this).data('chart-type');

        let ctx = $(this)[0].getContext('2d')

        let myChart = new chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        barPercentage: 0.5,
                        barThickness: 10,
                        maxBarThickness: 8,
                        minBarLength: 10,
                        label: '# of Tomatoes',
                        data: [12, 19, 3, 5, 2, 3, 20, 3, 5, 6, 2, 1],
                        backgroundColor: colors,
                    }
                ]
            },
            options: {
                scales: {
                    xAxes: [{
                        barThickness: 'flex',  // number (pixels) or 'flex'
                        maxBarThickness: 50, // number (pixels)
                        ticks: {
                            fontSize: '12',
                            fontColor: '#777777'
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: '12',
                            fontColor: '#777777',
                            callback: function (value, index, values) {
                                return '' + value
                            }
                        },
                        gridLines: {
                            color: '#D8D8D8',
                            zeroLineColor: '#D8D8D8',
                            borderDash: [2, 2],
                            zeroLineBorderDash: [2, 2],
                            drawBorder: true
                        }
                    }]
                }
            }
        })
    });
    $('canvas[data-chart-type="line"]').each(function () {
        const labels = $(this).data('labels');
        const datasets = $(this).data('data');

        let ctx = $(this)[0].getContext('2d')
        console.log(datasets,labels)
        let myChart = new chart(ctx, {
            type: 'line',
            data: {
                labels:labels,
                datasets: datasets
            },
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: '12',
                            fontColor: '#777777'
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: '12',
                            fontColor: '#777777',
                            "beginAtZero": true,
                            "stepSize": 1
                        },
                        gridLines: {
                            color: '#D8D8D8',
                            zeroLineColor: '#D8D8D8',
                            borderDash: [2, 2],
                            zeroLineBorderDash: [2, 2],
                            drawBorder: false
                        }
                    }]
                }
            }
        })
    });
    $('canvas[data-chart-type="pie"] , canvas[data-chart-type="doughnut"]').each(function () {

        let ctx = $(this)[0].getContext('2d')
        const data = $(this).data('data');
        const colors = $(this).data('colors');
        const chartType = $(this).data('chart-type');
        const cutoutPercentage = $(this).data('cutout-percentage');
        console.log(Object.values(data),Object.keys(data))
        new chart(ctx, {
            type: chartType,
            data: {
                labels: Object.keys(data),
                datasets: [{
                    data: Object.values(data),
                    backgroundColor: colors,
                    hoverBackgroundColor:colors,
                    borderWidth: 5,
                    borderColor: "#fff"
                }]
            },
            options: {
                legend: {
                    display: false
                },

                cutoutPercentage: chartType === "doughnut" ? 80 : 0
            }
        })
    });


})($)
