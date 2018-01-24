<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item"><a href="index.html"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">5</span></a>
                <ul class="menu-content">
                    <li><a href="dashboard-ecommerce.html" data-i18n="nav.dash.ecommerce" class="menu-item">eCommerce</a>
                    </li>
                    <li><a href="dashboard-project.html" data-i18n="nav.dash.project" class="menu-item">Project</a>
                    </li>
                    <li><a href="dashboard-analytics.html" data-i18n="nav.dash.analytics" class="menu-item">Analytics</a>
                    </li>
                    <li><a href="dashboard-crm.html" data-i18n="nav.dash.crm" class="menu-item">CRM</a>
                    </li>
                    <li><a href="dashboard-fitness.html" data-i18n="nav.dash.fitness" class="menu-item">Fitness</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Admin users</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">BackEnd Users</span></a>
                        <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'admin-users.index'   ? 'active' : ''}}"><a href="{{route('admin-users.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Backend users</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'admin-users.create'   ? 'active' : ''}}"><a href="{{route('admin-users.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new Admin</a>
                            </li>
                        </ul>

                    </li>

                    <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Roles</span></a>
                        <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'roles.index'   ? 'active' : ''}}"><a href="{{route('roles.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all roles</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'roles.create'   ? 'active' : ''}}"><a href="{{route('roles.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new role</a>
                            </li>
                        </ul>

                    </li>

                    <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Permissions</span></a>
                        <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'permissions.index'   ? 'active' : ''}}"><a href="{{route('permissions.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all permissions</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'permissions.create'   ? 'active' : ''}}"><a href="{{route('permissions.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new permissions</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Users</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Users</span></a>
                        <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'users.index'   ? 'active' : ''}}"><a href="{{route('users.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all users</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'users.create'   ? 'active' : ''}}"><a href="{{route('users.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new user</a>
                            </li>
                        </ul>

                    </li>

                    <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Groups</span></a>
                        <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'groups.index'   ? 'active' : ''}}"><a href="{{route('groups.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Groups</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'groups.create'   ? 'active' : ''}}"><a href="{{route('groups.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new group</a>
                            </li>
                        </ul>

                    </li>

                    <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Offers</span></a>
                        <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'offers.index'   ? 'active' : ''}}"><a href="{{route('offers.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Offers</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'offers.create'   ? 'active' : ''}}"><a href="{{route('offers.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new offer</a>
                            </li>
                        </ul>

                    </li>

                </ul>


            </li>
            {{--<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Languages</span></a>--}}
                {{--<ul class="menu-content">--}}

                            {{--<li class="{{Request::route()->getName() == 'languages.index'   ? 'active' : ''}}"><a href="{{route('languages.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Languages</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{Request::route()->getName() == 'languages.create'   ? 'active' : ''}}"><a href="{{route('languages.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new Language</a>--}}
                            {{--</li>--}}
                {{--</ul>--}}

            {{--</li>--}}


            {{--<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">BackEnd Users</span></a>--}}
                {{--<ul class="menu-content">--}}

                            {{--<li class="{{Request::route()->getName() == 'admin-users.index'   ? 'active' : ''}}"><a href="{{route('admin-users.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Backend users</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{Request::route()->getName() == 'admin-users.create'   ? 'active' : ''}}"><a href="{{route('admin-users.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new Admin</a>--}}
                            {{--</li>--}}
                {{--</ul>--}}

            {{--</li>--}}


            {{--<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Roles</span></a>--}}
                {{--<ul class="menu-content">--}}

                            {{--<li class="{{Request::route()->getName() == 'roles.index'   ? 'active' : ''}}"><a href="{{route('roles.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all roles</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{Request::route()->getName() == 'roles.create'   ? 'active' : ''}}"><a href="{{route('roles.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new role</a>--}}
                            {{--</li>--}}
                {{--</ul>--}}

            {{--</li>--}}

            {{--<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Permissions</span></a>--}}
                {{--<ul class="menu-content">--}}

                            {{--<li class="{{Request::route()->getName() == 'permissions.index'   ? 'active' : ''}}"><a href="{{route('permissions.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all permissions</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{Request::route()->getName() == 'permissions.create'   ? 'active' : ''}}"><a href="{{route('permissions.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new permissions</a>--}}
                            {{--</li>--}}
                {{--</ul>--}}

            {{--</li>--}}

            {{--<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Users</span></a>--}}
                {{--<ul class="menu-content">--}}

                            {{--<li class="{{Request::route()->getName() == 'users.index'   ? 'active' : ''}}"><a href="{{route('users.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all users</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{Request::route()->getName() == 'users.create'   ? 'active' : ''}}"><a href="{{route('users.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new user</a>--}}
                            {{--</li>--}}
                {{--</ul>--}}

            {{--</li>--}}

            {{--<li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Groups</span></a>--}}
                {{--<ul class="menu-content">--}}

                            {{--<li class="{{Request::route()->getName() == 'groups.index'   ? 'active' : ''}}"><a href="{{route('groups.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Groups</a>--}}
                            {{--</li>--}}
                            {{--<li class="{{Request::route()->getName() == 'groups.create'   ? 'active' : ''}}"><a href="{{route('groups.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new group</a>--}}
                            {{--</li>--}}
                {{--</ul>--}}

            {{--</li>--}}


            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Tickets</span></a>
                <ul class="menu-content">

                            <li class="{{Request::route()->getName() == 'tickets.index'   ? 'active' : ''}}"><a href="{{route('tickets.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all tickets</a>
                            </li>

                            <li class="{{Request::route()->getName() == 'tickets.create'   ? 'active' : ''}}"><a href="{{route('tickets.create')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">Add New Ticket</a>
                            </li>
                           
                </ul>

            </li>
            <li class=" navigation-header"><span data-i18n="nav.category.layouts">Trip modules</span><i data-toggle="tooltip" data-placement="right" data-original-title="Layouts" class="icon-ellipsis icon-ellipsis"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Package Category</span></a>
                <ul class="menu-content">
                    <li class="{{Request::route()->getName() == 'categories.index'   ? 'active' : ''}}"><a href="{{route('categories.index')}}" data-i18n="nav.page_layouts.1_column" class="menu-item">View all Categories</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'categories.create'   ? 'active' : ''}}"><a href="{{route('categories.create')}}" data-i18n="nav.page_layouts.2_columns" class="menu-item">Add new category</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Packages</span></a>
                <ul class="menu-content">
                    <li class="{{Request::route()->getName() == 'packages.index'   ? 'active' : ''}}"><a href="{{route('packages.index')}}" data-i18n="nav.page_layouts.1_column" class="menu-item">View all Packages</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'packages.create'   ? 'active' : ''}}"><a href="{{route('packages.create')}}" data-i18n="nav.page_layouts.2_columns" class="menu-item">Add new Package</a>
                    <li><a href="#" data-i18n="nav.horz_nav.horizontal_navigation_types.main" class="menu-item">Features and Options</a>
                        <ul class="menu-content">
                            <li class="{{Request::route()->getName() == 'features.index'   ? 'active' : ''}} {{Request::route()->getName() == 'features.create'   ? 'active' : ''}}"><a href="#" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_left_icon_navigation" class="menu-item">Features</a>
                                <ul class="menu-content">
                                    <li class="{{Request::route()->getName() == 'features.index'   ? 'active' : ''}}"><a href="{{route('features.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_left_icon_navigation" class="menu-item">View all features</a>
                                    </li>
                                    <li class="{{Request::route()->getName() == 'features.create'   ? 'active' : ''}}"><a href="{{route('features.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_top_icon_navigation" class="menu-item">Add new feature</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{Request::route()->getName() == 'options.index'   ? 'active' : ''}} {{Request::route()->getName() == 'options.create'   ? 'active' : ''}}"><a href="#" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_top_icon_navigation" class="menu-item">Options</a>
                                <ul class="menu-content">
                                    <li class="{{Request::route()->getName() == 'options.index'   ? 'active' : ''}}"><a href="{{route('options.index')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_left_icon_navigation" class="menu-item">View all options</a>
                                    </li>
                                    <li class="{{Request::route()->getName() == 'options.create'   ? 'active' : ''}}"><a href="{{route('options.create')}}" data-i18n="nav.horz_nav.horizontal_navigation_types.horizontal_top_icon_navigation" class="menu-item">Add new option</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li class=" navigation-header"><span data-i18n="nav.category.layouts">Pages modules</span><i data-toggle="tooltip" data-placement="right" data-original-title="Layouts" class="icon-ellipsis icon-ellipsis"></i>
            </li>

            <li class="nav-item {{Request::route()->getName() == 'admin.about.index'   ? 'active' : ''}}"><a href="{{route('admin.about.index')}}"><i class="icon-graphic_eq"></i><span data-i18n="nav.morris_charts.main" class="menu-title">About us</span></a>
            </li>


            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Blog</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'blog.index'   ? 'active' : ''}}"><a href="{{route('blog.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all BLog</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'blog.create'   ? 'active' : ''}}"><a href="{{route('blog.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new Blog</a>
                    </li>
                </ul>

            </li>


            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Traveller History</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'traveller.index'   ? 'active' : ''}}"><a href="{{route('traveller.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Traveller history</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'traveller.create'   ? 'active' : ''}}"><a href="{{route('traveller.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new traveller history</a>
                    </li>
                </ul>

            </li>


            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Careers</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'careers.index'   ? 'active' : ''}}"><a href="{{route('careers.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all careers</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'careers.create'   ? 'active' : ''}}"><a href="{{route('careers.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new career</a>
                    </li>
                </ul>

            </li>

            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Slider</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'slider.index'   ? 'active' : ''}}"><a href="{{route('slider.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Sliders</a>
                    </li>
                    {{--<li class="{{Request::route()->getName() == 'careers.create'   ? 'active' : ''}}"><a href="{{route('careers.create')}}" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Add new career</a>--}}
                    {{--</li>--}}
                </ul>

            </li>


            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Social Media</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'slider.index'   ? 'active' : ''}}"><a href="{{route('social.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">View all Social</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'social.create'   ? 'active' : ''}}"><a href="{{route('social.create')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">Add New Social</a>
                    </li>
                   
                </ul>

            </li>

            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">General Settings</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'admin.general.setting'   ? 'active' : ''}}"><a href="{{route('admin.general.setting')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">view and update general settings</a>
                    </li>
                    
                   
                </ul>

            </li>

            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Advertisments</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'advertisment.index'   ? 'active' : ''}}"><a href="{{route('advertisment.index')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">view all advertisments</a>
                    </li>
                    
                   
                </ul>

            </li>


            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">Media</span></a>
                <ul class="menu-content">

                    <li class="{{Request::route()->getName() == 'admin.media'   ? 'active' : ''}}"><a href="{{route('admin.media')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">view all galleries</a>
                    </li>

                    <li class="{{Request::route()->getName() == 'admin.gallery.create'   ? 'active' : ''}}"><a href="{{route('admin.gallery.create')}}" data-i18n="nav.templates.vert.classic_menu" class="menu-item">Add new Gallery</a>
                    </li>
                    
                   
                </ul>

            </li>


            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Bank Transfer</span></a>
                <ul class="menu-content">
                    <li class="{{Request::route()->getName() == 'bank-transfer'   ? 'active' : ''}}"><a href="{{route('bank-transfer')}}" data-i18n="nav.page_layouts.1_column" class="menu-item">View all Unpaid</a>
                    </li>
                    <li class="{{Request::route()->getName() == 'bank-transfer.paid'   ? 'active' : ''}}"><a href="{{route('bank-transfer.paid')}}" data-i18n="nav.page_layouts.2_columns" class="menu-item">View all piad</a>
                    </li>

                    <li class="{{Request::route()->getName() == 'payfort.index'   ? 'active' : ''}}"><a href="{{route('payfort.index')}}" data-i18n="nav.page_layouts.2_columns" class="menu-item">View all Payfort transactions</a>
                    </li>
                </ul>
            </li>

           
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <div class="main-menu-footer footer-close">
        <div class="header text-xs-center"><a href="#" class="col-xs-12 footer-toggle"><i class="icon-ios-arrow-up"></i></a></div>
        <div class="content">
            <div class="insights">
                <div class="col-xs-12">
                    <p>Product Delivery</p>
                    <progress value="25" max="100" class="progress progress-xs progress-success">25%</progress>
                </div>
                <div class="col-xs-12">
                    <p>Targeted Sales</p>
                    <progress value="70" max="100" class="progress progress-xs progress-info">70%</progress>
                </div>
            </div>
            <div class="actions"><a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Settings"><span aria-hidden="true" class="icon-cog3"></span></a><a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock"><span aria-hidden="true" class="icon-lock4"></span></a><a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout"><span aria-hidden="true" class="icon-power3"></span></a></div>
        </div>
    </div>
    <!-- main menu footer-->
</div>
<!-- / main menu-->