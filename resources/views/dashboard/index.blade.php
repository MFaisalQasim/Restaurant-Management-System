@extends('layouts.master2')

<?php
$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$tmp = explode('/', $url);
$url_restaurant_id = intval(end($tmp));
$a = 0;
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$m = 0;
$n = 0;
$TAX = 23.9;
$gross_profit = 0;
?>
@section('content')

    @if (auth()->user()->hasRole('admin') ||
        auth()->user()->hasRole('developer'))
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="white-box stat-widget">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <h4 class="box-title">Statistics</h4>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <select class="custom-select">
                                    <option selected value="0">Feb 04 - Mar 03</option>
                                    <option value="1">Mar 04 - Apr 03</option>
                                    <option value="2">Apr 04 - May 03</option>
                                    <option value="3">May 04 - Jun 03</option>
                                </select>
                                <ul class="list-inline">
                                    <li>
                                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-success"></i>New Sales
                                        </h6>
                                    </li>
                                    <li>
                                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>Existing
                                            Sales</h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="stat chart-pos"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box">
                        <h4 class="box-title">Task Progress</h4>
                        <div class="task-widget t-a-c">
                            <div class="task-chart" id="sparklinedashdb"></div>
                            <div class="task-content font-16 t-a-c">
                                <div class="col-sm-6 b-r">
                                    Urgent Tasks
                                    <h1 class="text-primary">05 <span class="font-16 text-muted">Tasks</span></h1>
                                </div>
                                <div class="col-sm-6">
                                    Normal Tasks
                                    <h1 class="text-primary">03 <span class="font-16 text-muted">Tasks</span></h1>
                                </div>
                            </div>
                            <div class="task-assign font-16">
                                Assigned To
                                <ul class="list-inline">
                                    <li class="p-l-0">
                                        <img src="{{asset('plugins/images/users/1.png')}}" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li>
                                        <img src="{{asset('plugins/images/users/2.png')}}" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li>
                                        <img src="{{asset('plugins/images/users/3.png')}}" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li class="p-r-0">
                                        <a href="javascript:void(0);" class="btn btn-success font-16">3+</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                        <div class="ct-revenue chart-pos"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light m-b-0">5247</h1>
                        <span class="hr-line"></span>
                        <p class="cb-text">current visits</p>
                        <h6 class="text-white font-semibold">+25% <span class="font-light">Last Week</span></h6>
                        <div class="chart">
                            <div class="ct-visit chart-pos"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="white-box bg-danger color-box">
                        <h1 class="text-white font-light m-b-0">25%</h1>
                        <span class="hr-line"></span>
                        <p class="cb-text">Finished Tasks</p>
                        <h6 class="text-white font-semibold">+15% <span class="font-light">Last Week</span></h6>
                        <div class="chart">
                            <input class="knob" data-min="0" data-max="100" data-bgColor="#f86b4a"
                                   data-fgColor="#ffffff" data-displayInput=false data-width="96" data-height="96"
                                   data-thickness=".1" value="25" readonly>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="white-box user-table">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="box-title">Table Format/User Data</h4>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-inline">
                                    <li>
                                        <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i
                                                    class="fa fa-commenting" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                                <select class="custom-select">
                                    <option selected>Sort by</option>
                                    <option value="1">Name</option>
                                    <option value="2">Location</option>
                                    <option value="3">Type</option>
                                    <option value="4">Role</option>
                                    <option value="5">Action</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox checkbox-info">
                                            <input id="c1" type="checkbox">
                                            <label for="c1"></label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c2" type="checkbox">
                                            <label for="c2"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Daniel Kristeen</a></td>
                                    <td>Texas, US</td>
                                    <td>Posts 564</td>
                                    <td><span class="label label-success">Admin</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c3" type="checkbox">
                                            <label for="c3"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Hanna Gover</a></td>
                                    <td>Los Angeles, US</td>
                                    <td>Posts 451</td>
                                    <td><span class="label label-info">Staff</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c4" type="checkbox">
                                            <label for="c4"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Jeffery Brown</a></td>
                                    <td>Houston, US</td>
                                    <td>Posts 978</td>
                                    <td><span class="label label-danger">User</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c5" type="checkbox">
                                            <label for="c5"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Elliot Dugteren</a></td>
                                    <td>San Antonio, US</td>
                                    <td>Posts 34</td>
                                    <td><span class="label label-warning">General</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c6" type="checkbox">
                                            <label for="c6"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Sergio Milardovich</a></td>
                                    <td>Jacksonville, US</td>
                                    <td>Posts 31</td>
                                    <td><span class="label label-primary">Partial</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination">
                            <li class="disabled"><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-success pull-right m-t-10 font-20">+</a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-md-8">
                    <div class="white-box">
                        <div class="task-widget2">
                            <div class="task-image">
                                <img src="{{asset('plugins/images/task.jpg')}}" alt="task" class="img-responsive">
                                <div class="task-image-overlay"></div>
                                <div class="task-detail">
                                    <h2 class="font-light text-white m-b-0">07 April</h2>
                                    <h4 class="font-normal text-white m-t-5">Your tasks for today</h4>
                                </div>
                                <div class="task-add-btn">
                                    <a href="javascript:void(0);" class="btn btn-success">+</a>
                                </div>
                            </div>
                            <div class="task-total">
                                <p class="font-16 m-b-0"><strong>5</strong> Tasks for <a href="javascript:void(0);"
                                                                                         class="text-link">Jon Doe</a>
                                </p>
                            </div>
                            <div class="task-list">
                                <ul class="list-group">
                                    <li class="list-group-item bl-info">
                                        <div class="checkbox checkbox-success">
                                            <input id="c7" type="checkbox">
                                            <label for="c7">
                                                <span class="font-16">Create invoice for customers and email each customers.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">05:00 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-warning">
                                        <div class="checkbox checkbox-success">
                                            <input id="c8" type="checkbox" checked>
                                            <label for="c8">
                                                <span class="font-16">Send payment of <strong>&#36;500 invoised</strong> on 23 May to <a
                                                            href="javascript:void(0);"
                                                            class="text-link">Daniel Kristeen</a> via paypal.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">03:00 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-danger">
                                        <div class="checkbox checkbox-success">
                                            <input id="c9" type="checkbox">
                                            <label for="c9">
                                                <span class="font-16">It is a long established fact that a reader will be distracted by the readable.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">04:45 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-success">
                                        <div class="checkbox checkbox-success">
                                            <input id="c10" type="checkbox">
                                            <label for="c10">
                                                <span class="font-16">It is a long established fact that a reader will be distracted by the readable.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">05:30 PM</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="task-loadmore">
                                <a href="javascript:void(0);" class="btn btn-default btn-outline btn-rounded">Load
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="white-box chat-widget">
                        <a href="javascript:void(0);" class="pull-right"><i class="icon-settings"></i></a>
                        <h4 class="box-title">Chat</h4>
                        <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">
                            <li>
                                <div class="chat-image"><img alt="male"
                                                             src="{{asset('plugins/images/users/hanna.jpg')}}"></div>
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p><span class="font-semibold">Hanna Gover</span> Hey Daniel, This is just a
                                            sample chat. </p>
                                    </div>
                                    <span>2 Min ago</span>
                                </div>
                            </li>
                            <li class="odd">
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p> buddy </p>
                                    </div>
                                    <span>2 Min ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="chat-image"><img alt="male"
                                                             src="{{asset('plugins/images/users/hanna.jpg')}}"></div>
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p><span class="font-semibold">Hanna Gover</span> Bye now. </p>
                                    </div>
                                    <span>1 Min ago</span>
                                </div>
                            </li>
                            <li class="odd">
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p> We have been busy all the day to make your website proposal and finally came
                                            with the super excited offer. </p>
                                    </div>
                                    <span>5 Sec ago</span>
                                </div>
                            </li>
                        </ul>
                        <div class="chat-send">
                            <input type="text" class="form-control" placeholder="Write your message">
                            <i class="fa fa-camera"></i>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- ===== Right-Sidebar ===== -->
            @include('layouts.partials.right-sidebar')
            <!-- ===== Right-Sidebar-End ===== -->
        </div>
        {{-- @else --}}
        <div class="container-fluid mt-5">
            <div class="row mt-5">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h1 align="center">Welcome to Dashboard</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title pull-left">Dashbord</h3>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-borderless" id="myTable">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Name</th>
                                        {{-- <th>Location</th> --}}
                                        <th>Ranking</th>
                                        <th>Income</th>
                                        <th>Salaries</th>
                                        <th>Average</th>
                                        <th>Gross profit</th>
                                        <th>TAX 19% + TAX 4.9%</th>
                                        <th>Net profit</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$errors->any())
                                        @foreach ($restaurant as $item)
                                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('developer'))
                                                <tr>

                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->ranking }}</td>
                                                    <td>{{number_format(($total_income_sum = $report_total_income_sum[$i]), 2, ',', ' ')  }}</td>
                                                    <input type="hidden" value="{{ ++$i }}">
                                                    <td>{{ $report_avg_salaries = $report_avg_salaries_sum[$j], 1 }}</td>
                                                    <input type="hidden" value="{{ ++$j }}">
                                                    @foreach ($salaries_number_of_hours_sum_count as $val)
                                                        @if ($item->id == $val->restaurant_id)
                                                            {{ '', $counts = $loop->iteration }}
                                                        @else
                                                            {{ '', $counts = 1 }}
                                                        @endif
                                                    @endforeach
                                                    <td>{{number_format(($salaries_number_of_hours_sum[$k] / $counts), 2, ',', ' ')  , 3 }}</td>
                                                    <input type="hidden" value="{{ ++$k }}">

                                                    @if ($total_income_sum != 0 || $total_income_sum != null  )
                                                        <td>{{ ($gross_profit = $total_income_sum - ($cash_sum = $report_cash_sum[$m]) / $total_income_sum) ,3 }}
                                                        </td>
                                                        <input type="hidden" value="{{ ++$m }}">
                                                        <td> {{ ($cash_sum / $total_income_sum) * $TAX }}</td>
                                                        @else
                                                        <td>"pleaase add daily with  total income"</td>
                                                        <td>"pleaase enter  daily with  total income"</td>
                                                    @endif
                                                    <td>{{$net_profilt = $total_income_sum - $report_expense_today_sum[$n] - $report_avg_salaries }}
                                                    </td>
                                                    <input type="hidden" value="{{ ++$n }}">
                                                </tr>
                                            @endif
                                            {{ '', $arr_gross_profit[$a] = $gross_profit }}
                                            {{ '', $arr_net_profilt[$a] = $net_profilt, $a++ }}
                                        @endforeach
                                        <tr>
                                            <td> <b>Total</b> </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> <b>{{number_format(array_sum($arr_gross_profit), 2, ',', ' ') }}</b></td>
                                            <td></td>
                                            <td> <b>{{number_format(array_sum($arr_net_profilt), 2, ',', ' ')  }}</b></td>
                                        </tr>
                                    @else
                                        <H1>Fill Data in restayrant to have look on dashbord </H1>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('js')
    <script src="{{ asset('js/db1.js') }}"></script>

    <script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('plugins/components/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {

            @if (\Session::has('message'))
                $.toast({
                    heading: 'Success!',
                    position: 'top-center',
                    text: '{{ session()->get('message') }}',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 6
                });
            @endif
        })
    </script>
@endpush
