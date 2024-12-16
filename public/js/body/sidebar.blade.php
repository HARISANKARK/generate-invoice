<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
        <!--<img src="{{ asset('images/well_built_logo.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
        <span class="brand-text font-weight-light" style="font-size: 18px;">{{env("APP_NAME")}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/user-profile.jpg')}}" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{url('/home')}}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('trips') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('trips*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Trips
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trips.create')}}" class="nav-link {{ Request::is('trips/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trips.index')}}" class="nav-link {{ Request::is('trips') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trips.gst_purchases')}}" class="nav-link {{ Request::is('trips/gst_purchases') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>GST Purchase View</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trips.gst_sales')}}" class="nav-link {{ Request::is('trips/gst_sales') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>GST Sale View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany @endcan @can('trip_assign_purchase_rate') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('trip_assign_purchase_rate*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-rupee-sign"></i>
                        <p>
                            Assign Purchase Rate
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trip_assign_purchase_rate.create')}}" class="nav-link {{ Request::is('trip_assign_purchase_rate/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trip_assign_purchase_rate.index')}}" class="nav-link {{ Request::is('trip_assign_purchase_rate') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                @endcan
                @can('diesel_purchases') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('diesel_purchases*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Diesel Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create')
                        <li class="nav-item">
                            <a href="{{route('diesel_purchases.create')}}" class="nav-link {{ Request::is('diesel_purchases/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @endcan
                        @can('view')
                        <li class="nav-item">
                            <a href="{{route('diesel_purchases.index')}}" class="nav-link {{ Request::is('diesel_purchases') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany @endcan @can('vehicle_slip') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('vehicle_slip*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Vehicle Slip
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vehicle_slip.create')}}" class="nav-link {{ Request::is('vehicle_slip/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Vehicle Slip</p>
                            </a>
                        </li>
                    </ul>
                    @endcan @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vehicle_slip.index')}}" class="nav-link {{ Request::is('vehicle_slip') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Vehicle Slip</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vehicle_slip.view.cancel')}}" class="nav-link {{ Request::is('vehicle_slip/cancel//view') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancelled Vehicle Slips</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany @endcan @can('sale') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('sales*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>
                            Sale
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sales.create')}}" class="nav-link {{ Request::is('sales/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Sale</p>
                            </a>
                        </li>
                    </ul>
                    @endcan @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sales.index')}}" class="nav-link {{ Request::is('sales') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>B to B</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('view.nongst')}}" class="nav-link {{ Request::is('sales/view/nongst') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>B to C</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('view.igst')}}" class="nav-link {{ Request::is('sales/view/igst') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>B to I</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sales.total_sales')}}" class="nav-link  {{ Request::is('sales/total_sale') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Total Sales</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany @endcan @can('estimate_sale') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('estimate_sales*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-folder-open"></i>
                        <p>
                            Estimate Sale
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('estimate_sales.create')}}" class="nav-link {{ Request::is('estimate_sales/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('estimate_sales.index')}}" class="nav-link {{ Request::is('estimate_sales') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany @endcan @can('cash_flow') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('cash_flow*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-money"></i>
                        <p>
                            Cash Flow
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cash_flow.create')}}" class="nav-link {{ Request::is('cash_flow/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cash_flow.index')}}" class="nav-link {{ Request::is('cash_flow') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany @endcan @can('attendance') @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('attendances*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Attendance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create')
                        <li class="nav-item">
                            <a href="{{route('attendances.create')}}" class="nav-link {{ Request::is('attendances/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Add
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('view')
                        <li class="nav-item">
                            <a href="{{route('attendances.index')}}" class="nav-link {{ Request::is('attendances') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    View
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                @endcan
                @can('diesel')
                @php
                    $dieselRoutes = [
                        'pump_products',
                        'pump_purchases',
                        'pump_issues'
                    ];
                @endphp
                <li class="nav-item {{ in_array(Request::segment(1), $dieselRoutes) ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-gas-pump"></i>
                        <p>
                            Diesel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('pump_products')
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('pump_products*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cube"></i>
                                <p>
                                    Product
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pump_products.create')}}" class="nav-link {{ Request::is('pump_products/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pump_products.index')}}" class="nav-link {{ Request::is('pump_products') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Product</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @endcan
                    @can('pump_purchases')
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('pump_purchases*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Purchase
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pump_purchases.create')}}" class="nav-link {{ Request::is('pump_purchases/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Purchase</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pump_purchases.index')}}" class="nav-link {{ Request::is('pump_purchases') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Purchase</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @endcan
                    @can('pump_issues')
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('pump_issues*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    Issue
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pump_issues.create')}}" class="nav-link {{ Request::is('pump_issues/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Issue</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pump_issues.index')}}" class="nav-link {{ Request::is('pump_issues') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Issue</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('purchase')
                @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('purchases*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('purchases.create')}}" class="nav-link {{ Request::is('purchases/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('purchases.index')}}" class="nav-link {{ Request::is('purchases') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                @endcan
                @can('goods_rate')
                <li class="nav-item {{ Request::is('goods_rates*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-rupee-sign"></i>
                        <p>
                            Goods Rates
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('goods_rates.create')}}" class="nav-link {{ Request::is('goods_rates/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('goods_rates.index')}}" class="nav-link {{ Request::is('goods_rates') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('goods_purchase')
                @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('goods_purchase*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Goods Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('goods_purchase.create')}}" class="nav-link {{ Request::is('goods_purchase/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('goods_purchase.index')}}" class="nav-link {{ Request::is('goods_purchase') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                @endcan
                @can('vehicle_maintenance')
                @canany(['view', 'create'])
                <li class="nav-item {{ Request::is('vehicle_maintenance*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Vehicle Maintenance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vehicle_maintenance.create')}}" class="nav-link {{ Request::is('vehicle_maintenance/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vehicle_maintenance.index')}}" class="nav-link {{ Request::is('vehicle_maintenance') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                @endcan
                @unlessrole('yard1')
                    @include('body.hollow_bricks_menus')
                @endunlessrole
                @can('income_expense_menu')
                <li class="nav-item {{ Request::is('gst_account_heads*') || Request::is('gst_account_transactions*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Income/Expense
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('gst_account_heads')
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('gst_account_heads*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>
                                    Income/Expense Head
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('gst_account_heads.create')}}" class="nav-link {{ Request::is('gst_account_heads/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('gst_account_heads.index')}}" class="nav-link {{ Request::is('gst_account_heads') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @endcan
                    @can('gst_account_transactions')
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('gst_account_transactions*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-exchange-alt nav-icon"></i>
                                <p>
                                    Income/Expense
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('gst_account_transactions.create')}}" class="nav-link {{ Request::is('gst_account_transactions/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('gst_account_transactions.index')}}" class="nav-link {{ Request::is('gst_account_transactions') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('stock')
                <li class="nav-item {{ Request::is('good_stock*') || Request::is('product_stock*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Stock
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @can('good_stock')
                        <li class="nav-item {{ Request::is('good_stock*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Goods
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('good_stock.create')}}" class="nav-link {{ Request::is('good_stock/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('good_stock.index')}}" class="nav-link {{ Request::is('good_stock') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('product_stock')
                        <li class="nav-item {{ Request::is('product_stock*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('product_stock.create')}}" class="nav-link {{ Request::is('product_stock/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('product_stock.index')}}" class="nav-link {{ Request::is('product_stock') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('good_stock_report')
                        <li class="nav-item">
                            <a href="{{ route('good_stock.report')}}" class="nav-link {{ Request::is('good_stock/report') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Good Stock</p>
                            </a>
                        </li>
                        @endcan
                        @can('product_stock_report')
                        <li class="nav-item">
                            <a href="{{ route('product_stock.report')}}" class="nav-link {{ Request::is('product_stock/report') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Stock</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('assign_feet')
                <li class="nav-item {{ Request::is('assign_feet*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ruler"></i>
                        <p>
                            Assign Feet
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assign_feet.create')}}" class="nav-link {{ Request::is('assign_feet/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assign_feet.index')}}" class="nav-link {{ Request::is('assign_feet') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('assign_divisional_values')
                <li class="nav-item {{ Request::is('assign_divisional_values*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ruler"></i>
                        <p>
                            Assign Divisional Value
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assign_divisional_values.create')}}" class="nav-link {{ Request::is('assign_divisional_values/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('view')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assign_divisional_values.index')}}" class="nav-link {{ Request::is('assign_divisional_values') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('assign_rate')
                <li class="nav-item {{ Request::is('rate_updates*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Assign Rate
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create')
                        <li class="nav-item">
                            <a href="{{route('rate_updates.create')}}" class="nav-link {{ Request::is('rate_updates/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Add
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('view')
                        <li class="nav-item">
                            <a href="{{route('rate_updates.index')}}" class="nav-link {{ Request::is('rate_updates') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    View
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('accounts')
                @php
                    $accountsRoutes = [
                        'banks',
                        'account_categories',
                        'account_heads',
                        'account_methods',
                        'account_transactions'
                    ];
                @endphp
                @canany(['view', 'create'])
                <li class="nav-item {{ in_array(Request::segment(1), $accountsRoutes) ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Accounts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('banks')
                        <li class="nav-item {{ Request::is('banks*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-university nav-icon"></i>
                                <p>
                                    Banks
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create')
                                <li class="nav-item">
                                    <a href="{{route('banks.create')}}" class="nav-link {{ Request::is('banks/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endcan
                                @can('view')
                                <li class="nav-item">
                                    <a href="{{route('banks.index')}}" class="nav-link {{ Request::is('banks') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('account_categories')
                        <li class="nav-item {{ Request::is('account_categories*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>
                                    Account Categories
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create')
                                <li class="nav-item">
                                    <a href="{{route('account_categories.create')}}" class="nav-link {{ Request::is('account_categories/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endcan
                                @can('view')
                                <li class="nav-item">
                                    <a href="{{route('account_categories.index')}}" class="nav-link {{ Request::is('account_categories') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('account_heads')
                        <li class="nav-item {{ Request::is('account_heads*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>
                                    Account Heads
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create')
                                <li class="nav-item">
                                    <a href="{{route('account_heads.create')}}" class="nav-link {{ Request::is('account_heads/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endcan
                                @can('view')
                                <li class="nav-item">
                                    <a href="{{route('account_heads.index')}}" class="nav-link {{ Request::is('account_heads') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('account_methods')
                        <li class="nav-item {{ Request::is('account_methods*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>
                                    Account Methods
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create')
                                <li class="nav-item">
                                    <a href="{{route('account_methods.create')}}" class="nav-link {{ Request::is('account_methods/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endcan
                                @can('view')
                                <li class="nav-item">
                                    <a href="{{route('account_methods.index')}}" class="nav-link {{ Request::is('account_methods') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('account_transactions')
                        <li class="nav-item {{ Request::is('account_transactions*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fas fa-exchange-alt nav-icon"></i>
                                <p>
                                    Account Transactions
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create')
                                <li class="nav-item">
                                    <a href="{{route('account_transactions.create')}}" class="nav-link {{ Request::is('account_transactions/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endcan
                                @can('view')
                                <li class="nav-item">
                                    <a href="{{route('account_transactions.index')}}" class="nav-link {{ Request::is('account_transactions') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        <!--<li class="nav-item">-->
                        <!--  <a href="" class="nav-link">-->
                        <!--    <i class="fas fa-file nav-icon"></i>-->
                        <!--    <p>-->
                        <!--      Detailed Transactions -->
                        <!--    </p>-->
                        <!--  </a>-->
                        <!--</li>-->
                    </ul>
                </li>
                @endcanany
                @endcan
                @can('vehicle_expense')
                <li class="nav-item {{ Request::is('vehicle_expense*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>
                            Vehicle Expense
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('create')
                        <li class="nav-item">
                            <a href="{{route('vehicle_expense.create')}}" class="nav-link {{ Request::is('vehicle_expense/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                        @endcan
                        @can('view')
                        <li class="nav-item">
                            <a href="{{route('vehicle_expense.index')}}" class="nav-link {{ Request::is('vehicle_expense') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('gst_stock_report')
                <li class="nav-item">
                    <a href="{{ route('gst_stock_report.index')}}" class="nav-link {{ Request::is('gst_stock_report/index') ? 'active' : '' }}">
                        <i class="far fa-file nav-icon"></i>
                        <p>Stock Report</p>
                    </a>
                </li>
                @endcan
                @can('trips_reports')
                @php
                    $tripReportsRoutes = [
                        'trip_weekly_report',
                        'trip_customer_report',
                        'trip_vendor_report',
                        'trip_vehicle_report',
                        'trip_driver_report',
                        'trip_pump_report',
                        'trip_staff_report'
                    ];
                @endphp
                <li class="nav-item {{ in_array(Request::segment(1), $tripReportsRoutes) ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-flag-checkered"></i>
                        <p>
                            Trips Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('trips_weekly_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_weekly_report.create')}}" class="nav-link {{ Request::is('trip_weekly_report*') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Weekly Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('trips_customer_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_customer_report.create')}}" class="nav-link {{ Request::is('trip_customer_report*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    Customer Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('trips_vendor_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_vendor_report.create')}}" class="nav-link {{ Request::is('trip_vendor_report*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-user-circle"></i>
                                <p>
                                    Vendor Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('trips_vehicle_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_vehicle_report.create')}}" class="nav-link {{ Request::is('trip_vehicle_report*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-truck-moving"></i>
                                <p>
                                    Vehicle Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('trips_driver_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_driver_report.create')}}" class="nav-link {{ Request::is('trip_driver_report*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-portrait"></i>
                                <p>
                                    Driver Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('trips_pump_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_pump_report.create')}}" class="nav-link {{ Request::is('trip_pump_report*') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Pump Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('trips_staff_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('trip_staff_report.index')}}" class="nav-link {{ Request::is('trip_staff_report*') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Staff Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('reports')
                @php
                    $reportsRoutes = [
                        'diesel_stock',
                        'weekly_report',
                        'reports',
                        'consolidated_reports',
                        'driver_report',
                        'payment_method_report',
                        'attendance_report',
                        'transaction',
                        'banks',
                        'cash_book',
                        'goods_purchase_cash_report'
                    ];
                @endphp
                <li class="nav-item {{ in_array(Request::segment(1), $reportsRoutes) ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('diesel_stock')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('diesel_stock.index')}}" class="nav-link {{ Request::is('diesel_stock') ? 'active' : '' }}">
                                <i class="nav-icon far fa-file"></i>
                                <p>
                                    Diesel Stock
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('weekly_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('weekly_report.create')}}" class="nav-link {{ Request::is('weekly_report/create') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Weekly Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('reports.create')}}" class="nav-link {{ Request::is('reports/create') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('consolidated_reports')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('consolidated_reports.create')}}" class="nav-link {{ Request::is('consolidated_reports') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Consolidated Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('driver_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('driver_report.create')}}" class="nav-link {{ Request::is('driver_report/create') ? 'active' : '' }}">
                                <i class="nav-icon far fa-file"></i>
                                <p>
                                    Driver Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('payment_method_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('payment_method_report.create')}}" class="nav-link {{ Request::is('payment_method_report/create') ? 'active' : '' }}">
                                <i class="nav-icon far fa-file"></i>
                                <p>
                                    Payment Method Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('attendance_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('attendance_report.index')}}" class="nav-link {{ Request::is('attendance_report') ? 'active' : '' }}">
                                <i class="nav-icon far fa-file"></i>
                                <p>Attendance Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('transaction_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('transaction.report')}}" class="nav-link {{ Request::is('transaction/report') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>
                                    Transactions Report
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    <!--<ul class="nav nav-treeview">-->
                    <!--  <li class="nav-item">-->
                    <!--    <a href="{{route('banks.report')}}" class="nav-link {{ Request::is('banks/report') ? 'active' : '' }}">-->
                    <!--      <i class="far fa-file nav-icon"></i>-->
                    <!--      <p>-->
                    <!--        Bank Report-->
                    <!--      </p>-->
                    <!--    </a>-->
                    <!--  </li>-->
                    <!--</ul>-->
                    @can('cash_book')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cash_book.create')}}" class="nav-link {{ Request::is('cash_book/create') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Cash Book</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('goods_purchase_cash_report')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('goods_purchase_cash_report.index')}}" class="nav-link {{ Request::is('goods_purchase_cash_report') ? 'active' : '' }}">
                                <i class="far fa-file nav-icon"></i>
                                <p>Purchase Cash Report</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcan
                @can('activity_log')
                <li class="nav-item">
                    <a href="{{route('activity_log.index')}}" class="nav-link {{ Request::is('activity_log') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bar-chart"></i>
                        <p>
                            Activity Log
                        </p>
                    </a>
                </li>
                @endcan
                @can('manage')
                @php
                    $manageRoutes = [
                        'credit_limits',
                        'goods',
                        'hollow_bricks',
                        'products',
                        'sites'
                    ];
                @endphp
                <li class="nav-item {{ in_array(Request::segment(1), $manageRoutes) ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Manage
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('credit_limits*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa fa-credit-card"></i>
                                <p>
                                    Credit Limit
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('credit_limits.create')}}" class="nav-link {{ Request::is('credit_limits/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('credit_limits.index')}}" class="nav-link {{ Request::is('credit_limits') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('goods*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cube"></i>
                                <p>
                                    Goods
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('goods.create')}}" class="nav-link {{ Request::is('goods/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Goods</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('goods.index')}}" class="nav-link {{ Request::is('goods') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Goods</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @can('hollow_bricks')
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('hollow_bricks*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cube"></i>
                                <p>
                                    Hollow Bricks
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('hollow_bricks.create')}}" class="nav-link {{ Request::is('hollow_bricks/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('hollow_bricks.index')}}" class="nav-link {{ Request::is('hollow_bricks') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                    @endcan
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('products*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Product
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('products.create')}}" class="nav-link {{ Request::is('products/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('products.index')}}" class="nav-link {{ Request::is('products') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Product</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ Request::is('sites*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Sites
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('create')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sites.create')}}" class="nav-link {{ Request::is('sites/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Site</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan @can('view')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sites.index')}}" class="nav-link {{ Request::is('sites') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Site</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
