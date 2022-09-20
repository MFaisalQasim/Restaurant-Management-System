<div class="scroll-sidebar" style="    margin-left: 265px;">

    <?php
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $tmp = explode('/', $url);
    $url_restaurant_id = intval(end($tmp));
    ?>

    @if (auth()->check())
        <nav class="sidebar-nav">
            <ul id="side-menu" class="d_flex_wrap">
                {{-- @if (auth()->user()->isAdmin() == true)
                        <li><a href="{{ asset('user/create') }}">Add New User</a></li>
                        <li><a href="{{ asset('user/deleted') }}">Deleted Users</a></li>
                    @endif
                 @foreach ($laravelAdminMenus->menus as $section)
                        @if (count(collect($section->items)) > 0)
                            @foreach ($section->items as $menu)
                                @can('view-' . str_slug($menu->title))
                                    <li >
                                        @if (isset($menu->dropDown))
                                            <a class="dropdown_menu_link" href="javascript::void(0)" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="hide-menu"> {{ $menu->title }}</span>
                                            </a>
                                        @else
                                            <a class="waves-effect" href="{{ url($menu->url) }} ">
                                                <span class="hide-menu style_border"
                                                > {{ $menu->title }}</span>
                                            </a>
                                        @endif

                                        @if (isset($menu->dropDown))
                                            <ul class="collapse" aria-expanded="true">
                                                @foreach ($menu->dropDown as $dropDownMenu)
                                                    <li aria-labelledby="dropdownMenuButton_{{ $menu->title }}">
                                                        <a href="{{ url($dropDownMenu->url) }}">
                                                            {{ $dropDownMenu->title }} </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endcan
                            @endforeach
                        @endif
                    @endforeach --}}

                {{-- <li>
                    <a class="waves-effect" href="restaurant">
                        <span class="hide-menu style_border">Add restaurant</span>
                    </a>
                </li>

                 @can('view-' . str_slug('Restaurant'))
                    <a href="{{ url('safe/deposit_create'. $item->id) }}" title="View Restaurant">
                        <button class="btn btn-info btn-sm">
                            <i class="fa fa-eye" aria-hidden="true"></i> Add the deposit to the safe
                        </button>
                    </a>
                @endcan --}}
                <li>
                    <a class="waves-effect" href="{{ url('safe/deposit_create/' . $url_restaurant_id) }}">
                        <span class="hide-menu style_border">Add the deposit to the safe</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ url('safe/payouts_create/' . $url_restaurant_id) }}">
                        <span class="hide-menu style_border">Add payouts from the safe</span>
                    </a>
                </li>
                @can('add-' . str_slug('expenses'))
                    <li>
                        <a class="waves-effect" href="{{ url('expenses/create/' . $url_restaurant_id) }}">
                            <span class="hide-menu style_border">Add Expense</span>
                        </a>
                    </li>
                @endcan
                @can('add-' . str_slug('EmployeeSalary'))
                    <li>
                        <a class="waves-effect" href="{{ url('employee-salary/create/' . $url_restaurant_id) }}">
                            <span class="hide-menu style_border">Add Salary</span>
                        </a>
                    </li>
                @endcan
                @can('add-' . str_slug('Report'))
                    <li>
                        <a class="waves-effect" href="{{ url('report/create/' . $url_restaurant_id) }}">
                            <span class="hide-menu style_border">Add Daily Report</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a class="waves-effect" href="{{ url('safe/' . $url_restaurant_id) }}">
                        <span class="hide-menu style_border">View safe</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ url('expenses/' . $url_restaurant_id) }}">
                        <span class="hide-menu style_border">View Expense</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ url('employee-salary/' . $url_restaurant_id) }}">
                        <span class="hide-menu style_border">View Salary</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ url('report/' . $url_restaurant_id) }}">
                        <span class="hide-menu style_border">View Daily Report</span>
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>
