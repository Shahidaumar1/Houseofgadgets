<nav class=" px-3 " style=" background-color: transparent;">
    <div class="d-flex justify-content-between align-items-center ">
        <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"> </i>

         <div class="d-none d-md-flex align-items-center admin-top-items" >
            <div>
                <a href="{{ route('buy-categories') }}" 
                class="text-dark item p-3 {{ $active == 'categories' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Devices</a>
            </div>
            <div>
                <a href="{{ route('buy-devices') }}" 
                class="text-dark p-3 item {{ $active == 'devices' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Brands</a>
            </div>
            <div>
                <a href="{{ route('buy-models') }}" 
                class="text-dark p-3 item {{ $active == 'models' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Models</a>
            </div>
            <div>
                <a href="{{ route('buy-models-add-ons') }}" 
                class="text-dark p-3 item {{ $active == 'add-ons' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Addons</a>
            </div>
        </div>




        <livewire:components.avatar />
    </div>


</nav>
