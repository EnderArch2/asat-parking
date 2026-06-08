<ul class="navbar-nav">
    <li class="nav-item">
        <a href="{{ route('location.index') }}" class="nav-link {{ request()->routeIs('locations.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fas fa-map-marker-alt"></i></span>
            Location
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('transactions.index') }}"
            class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fas fa-exchange-alt"></i></span>
            Transaction
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('vehicle_type.index') }}"
            class="nav-link {{ request()->routeIs('vehicle-types.*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fas fa-rocket"></i></span>
            Vehicle Type
        </a>
    </li>
</ul>
