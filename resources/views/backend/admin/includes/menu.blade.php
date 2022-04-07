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

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-image"></i>
                    <span class="nav-label">Banner mangements</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('banner.index')}}">manage banner </a>
                        <a href="{{route('banner.add')}}">add banner </a>
                    </li>
                </ul>
            </li>

            

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-details"></i>
                    <span class="nav-label">About mangements</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('about.index')}}">manage about </a>
                        <a href="{{route('about.add')}}">add about </a>
                    </li>
                </ul>
            </li>
          
          

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Teams mangements</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('designation.index')}}"> Designation </a>
                        <a href="{{route('team.index')}}">All Teams</a>
                        <a href="{{route('team.add')}}">Add Teams</a>

                    </li>
                </ul>
            </li>
          
            
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-comments"></i>
                    <span class="nav-label">Testimonial </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('testimonial.index')}}">All Testimonial</a>
                        <a href="{{route('testimonial.add')}}">Add Testimonial</a>

                    </li>
                </ul>
            </li>

            
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-circle"></i>
                    <span class="nav-label">CMS </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('category.index')}}">Categories</a>
                        <a href="{{route('tag.index')}}">Tags</a>
                        <a href="{{route('blog.index')}}">Blogs</a>
                    </li>
                </ul>
            </li>
          
        </ul>
    </div>
</nav>