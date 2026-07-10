<style>
    .nav-box {
        background-color: rgb(192, 192, 239);
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .nav-box a {
        color: #343a40 !important;
        font-weight: bold;
    }
    .nav-box.active-box {
        background-color: #007bff;
    }
    .nav-box.active-box a {
        color: #fff !important;
    }
    .nav-box:hover {
        background-color: #e2e6ea;
    }
    .cursor-pointer {
        cursor: pointer;
    }
</style>

<nav class="px-3" style="border-bottom:1px solid #ddd">
    <div class="d-flex justify-content-between align-items-center py-2">

        <i class="fa fa-bars cursor-pointer" onclick="toggleLeftDrawer()"></i>

        <div class="d-flex align-items-center gap-3">

            <div class="nav-box {{ request()->routeIs('orders') ? 'active-box' : '' }}">
                <a href="{{ route('orders') }}" class="d-flex px-4 py-2 text-decoration-none">
                    Orders
                </a>
            </div>

            <div class="nav-box {{ request()->routeIs('contacts.*') ? 'active-box' : '' }}">
                <a href="{{ route('contacts.index') }}" class="d-flex px-4 py-2 text-decoration-none">
                    Customer Inquiries
                </a>
            </div>

            <div class="nav-box {{ request()->routeIs('customer-inquiries') ? 'active-box' : '' }}">
                <a href="{{ route('customer-inquiries') }}" class="d-flex px-4 py-2 text-decoration-none">
                    Quotation Request
                </a>
            </div>

            <div class="nav-box {{ request()->routeIs('admin.repair-quotations') ? 'active-box' : '' }}">
                <a href="{{ route('admin.repair-quotations') }}" class="d-flex px-4 py-2 text-decoration-none">
                    Repair Quotation
                </a>
            </div>
            
            <div class="nav-box {{ request()->routeIs('admin.free-repair-bookings') ? 'active-box' : '' }}">
    <a href="{{ route('admin.free-repair-bookings') }}" class="d-flex px-4 py-2 text-decoration-none">
        Free Repair Bookings
    </a>
</div>


        </div>

        <livewire:components.avatar />
    </div>
</nav>
