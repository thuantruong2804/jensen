<?php $currentAccount = BaseController::getAccountInfo(); ?>

<aside id="left-panel">
    <div class="login-info">
        
    </div>
    <nav>
        <ul>
            <li class="{{ Route::currentRouteName() == 'admin.account' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/account') }}" title="Quản lý người chơi">
                    <i class="fa fa-lg fa-fw fa-users"></i> 
                    <span class="menu-item-parent">Quản lý tài khoản</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.new' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/new') }}" title="Quản lý tin tức">
                    <i class="fa fa-lg fa-fw fa-file-text-o"></i> 
                    <span class="menu-item-parent">Quản lý tin tức</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.ticket' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/ticket') }}" title="Quản lý ticket">
                    <i class="fa fa-lg fa-fw fa-comments-o"></i>
                    <span class="menu-item-parent">Quản lý ticket</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.product' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/product') }}" title="Quản lý sản phẩm">
                    <i class="fa fa-lg fa-fw fa-car"></i> 
                    <span class="menu-item-parent">Quản lý sản phẩm</span>
                </a>
            </li>
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>
</aside>

