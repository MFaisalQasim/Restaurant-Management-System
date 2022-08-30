
    <div class="scroll-sidebar">

        @if (auth()->check())
            <nav class="sidebar-nav">
                <ul id="side-menu" class="d-flex" style="display: flex">
                    {{-- @if (auth()->user()->isAdmin() == true)
                        <li><a href="{{ asset('user/create') }}">Add New User</a></li>
                        <li><a href="{{ asset('user/deleted') }}">Deleted Users</a></li>
                    @endif --}}
                    @foreach ($laravelAdminMenus->menus as $section)
                        @if (count(collect($section->items)) > 0)
                            @foreach ($section->items as $menu)
                                @can('view-' . str_slug($menu->title))
                                    <li >
                                        @if (isset($menu->dropDown))
                                            <a class="dropdown_menu_link" href="javascript::void(0)" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                {{-- <i class="glyphicon {{ $menu->icon }} fa-sfw"></i> --}}
                                                <span class="hide-menu"> {{ $menu->title }}</span>
                                            </a>
                                        @else
                                            <a class="waves-effect" href="{{ url($menu->url) }} ">
                                                {{-- <i class="glyphicon {{ $menu->icon }} fa-fw"></i> --}}
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
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>
