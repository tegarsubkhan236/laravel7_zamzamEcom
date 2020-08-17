<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{url('/home')}}" class="{{ request()->is('home') ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <hr>
                <li><a href="{{url('/team')}}" class="{{ request()->is('team') ? 'active' : '' }}"><i class="lnr lnr-cog"></i> <span>Our Team</span></a></li>
                <li><a href="{{url('/customer')}}" class="{{ request()->is('customer') ? 'active' : '' }}"><i class="lnr lnr-heart"></i> <span>Customer</span></a></li>
                <hr>
                <li><a href="{{url('/category')}}" class="{{ request()->is('category') ? 'active' : '' }}"><i class="lnr lnr-list"></i> <span> Category</span></a></li>
                <li><a href="{{url('/produk')}}" class="{{ request()->is('produk') ? 'active' : '' }}"><i class="lnr lnr-diamond"></i> <span> Sample Product</span></a></li>
                <hr>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->