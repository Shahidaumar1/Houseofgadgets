<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="settings" />
        <x-content>
            <livewire:admin.settings.components.top-nav active="branches" />

            
            <div class="container my-5">
                <div>
                    @if(session()->has('message'))
                    <h3 class="alert alert-success">{{session('message')}}</h3>
                    @endif

                    <div class="">
                        <div class="">
                            <h4 class="text-black">
                                <b>Registered Branches</b>
                                
                            </h4>
                                <a href="{{ route('create-branches') }}" class="btn btn-primary float-end" style = "border-radius: 10px; color: white; background-color: #20375E; padding: 15px; border:0px;">Create new</a>
                        </div>
                        <div class="card-body">
                            <div class =  "d-flex justify-content-center" >
                                <input type="text" wire:model="search" class="form-control mb-4" placeholder="Search..." style="width: 130px; min-width: 200px;">
                            </div>
                                
                            </div>
                                
                            <div class=" flex-wrap table-responive  "style="overflow-x: auto;" >
                                <!-- Search Input -->

                                <table class="table   p-5  " >
                                    <thead>
                                        <tr style = "background-color: rgb(192, 192, 239);">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Town/City</th>
                                            <th>Post Code</th>
                                            <th>Mobile Number</th>
                                            <th>Landline Number</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($branches as $key => $branch)
                                        <tr class="table-row">
                                            <th>{{ ++$key }}</th>
                                            <td>{{ $branch->name }}</td>
                                            <td>{{ $branch->address_line_1 }}</td>
                                            <td>{{ $branch->town_city }}</td>
                                            <td>{{ $branch->post_code }}</td>
                                            <td>{{ $branch->mobile_number }}</td>
                                            <td>{{ $branch->landline_number }}</td>
                                            <td>{{ $branch->email }}</td>
                                            <td>
                                                <a href="{{ route('edit-branches', $branch->id) }}">
                                                    <i class="fa fa-edit text-success cursor-pointer" aria-hidden="true"></i>
                                                </a>
                                                <span class="me-2"></span>
                                                <!--<i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="confirmDelete({{ $branch->id }})"></i>-->
 <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="deleteBranch({{ $branch->id }})"></i>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9">Record Not Found!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </x-content>



    </div>
   
</div>
            <!----------------------------- footer-------------------------->

<style>
.button-sticky {
    height: 60px;
    color: white;
    font-family: sans-serif;
    font-size: 15px;
    line-height: 15px;
    text-align: center;
    position: fixed !important;
    bottom: -2px;
    z-index: 999;
    width: 100%;
 
}

.home-btn:hover {
    color: orange;
}
.button-sticky .col-2 {
    margin-right: 5px; /* Adjust this value to set the desired gap */
}



</style>
<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row ">

        <div class="col-2  mt-4 ml-1">
            <a href="{{ route('payment-methods-settings') }}" class="text-white item "> Payment</a>
     
     
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('site-settings') }}" class="text-white  item "> site-settings</a>
        
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('branches-settings') }}" class="text-white  item "> Branches</a>
        </div>

        <div class="col-2 mt-4">
            <a href="{{ route('create-branches') }}" class="text-white  item ">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('services-settings') }}" class="text-white  item ">Services</a>
        </div>
    </div>
</div>
