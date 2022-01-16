<div class="sidebar">
    <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">E-commerce</span>
    </div>
    <ul class="nav-links">
        <li>
            <a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('categories') ? 'active' : '' }}" href="{{ url('categories') }}">
                <i class="bx bx-box"></i>
                <span class="links_name">Categories</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('add-category') ? 'active' : '' }}" href="{{ url('add-category') }}">
                <i class="bx bx-box"></i>
                <span class="links_name">Add Categories</span>
            </a>
        </li>

        <li>
            <a class="{{ Request::is('products') ? 'active' : '' }}" href="{{ url('products') }}">
                <i class="bx bx-box"></i>
                <span class="links_name">Products</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('add-product') ? 'active' : '' }}" href="{{ url('add-product') }}">
                <i class="bx bx-box"></i>
                <span class="links_name">Add Product</span>
            </a>
        </li>


    </ul>
</div>
