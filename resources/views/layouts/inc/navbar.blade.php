<nav>
    <div class="navbar">
        <h2>Dashboard</h2>

        <div class="dropdown">
            <button class="dropbtn-ac">My Account </button>
            <div class="dropdown-content">
                <a href="#"> {{ Auth::user()->name }}</a>
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
    </div>
</nav>


