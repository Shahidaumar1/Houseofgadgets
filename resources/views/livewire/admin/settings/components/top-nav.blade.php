<nav class=" px-3 " style=" background-color: transparent;">
    <div class="d-flex justify-content-between align-items-center ">
        <i class="fa fa-bars cursor-pointer text-dark" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

        <div class="d-none d-md-flex align-items-center admin-top-items">
            <div>
                <a href="{{ route('payment-methods-settings') }}" class=" text-dark item p-3 {{ $active == 'payment' ? 'text-primary fw-bold p-3' : '' }}" style="background-color: transparent;">Payment</a>
            </div>
            <div>
                <a href="{{ route('site-settings') }}" class=" text-dark p-3 item  {{ $active == 'site-settings' ? 'text-primary fw-bold p-3' : '' }}" style="background-color: transparent;">site-settings</a>
            </div>
            <div>
                <a href="{{ route('branches-settings') }}" class=" text-dark p-3 item  {{ $active == 'branches' ? 'text-primary fw-bold p-3' : '' }}" style="background-color: transparent;">Branches</a>
            </div>
            <div>
                <a href="{{ route('create-branches') }}" class=" text-dark p-3 item  {{ $active == 'create' ? 'text-primary fw-bold p-3' : '' }}" style="background-color: transparent;">Create</a>
            </div>
            <div>
                <a href="{{ route('services-settings') }}" class=" text-dark p-3 item  {{ $active == 'services' ? 'text-primary fw-bold p-3' : '' }}" style="background-color: transparent;">Services</a>
            </div>


        </div>

        <livewire:components.avatar />
    </div>

</nav>


