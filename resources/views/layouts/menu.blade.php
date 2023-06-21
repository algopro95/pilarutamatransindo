
<li class="nav-item">
    <a href="{{ route('data.index') }}"
       class="nav-link {{ Request::is('data*') ? 'active' : '' }}">
        <p>Data</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('search') }}"
       class="nav-link {{ Request::is('search*') ? 'active' : '' }}">
        <p>Search</p>
    </a>
</li>


