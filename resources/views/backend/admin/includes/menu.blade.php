<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{route('admin.dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
           
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-cog"></i>
                    <span class="nav-label">Settings</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('setting')}}">Site settings</a>
                    </li>
                    <li>
                        <a href="{{route('theme')}}">Theme settings</a>
                    </li>
                    <li>
                        <a href="{{route('social')}}">Social settings</a>
                    </li>
                    
                </ul>
            </li>
          
          
        </ul>
    </div>
</nav>