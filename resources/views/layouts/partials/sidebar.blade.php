<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('members.index') }}">
                        <i class="fas fa-table"></i>Members</a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <button type="submit" form="logout-form" class="btn btn-primary btn-block">Logout</button>
                        </div>
                    </form>

                </li>

            </ul>
        </nav>
    </div>
</aside>
