<header id="header">
    <div id="logo-group">
        <span id="logo"> 
            <img src="{{Asset('assets/img/logo.png')}}" alt="SmartAdmin"> 
        </span>
    </div>

    <!-- pulled right: nav area -->
    <div class="pull-left">
        
        
        <!-- #MOBILE -->
        <!-- Top menu profile link : this shows only when top menu is active -->
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
                    <img src="{{Asset('assets/img/avatars/3.png')}}" alt="John Doe" class="online" />  
                </a>
            </li>
        </ul>

        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- input: search field -->
        <!--
        <form action="search.html" class="header-search pull-right">
            <input id="search-fld"  type="text" name="param" placeholder="Tìm kiếm giao dịch...">
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
            <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
        </form>
        <!-- end input: search field -->
        <!-- end fullscreen button -->

    </div>
    <!-- end pulled right: nav area -->
    <div class="pull-right">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
                <div class="row avatar" style="margin-right: 11px;">
                    <div class="col-sm-8" style="text-align: right; padding-right: 0px;">
                        <p id="show-shortcut" data-action="toggleShortcut">
                            <span style="text-transform: lowercase; cursor: pointer;">
                                {{ BaseController::getAccountInfo()->UserName }}
                            </span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <p>
                            <a href="{{ URL::to('/admin/logout') }}" class="logout">Đăng xuất</a>
                        </p>
                    </div>
                    <div class="col-sm-4" style="text-align: right;">
                        <a style="cursor: pointer;">
                            <img src="{{Asset('assets/img/avatars/3.png')}}" alt="me" class="online" id="show-shortcut" data-action="toggleShortcut" style="border-left: none;"/> 
                        </a>
                    </div>
                </div>
        </span>
    </div>
</header>