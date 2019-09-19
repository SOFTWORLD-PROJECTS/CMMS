<ul class="nav navbar-nav pull-right">
    <li class="date-label">
        Date <?php echo \Carbon\Carbon::now()->format("D, d M Y") ?>
    <li/>
    @if( Request::is('setting*') )
        <li class="setting-btn  active">
            <a href="{{route('setting')}}" style="padding:0px;">
                <img src="{{asset('assets/img/setting_white.png') }}"/>
            </a>
        <li/>
    @else
        <li class="setting-btn" style="background: white;">
            <a href="{{route('setting')}}" style="padding:0px;">
                <img src="{{asset('assets/img/setting_green.png') }}"/>
            </a>
        <li/>
    @endif
    <li class="border-line">
    <li/>
    <li class="logout-btn">
        <a href="#"   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="padding:0px;">
            <img src="{{asset('assets/img/logout.png') }}"/>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
    <li/>
</ul>
<ul class="nav navbar-nav pull-left">
    <li class="company-name">
        MJM (Palm Oil Mill) Sdn Bhd
    <li/>
    <li class="app-name">
        Centralised Machinery Monitoring System
    <li/>
</ul>