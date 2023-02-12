<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item"> <a class="nav-link collapsed" href="{{ url('admin/dashboard') }}"><i
                    class="bi bi-grid-1x2-fill"></i><span>Dashboard</span> </a></li>
        <li class="nav-item"> <a class="nav-link collapsed" href="{{ url('admin/users/') }}"><i
                    class="bi bi-person-fill"></i><span>Users</span> </a></li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#product_table" data-bs-toggle="collapse" href="#"><i
                    class="bi bi-basket3-fill"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="product_table" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="{{ route('products.index') }}"> <i class="bi bi-circle"></i><span>Products</span> </a>
                </li>
                <li> <a href="{{ route('products.create') }}"> <i class="bi bi-circle"></i><span>Add Product</span>
                    </a></li>
                <li> <a href="{{ route('category.index') }}"> <i class="bi bi-circle"></i><span>Categories</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#heroslides_table" data-bs-toggle="collapse" href="#"><i
                    class="bi bi-basket3-fill"></i><span>System settings</span><i
                    class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="heroslides_table" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="{{ route('heroslide.index') }}"> <i class="bi bi-circle"></i><span>Hero Slides</span> </a>
                </li>
                <li> <a href="{{ route('featuredproducts.index') }}"> <i class="bi bi-circle"></i><span>Featured
                            Products</span>
                    </a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#transaction_table" data-bs-toggle="collapse"
                href="#"><i class="bi bi-clipboard2-check-fill"></i>Transactions</span><i
                    class="bi bi-chevron-down ms-auto"></i> </a>
            <ul id="transaction_table" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="{{ route('order.index') }}"> <i class="bi bi-circle"></i><span>Orders</span> </a></li>
            </ul>
        </li>
    </ul>
</aside>
