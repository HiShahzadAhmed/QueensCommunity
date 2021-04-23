<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto mt-1"><a class="navbar-brand mt-0" style="padding-top: 0px;" href="">
                    <div class="brand-logo" style="background-image: url('{{ asset(Auth::User()->avatar)  }}');"></div>
                    <h2 class="brand-text mb-0"><img src="{{ asset($setting['logo'] ?? '')  }}" style="width: 120px;" alt=""></h2>
                </a></li>
            <!--    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        -->
        </ul>
    </div>
    <hr class="m-0">
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @routeis('admin.dashboard') active @endrouteis"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-home"></i>Dashboard</a></li>

            @can('browse_questions')
                <li class="nav-item @routeis('admin.questions.index') active @endrouteis"><a href="{{ route('admin.questions.index') }}"><i class="feather icon-help-circle"></i>Questions</a></li>
            @endcan

            <li class=" navigation-header"><span>Others</span></li>
            <li class="nav-item"><a href=""><i class="feather icon-users"></i>Members</a></li>
            <li class="nav-item @routeis('admin.setting.index') active @endrouteis"><a href="{{ route('admin.setting.index') }}"><i class="feather icon-settings"></i>Settings</a></li>





            @can('browse_blogs')
                <li class="nav-item @routeis('admin.blogs.index') active @endrouteis"><a href="{{ route('admin.blogs.index') }}"><i class="feather icon-book"></i>Blogs</a></li>
            @endcan

            @can('browse_videos')
                <li class="nav-item @routeis('admin.videos.index') active @endrouteis"><a href="{{ route('admin.videos.index') }}"><i class="feather icon-video"></i>Videos</a></li>
            @endcan
            @can('browse_category')
            <li class="nav-item @routeis('admin.categories.index') active @endrouteis"><a href="{{ route('admin.categories.index') }}"><i class="feather icon-list"></i>Category</a></li>
            @endcan


            <li class="nav-item @routeis('admin.inquiries') active @endrouteis"><a href="{{ route('admin.inquiries') }}"><i class="feather icon-info"></i>Inquiries</a></li>
            
            <li class=" navigation-header"><span>Site Settings</span></li>
            <li class="nav-item @routeis('admin.setting.index') active @endrouteis"><a href="{{ route('admin.setting.index') }}"><i class="feather icon-settings"></i>Settings</a></li>

             @can('browse_roles')
            <li class=" navigation-header"><span>Roles Management</span></li>
                <li class="nav-item @routeis('admin.roles.index') active @endrouteis"><a href="{{ route('admin.roles.index') }}"><i class="feather icon-zap"></i>Roles</a></li>
            @endcan

            @can('browse_teams')
                <li class="nav-item @routeis('admin.teams.index') active @endrouteis"><a href="{{ route('admin.teams.index') }}"><i class="feather icon-users"></i>Teams</a></li>
            @endcan



        </ul>
    </div>
</div>
