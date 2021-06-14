<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">{{ Auth::user()->email }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU</h4>
                </li>
                <li class="nav-item
                    @if (Route::currentRouteName() == 'dashboard')
                        active
                    @endif
                ">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item
                @if (Route::currentRouteName() == 'clients.index' || Route::currentRouteName() == 'clients.edit' || Route::currentRouteName() == 'clients.create')
                    active
                @endif
                ">
                    <a href="{{ route('clients.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li class="nav-item
                @if (Route::currentRouteName() == 'products.index' || Route::currentRouteName() == 'products.edit' || Route::currentRouteName() == 'products.create')
                    active
                @endif
                ">
                    <a href="{{ route('products.index') }}">
                        <i class="fas fa-cart-arrow-down"></i>
                        <p>Produtos</p>
                    </a>
                </li>
                <li class="nav-item
                @if (Route::currentRouteName() == 'purchases.show' || Route::currentRouteName() == 'purchases.index' || Route::currentRouteName() == 'purchases.edit' || Route::currentRouteName() == 'purchases.create')
                    active
                @endif
            ">
                    <a href="{{ route('purchases.index') }}">
                        <i class="fas fa-book"></i>
                        <p>Pedidos</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>