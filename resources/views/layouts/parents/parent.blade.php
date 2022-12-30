<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <title>
        @yield('title')
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/css/material-dashboard.min.css?v=3.0.2')}}" rel="stylesheet" />
    <!-- Anti-flicker snippet (recommended)  -->
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- BOOSTRAP 5
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <!-- End Google Tag Manager -->
</head>


<style>
    * .activity-feed {
        padding: 15px;
        list-style: none;
    }

    * .activity-feed .feed-item {
        position: relative;
        padding-bottom: 20px;
        padding-left: 30px;
        border-left: 2px solid #e4e8eb;
    }

    * .activity-feed .feed-item:last-child {
        border-color: transparent;
    }

    * .activity-feed .feed-item::after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: -7px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #177dff;
    }

    * .feed-item-default::after {
        background: #1a2035 !important;
    }

    * .feed-item-primary::after {
        background: #1572e8 !important;
    }

    * .feed-item-secondary::after {
        background: #6861ce !important;
    }

    * .feed-item-success::after {
        background: #31ce36 !important;
    }

    * .feed-item-danger::after {
        background: #f25961 !important;
    }

    * .feed-item-info::after {
        background: #48abf7 !important;
    }

    * .feed-item-warning::after {
        background: #ffad46 !important;
    }

    * .activity-feed .feed-item .date {
        display: block;
        position: relative;
        top: -5px;
        color: #8c96a3;
        text-transform: uppercase;
        font-size: 13px;
    }

    * .activity-feed .feed-item .text {
        position: relative;
        top: -3px;
    }

    * .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }

    * .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eee;
        left: 50%;
        margin-left: -1.5px;
    }

    * .timeline>li {
        margin-bottom: 20px;
        position: relative;
    }

    * .timeline>li:before {
        content: " ";
        display: table;
    }

    * .timeline>li:after {
        content: " ";
        display: table;
        clear: both;
    }

    * .timeline>li:before {
        content: " ";
        display: table;
    }

    * .timeline>li:after {
        content: " ";
        display: table;
        clear: both;
    }

    * .timeline>li>.timeline-panel {
        width: 50%;
        float: left;
        border: 1px solid #eee;
        background: #fff;
        border-radius: 3px;
        padding: 20px;
        position: relative;
        -webkit-box-shadow: 0 1px 20px 1px rgba(69, 65, 78, 0.06);
        box-shadow: 0 1px 20px 1px rgba(69, 65, 78, 0.06);
    }

    * .timeline>li.timeline-inverted+li:not(.timeline-inverted) {
        margin-top: -60px;
    }

    * .timeline>li:not(.timeline-inverted) {
        padding-right: 90px;
    }

    * .timeline>li:not(.timeline-inverted)+li.timeline-inverted {
        margin-top: -60px;
    }

    * .timeline>li.timeline-inverted {
        padding-left: 90px;
    }

    * .timeline>li.timeline-inverted>.timeline-panel {
        float: right;
    }

    * .timeline>li.timeline-inverted>.timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    * .timeline>li.timeline-inverted>.timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }

    * .timeline>li>.timeline-panel:before {
        position: absolute;
        top: 26px;
        right: -15px;
        display: inline-block;
        border-top: 15px solid transparent;
        border-left: 15px solid #eee;
        border-right: 0 solid #eee;
        border-bottom: 15px solid transparent;
        content: " ";
    }

    * .timeline>li>.timeline-panel:after {
        position: absolute;
        top: 27px;
        right: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-left: 14px solid #fff;
        border-right: 0 solid #fff;
        border-bottom: 14px solid transparent;
        content: " ";
    }

    * .timeline>li>.timeline-badge {
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        font-size: 1.8em;
        text-align: center;
        position: absolute;
        top: 16px;
        left: 50%;
        margin-left: -25px;
        background-color: #999;
        z-index: 100;
        border-top-right-radius: 50%;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
    }

    * .timeline-badge.default {
        background-color: #1a2035 !important;
    }

    * .timeline-badge.primary {
        background-color: #1572e8 !important;
    }

    * .timeline-badge.secondary {
        background-color: #6861ce !important;
    }

    * .timeline-badge.success {
        background-color: #31ce36 !important;
    }

    * .timeline-badge.warning {
        background-color: #ffad46 !important;
    }

    * .timeline-badge.danger {
        background-color: #f25961 !important;
    }

    * .timeline-badge.info {
        background-color: #48abf7 !important;
    }

    * .timeline-title {
        font-size: 17px;
        margin-top: 0;
        color: inherit;
        font-weight: 400;
    }

    * .timeline-heading i {
        font-size: 22px;
        display: inline-block;
        vertical-align: middle;
        margin-right: 5px;
    }

    * .timeline-body>p,
    * .timeline-body>ul {
        margin-bottom: 0;
    }

    * .timeline-body>p+p {
        margin-top: 5px;
    }
</style>


<body class="g-sidenav-show  bg-gray-200">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- ===== SIDEBAR ===== -->
    @include('includes.sidebar')
    <!-- ===== END SIDEBAR ===== -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- ===== Navbar ===== -->
        @include('includes.navbar')
        <!-- ===== End Navbar ===== -->

        @include('sweetalert::alert')

        <div class="px-5">
            <div class="row">



                <div>
                    @yield('content')
                </div>


                <!-- Github buttons -->
                <script async defer src="https://buttons.github.io/buttons.js"></script>
                <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.2')}}"></script>

                <!-- ===== FOOTER ===== -->
                @include('includes.footer')
                <!-- ===== END FOOTER ===== -->

            </div>
        </div>
    </main>

    <!--   Core JS Files   -->
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <!-- Kanban scripts -->
    <script src="{{asset('assets/js/plugins/dragula/dragula.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jkanban/jkanban.js')}}"></script>
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/world.js')}}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.2')}}"></script>

    <script>
        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: <?php echo json_encode($name ?? '') ?>,
                datasets: [{
                    label: "Total",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: <?php echo json_encode($total) ?>,
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

</body>

</html>