 <nav class=" px-3" style=" background-color: transparent;">
     <div class="d-flex justify-content-between align-items-center ">
         <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true" onclick="toggleLeftDrawer()"></i>

         <div class="d-none d-md-flex align-items-center admin-top-items">
             <div>
                 <a href="{{ route('accessories-categories') }}"  class=" item p-3 {{ $active == 'categories' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Brands</a>
             </div>
             <div>
                 <a href="{{ route('accessories-devices') }}"  class=" item p-3 {{ $active == 'categories' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Models</a>
             </div>

             <div>
                 <a href="{{ route('accessories-models') }}"  class=" item p-3 {{ $active == 'categories' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Accessories</a>
             </div>
             <div>
                 <a href="{{ route('accessories-models-add-ons') }}"  class=" item p-3 {{ $active == 'categories' ? 'text-danger fw-bold p-3' : '' }}" style="background-color: transparent;">Variations</a>
             </div>

         </div>

         <livewire:components.avatar />
     </div>

 </nav>
 