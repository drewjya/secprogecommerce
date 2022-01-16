<nav>
    <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Dashboard</span>
    </div>
    <div class="search-box">
        <input type="text" placeholder="Search..." />
        <i class="bx bx-search"></i>
    </div>
    <div class="dropdown">
        <button class="dropbtn-ac">My Account </button>
        <div class="dropdown-content">
            <a href="./Categorie_Shirt.html"> {{ Auth::user()->name }}</a>
            <div class="menu">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
