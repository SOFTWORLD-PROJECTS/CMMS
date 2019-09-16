<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
    data-auto-scroll="true" data-slide-speed="200">
    <li class="nav-item {{ Request::is('dashboard*') ? "active" :"" }}">
        <a href="{{route('dashboard')}}" class="nav-link">
            <img alt="" src="{{asset('assets/img/dashboard.png') }}"/>
            <span class="title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->hasAccess('machinery', 'view'))
        <li class="nav-item  {{ Request::is('machinery*') ? "active" :"" }}">
            <a href="{{route('machinery')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/machinery.png') }}"/>
                <span class="title">Machinery</span>
            </a>
        </li>
    @endif
    @if(Auth::user()->hasAccess('workorder', 'view'))
        <li class="nav-item  {{ Request::is('workorder*') ? "active" :"" }}">
            <a href="{{route('workorder')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/work_order.png') }}"/>
                <span class="title">Work Order</span>
            </a>
        </li>
    @endif
    @if(Auth::user()->hasAccess('premaintenance', 'view'))
        <li class="nav-item {{ Request::is('premaintenance*') ? "active" :"" }}">
            <a href="{{route('premaintenance')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/prevent-maintenance.png') }}"/>
                <span class="title">Prenvent Maintenance</span>
            </a>
        </li>
    @endif
    @if(Auth::user()->hasAccess('record', 'view'))
        <li class="nav-item  {{ Request::is('record*') ? "active" :"" }}">
            <a href="{{route('record')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/record.png') }}"/>
                <span class="title">Record</span>
            </a>
        </li>
    @endif
    @if(Auth::user()->hasAccess('renewal', 'view'))
        <li class="nav-item  {{ Request::is('renewal*') ? "active" :"" }}">
            <a href="{{route('renewal')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/renewal.png') }}"/>
                <span class="title">Renewal</span>
            </a>
        </li>
    @endif
    @if(Auth::user()->hasAccess('diesal', 'view'))
        <li class="nav-item {{ Request::is('diesal*') ? "active" :"" }}">
            <a href="{{route('diesal')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/diesal.png') }}"/>
                <span class="title">Diesel</span>
            </a>
        </li>
    @endif
    @if(Auth::user()->hasAccess('report', 'view'))
        <li class="nav-item {{ Request::is('report*') ? "active" :"" }}">
            <a href="{{route('report')}}" class="nav-link">
                <img alt="" src="{{asset('assets/img/report.png') }}"/>
                <span class="title">Report&nbsp;&nbsp;</span>
            </a>
        </li>
    @endif
</ul>
