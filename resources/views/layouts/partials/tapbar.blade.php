<div class="scroll-sidebar" style="    margin-left: 265px;">

    @if (auth()->check())
        <nav class="sidebar-nav">
            <ul id="side-menu" class="d_flex_wrap">
                {{-- @if (auth()->user()->isAdmin() == true)
                        <li><a href="{{ asset('user/create') }}">Add New User</a></li>
                        <li><a href="{{ asset('user/deleted') }}">Deleted Users</a></li>
                    @endif --}}
                {{-- @foreach ($laravelAdminMenus->menus as $section)
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
                </li> --}}
                <li>
                    <a class="waves-effect" href="{{ url('safe/deposit') }}">
                        <span class="hide-menu style_border">Add the deposit to the safe</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ url('safe/payouts') }}">
                        <span class="hide-menu style_border">Add payouts from the safe</span>
                    </a>
                </li>
                {{-- <li>
                    <a class="waves-effect" href="total-cash">
                        <span class="hide-menu style_border">Add total-cash</span>
                    </a>
                </li> --}}
                <li>
                    <a class="waves-effect" href="{{ url('expenses') }}">
                        <span class="hide-menu style_border">Add Expense</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="{{ url('employee-salary') }}">
                        <span class="hide-menu style_border">Add Employee Salary</span>
                    </a>
                </li>
                {{-- <li>
                    <a class="waves-effect" href="suppliers">
                        <span class="hide-menu style_border">Add Suppliers</span>
                    </a>
                </li> --}}
                <li>
                    <a class="waves-effect" href="{{ url('report') }}">
                        <span class="hide-menu style_border">Add Report</span>
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>
