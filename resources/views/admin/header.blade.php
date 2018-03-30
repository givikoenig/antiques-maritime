<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="{!!url('/admin')!!}" class="logo">Admin <span class="lite">Panel</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <ul class="nav top-menu">                    
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </li>                    
        </ul>
    </div>

    <div class="top-nav notification-row">                
        <ul class="nav pull-right top-menu">
            <li><a href="/" target="_blank">
                <span class="username">Back to site</span>
                </a>
            </li>
            <li style="padding-top: 12px;"> <span class="username"> | </span> </li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <!-- <span class="profile-ava">
                        
                    </span>
 -->
                    <span class="username">{{Auth::user()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li>
                        <a href="{!!url('/logout')!!}"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

</header>



