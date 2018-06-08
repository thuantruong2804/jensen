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
            <li class="{{ Route::currentRouteName() == 'admin.character' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/character') }}" title="Quản lý nhân vật">
                    <i class="fa fa-lg fa-fw fa-user-secret"></i>
                    <span class="menu-item-parent">Quản lý nhân vật</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.new' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/new') }}" title="Quản lý tin tức">
                    <i class="fa fa-lg fa-fw fa-file-text-o"></i> 
                    <span class="menu-item-parent">Quản lý tin tức</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.inbox' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/inbox') }}" title="Quản lý hòm thư">
                    <i class="fa fa-lg fa-fw fa-envelope"></i>
                    <span class="menu-item-parent">Quản lý hòm thư</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.category' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/category') }}" title="Quản lý danh mục">
                    <i class="fa fa-lg fa-fw fa-sitemap"></i> 
                    <span class="menu-item-parent">Quản lý danh mục</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.ticket' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/ticket') }}" title="Quản lý ticket">
                    <i class="fa fa-lg fa-fw fa-comments-o"></i>
                    <span class="menu-item-parent">Quản lý ticket</span>
                </a>
            </li>
            @if ($currentAccount->AdminLevel == 99999)
            <li class="{{ Route::currentRouteName() == 'admin.product' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/product') }}" title="Quản lý sản phẩm">
                    <i class="fa fa-lg fa-fw fa-car"></i> 
                    <span class="menu-item-parent">Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.vip' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/vip') }}" title="Quản lý vip">
                    <i class="fa fa-lg fa-fw fa-diamond"></i> 
                    <span class="menu-item-parent">Quản lý vip</span>
                </a>
            </li>
			@endif
			@if ($currentAccount->AdminLevel == 1338 || $currentAccount->AdminLevel == 99999)	
            <li class="{{ Route::currentRouteName() == 'admin.order' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/order') }}" title="Quản lý mua đồ">
                    <i class="fa fa-lg fa-fw fa-list-ol"></i> 
                    <span class="menu-item-parent">Quản lý mua đồ</span>
                </a>
            </li>
			@endif
			@if ($currentAccount->AdminLevel == 99999)
            <li class="{{ Route::currentRouteName() == 'admin.ordervip' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/ordervip') }}" title="Quản lý mua vip">
                    <i class="fa fa-lg fa-fw fa-th-large"></i> 
                    <span class="menu-item-parent">Quản lý mua vip</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.transaction' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/discount') }}" title="Quản lý chiết khấu">
                    <i class="fa fa-lg fa-fw fa-money"></i>
                    <span class="menu-item-parent">Quản lý chiết khấu</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.transaction' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/voucher') }}" title="Quản lý voucher">
                    <i class="fa fa-lg fa-fw fa-money"></i>
                    <span class="menu-item-parent">Quản lý voucher</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() == 'admin.transaction' ? 'active' : '' }}">
                <a href="{{ URL::to('/admin/transaction') }}" title="Quản lý nạp thẻ">
                    <i class="fa fa-lg fa-fw fa-money"></i> 
                    <span class="menu-item-parent">Lịch sử nạp thẻ</span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>
</aside>

