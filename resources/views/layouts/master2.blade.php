<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/cushliving.png') }}">
    <title>Restaurant | Dashboard</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="{{ asset('plugins/components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}"
        rel="stylesheet">
    <link href="{{ asset('plugins/components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">

    <!-- ===== Animation CSS ===== -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">


    <!--====== Dynamic theme changing =====-->

    @if (session()->get('theme-layout') == 'fix-header')
        <link href="{{ asset('css/style-fix-header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
    @elseif(session()->get('theme-layout') == 'mini-sidebar')
        <link href="{{ asset('css/style-mini-sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
    @else
        <link href="{{ asset('css/style-normal.css') }}" rel="stylesheet">
        <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
    @endif

    @stack('css')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/css/bootstrap-iconpicker.min.css" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ===== Color CSS ===== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @media (min-width: 768px) {
            .extra.collapse li a span.hide-menu {
                display: block !important;
            }

            .extra.collapse.in li a.waves-effect span.hide-menu {
                display: block !important;
            }

            .extra.collapse li.active a.active span.hide-menu {
                display: block !important;
            }

            ul.side-menu li:hover+.extra.collapse.in li.active a.active span.hide-menu {
                display: block !important;
            }
        }
    </style>
</head>

<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
$sum = 0;

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<body class="@if (session()->get('theme-layout')) {{ session()->get('theme-layout') }} @endif" >
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        @include('layouts.partials.navbar')
        {{-- @include('layouts.partials.design_navbar') --}}
        <!-- ===== Top-Navigation-End ===== -->

        <!-- ===== Left-Sidebar ===== -->

        @include('layouts.partials.sidebar')
        {{-- @include('layouts.partials.right-sidebar') --}}
        <div class="container-fluid">
            <style>
                .page-wrapper {
                    /* margin-left: 0px; */
                    margin-left: 265px;
                }

                .container-fluid {

                    background: aliceblue;
                }

                /* .scroll-sidebar {
                    margin: 50px;
                    margin-bottom: 0px !important;
                } */
                .sidebar-nav {
                    background: none
                }
            </style>
        </div>

        {{-- <div class="container-fluid">
            @if (// auth()->user()->hasRole('admin') ||
    auth()->user()->hasRole('developer'))
                @include('layouts.partials.sidebar')
                @include('layouts.partials.right-sidebar')
            @else
                <style>
                    .page-wrapper {
                        margin-left: 0px;
                    }

                    .container-fluid {

                        background: aliceblue;
                    }

                    .scroll-sidebar {
                        margin: 50px;
                        margin-bottom: 0px !important;
                    }
                    .sidebar-nav{
                        background: none
                    }
                </style>


                @include('layouts.partials.tapbar')
            @endif --}}
        {{-- </div>
            </div> --}}
    </div>





    <!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        @yield('content')
        <footer class="footer t-a-c">
            <div class="p-20 bg-white">
                <center> 2017 © Cubic Admin / Design & Developed By <a href="https://jthemes.com"
                        target="_blank">jThemes Studio</a> </center>
            </div>
        </footer>
    </div>
    <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
    Required JS Files
=============================== -->
    <!-- ===== jQuery ===== -->
    <script src="{{ asset('plugins/components/jquery/dist/jquery.min.js') }}"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!-- ===== Custom JavaScript ===== -->

    @if (session()->get('theme-layout') == 'fix-header')
        <script src="{{ asset('js/custom-fix-header.js') }}"></script>
    @elseif(session()->get('theme-layout') == 'mini-sidebar')
        <script src="{{ asset('js/custom-mini-sidebar.js') }}"></script>
    @else
        <script src="{{ asset('js/custom-normal.js') }}"></script>
    @endif

    {{-- <script src="{{asset('js/custom.js')}}"></script> --}}
    <!-- ===== Plugin JS ===== -->
    <script src="{{ asset('plugins/components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}">
    </script>
    <script src="{{ asset('plugins/components/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('plugins/components/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script src="{{ asset('plugins/components/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js') }}"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="{{ asset('plugins/components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js"></script>

    @stack('js')
    @push('js')
        <script>
            // $(document).ready( function () {
            // safe_fetch();
    
    
            function safe_fetch() {
                $from_date = $('#from').val();
                $to_date = $('#to').val();
                $month = $('#month').val();
                console.log($from_date);
                console.log($to_date);
                console.log($month);
                
                $url_restaurant_id = $('#url_restaurant_id').val();
                console.log($url_restaurant_id);
                // url_restaurant_id = $url_restaurant_id;
                // console.log($url_restaurant_id);
                // console.log(url_restaurant_id);
                $.ajax({
                    type: "GET",
                    url: '{{ url('safe/fetch/' . $url_restaurant_id) }}',
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.safe);
                        arr = response.safe;
                        $('tbody').find('tr').remove()
                        response.safe.forEach(item => {
                            if (item.restaurant_id == $url_restaurant_id) {
                            if (!$month) {
                                console.log(arr.length + ' if');
                                console.log($month + 'not month');
    
                                if (item.date >= $from_date & item.date <= $to_date) {
                                    console.log(arr.length + ' if if');
                                    $('tbody').append(
                                        '<tr class="tr_remove" >\
                                                        <td>' + item.date + '</td>\
                                                        <td>' + item.paycheck + '</td>\
                                                        <td>' + item.payment + '</td>\
                                                        <td>' + (item.payment - item.paycheck) + '</td>\
                                                                                                 </tr>'
                                    )
    
                                }
                            } else {
                                console.log($month + 'month');
                                item_date = item.date.slice(0, 7)
                                console.log(item_date);
    
                                // console.log($month + 'month' + (item.date).format( "M-yy") + 'date');
                                // console.log(formatDate( "M-yy", item.date););
    
                                if (item.date.slice(0, 7) == $month) {
                                    console.log(arr.length + ' else if');
                                    $('tbody').append(
                                        '<tr class="tr_remove" >\
                                                        <td>' + item.date + '</td>\
                                                        <td>' + item.paycheck + '</td>\
                                                        <td>' + item.payment + '</td>\
                                                        <td>' + (item.payment - item.paycheck) + '</td>\
                                                                                                 </tr>'
                                    )
    
                                }
                            }
                                
                            }
    
                        });
                    }
                });
    
            }
            // })
        </script>
    @endpush
    
</body>


@yield('externalJsLinks')

@yield('pageCustomJS')

</html>
