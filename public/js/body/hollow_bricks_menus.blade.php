@php
    $HBricksRoutes = [
        'hollow_bricks_sale', 
        'hollow_bricks_stock', 
        'hollow_bricks_stock_report', 
    ];
    
@endphp

@canany(['hollow_bricks_sale', 'hollow_bricks_stock','hollow_brick_stock_report'])
<li class="nav-item {{ isMenuOpen($HBricksRoutes) }}">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-cube"></i>
      <p>
        Hollow Bricks 
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    
    @can('hollow_bricks_sale')
    @canany(['view', 'create'])
    <ul class="nav nav-treeview">
        <li class="nav-item {{ isMenuOpen(['hollow_bricks_sale']) }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tag"></i>
              <p>
               Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @can('create')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hollow_bricks_sale.create')}}" class="nav-link {{ isActiveRoute('hollow_bricks_sale.create') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
            @endcan 
            @can('view')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hollow_bricks_sale.index')}}" class="nav-link {{ isActiveRoute('hollow_bricks_sale.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>B TO B</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hollow_bricks_sale.view_nongst')}}" class="nav-link {{ isActiveRoute('hollow_bricks_sale.view_nongst') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>B TO C</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hollow_bricks_sale.view_igst')}}" class="nav-link {{ isActiveRoute('hollow_bricks_sale.view_igst') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>B TO I</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hollow_bricks_sale.total_sales')}}" class="nav-link {{ isActiveRoute('hollow_bricks_sale.total_sales') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total Sale</p>
                </a>
              </li>
            </ul>
            @endcan 
        </li>
    </ul>
    @endcanany
     @endcan 
     @can('hollow_bricks_stock')
      @canany(['view', 'create'])
        <ul class="nav nav-treeview">
            <li class="nav-item {{ Request::is('hollow_bricks_stock*') && !Request::is('hollow_bricks_stock_report*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-truck-loading"></i>
                  <p>
                   Stock
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                @can('create')
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('hollow_bricks_stock.create')}}" class="nav-link {{ isActiveRoute('hollow_bricks_stock.create') }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add </p>
                    </a>
                  </li>
                </ul>
                @endcan 
                @can('view')
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('hollow_bricks_stock.index')}}" class="nav-link {{ isActiveRoute('hollow_bricks_stock.index') }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View </p>
                    </a>
                  </li>
                </ul>
                @endcan 
            </li>
        </ul>
    @endcanany
    @endcan 
    
    @php
        $HBricksReportRoutes = [
            'hollow_bricks_stock_report', 
        ];
    @endphp
    <ul class="nav nav-treeview">
        <li class="nav-item {{ isMenuOpen($HBricksReportRoutes) }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @can('hollow_brick_stock_report')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('hollow_bricks_stock_report.index')}}" class="nav-link {{ isActiveRoute('hollow_bricks_stock_report.index') }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Stock Report</p>
                </a>
              </li>
            </ul>
            @endcan 
        </li>
    </ul>
</li>
@endcanany