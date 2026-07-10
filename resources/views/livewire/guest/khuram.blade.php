<div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Bootstrap Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <div>
        <!-- --------------------------top bar----------------- -->
        <livewire:components.top-bar />
        <!-- --------------------navbar--------------------- -->
        <div>
        <livewire:components.mega-nav />
        </div>
        <!-- --------------search filter-------- -->
<br/><br/>
        <div class="container ">
            
            <div class="row">
                <div class="d-flex my-3 align-items-center justify-content-center  ">

                    <div class="col-lg-6 col-md-4">
                        <form class="d-flex " role="search">
                            <div class="wrapper">
                                <div class="search_box g-0">
                                    <div class="d-flex gap-2 ">
                                       <div class="dropdown">
    <div class="custom-select-container">
        <select class="form-control dropdown-toggle categories-k custom-border-select bg-danger w-75 text-white fs-5 custom-select" wire:model="selectedCategoryId" data-toggle="dropdown" style="margin-left: 58px; text-align: center; line-height: 39px;">
            <option class="text-center font-weight-bold bg-white text-black" value="All">
         <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    All  <span class="iconify" data-icon="bi:chevron-down"></span>
</button>


            </option>
            <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Case
            </option>
             <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Screen Protector
            </option> <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Car Phone Holders
            </option> <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Chargers & Cable
            </option> <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Wireless Charging 
            </option> <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Smart Watch
            </option> <option value="" class="bg-white text-black">
                <span class="iconify" data-icon="bi:exclamation-diamond-fill" style="margin-right: 5px;"></span> Kids Tech
            </option>
        </select>
    </div>
</div>

                                  <!--<div class="search_field">-->
  <div style="position: relative; display: inline-block;">
     <input type="text" class="form-control " placeholder="Search" wire:model.debounce.500="search" style="width: 500px;margin-:-3px;height: 51px;">
    <img src="https://icons.veryicon.com/png/o/miscellaneous/prototyping-tool/search-bar-01.png" width="30" height="30" alt="Search Icon" style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%);">
</div>



    <img class="bi" src="" alt="">
<!--</div>-->


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
        {{-- devices --}}
        <div class="d-flex flex-wrap justify-content-center mb-4">
       
         
          
            <!--<div>Not Found !</div>-->
       
        </div>



        <section class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end">
                        <a class="text-primary cursor-pointer" wire:click="clearFilter">Clear Filter</a>
                    </div>
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Categories </h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Case 
                                </label> <br/>
                                <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Screen Protector 

                                </label> </label> <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                     Car Phone Holders

                                </label> </label> <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Chargers & Cable

                                </label> </label> <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Wireless Charging
                                </label> </label> <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Spare Parts

                                </label> </label><br/> <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Smart Watch

                                </label> </label><br/>
                                <input class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">
                                    Kids Tech
                                
                            </div>
                            <!--<div class="form-check">-->
                            <!--    <input class="form-check-input" type="radio" name="category" value="" wire:model="selectedCategoryId">-->
                            <!--    <label class="form-check-label">-->
                            <!--    All-->
                            <!--    </label>-->
                            <!--</div>-->


                        </div>
                    </div>
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Kind</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="device" value="" wire:click="')">
                                <label class="form-check-label">
                                   Samsung Cases(8)
                                </label><br/>
                                <input class="form-check-input" type="radio" name="device" value="" wire:click="')">
                                <label class="form-check-label">
                                   Samsung Cases(12)
                                </label><br/>
                                <input class="form-check-input" type="radio" name="device" value="" wire:click="')">
                                <label class="form-check-label">
                                   Iphone Cases(49)
                                </label><br/>
                                <input class="form-check-input" type="radio" name="device" value="" wire:click="')">
                                <label class="form-check-label">
                                   Ipad Cases(89)
                                </label><br/>
                                <input class="form-check-input" type="radio" name="device" value="" wire:click="')">
                                <label class="form-check-label">
                                   Google Pixel Cases(32)
                                </label><br/>
                                <input class="form-check-input" type="radio" name="device" value="" wire:click="')">
                                <label class="form-check-label">
                                   Sony Xperia  Cases(28)
                                </label><br/>
                            </div>
                        </div>
                        <!--<div>Not Found !</div>-->
                    </div>

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Type</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Galaxy
S23 Ultra(8)
                                </label>
                            </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Galaxy
S23 Plus(4)
                                </label>
                            </div>  <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Galaxy
S23(9)
                                </label>
                            </div>  <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Galaxy Z
Fold5(10)
                                </label>
                            </div>  <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Galaxy Z
Flip5(41)
                                </label>
                            </div>  <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Galaxy
A54 5G(75)
                                </label>
                            </div>


                        </div>
                    </div>
                    
                    
                        <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Varient</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Show All (82)
                                </label>
                            </div>
   <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Bumper Cases (5)
                                </label>
                            </div>   <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Carbon Cases (2)
                                </label>
                            </div>   <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Card Slot Cases (4)
                                </label>
                            </div>   <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                             Clear Cases (11)
                                </label>
                            </div>   <div class="form-check">
                                <input class="form-check-input" type="radio" name="memory_size" value="" wire:click="')">
                                <label class="form-check-label">
                                Designer Cases (6)
                                </label>
                            </div>

                        </div>
                    </div>
                    
                    
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Manufacturer</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="grade" value="" wire:click="">
                                <label class="form-check-label">
                                    Baseus 
                                </label><br/>
                                 <input class="form-check-input" type="radio" name="grade" value="" wire:click="">
                                <label class="form-check-label">
                                    Huawei 
                                </label><br/>
                                 <input class="form-check-input" type="radio" name="grade" value="" wire:click="">
                                <label class="form-check-label">
                                    iOttie
                                </label><br/>
                                 <input class="form-check-input" type="radio" name="grade" value="" wire:click="">
                                <label class="form-check-label">
                                    Mophie 
                                </label><br/>
                                 <input class="form-check-input" type="radio" name="grade" value="" wire:click="">
                                <label class="form-check-label">
                                    Olixar 
                                </label><br/>
                                 <input class="form-check-input" type="radio" name="grade" value="" wire:click="">
                                <label class="form-check-label">
                                    Pama 
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- ---------------Color-------- -->

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Color</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input  class="form-check-input" type="radio" name="color" value="" wire:click="">
                                <label class="form-check-label">
                                    Black
                                </label><br/>
                                <input  class="form-check-input" type="radio" name="color" value="" wire:click="">
                                <label class="form-check-label">
                                    White
                                </label><br/>
                                <input  class="form-check-input" type="radio" name="color" value="" wire:click="">
                                <label class="form-check-label">
                                    RED
                                </label><br/>
                                <input  class="form-check-input" type="radio" name="color" value="" wire:click="">
                                <label class="form-check-label">
                                    GREEN
                                </label><br/>
                                <input  class="form-check-input" type="radio" name="color" value="" wire:click="">
                                <label class="form-check-label">
                                    YELLOW
                                </label>
                            </div>


                        </div>
                    </div>
                    <!-- -------------------------price----------- -->
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> PRICE</h3><br/>
                         <div class="d-flex">
        <div class="wrapper">
          <header>
            <!--<h2>Price Range</h2>-->
            <!--<p>Use slider or enter min and max price</p>-->
          </header>
       
          <div class="slider">
            <div class="progress"></div>
          </div>
          <div class="range-input">
            <input type="range" class="range-min" style="border: 0px solid white !important;" min="0" max="10000" value="0" step="100">
            <input type="range" class="range-max " style="border: 0px solid white !important;" min="0" max="10000" value="9800" step="100">
          </div>
             <div class="price-input">
            <div class="field">
              <span>Min</span>
              <input type="number" class="input-min" value="0">
            </div>
            <div class="separator">-</div>
            <div class="field">
              <span>Max</span>
              <input type="number" class="input-max" value="50">
            </div>
          </div>
        </div>
    
       
      </div>
                    </div>

    <!-- ---------------Color-------- -->

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2">  Ratings & Reviews</h3>
                        <div class="p-2">
                            
                              
      <!-- <ul class="list-unstyled d-flex justify-content-center mb-0 fs-2">-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--</ul>-->
                            
                            
      <!--                          <ul class="list-unstyled d-flex justify-content-center mb-0 fs-2">-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--  <li>-->
      <!--    <i class="fas fa-star-half-alt fa-sm text-warning"></i>-->
      <!--  </li>-->
      <!--</ul>-->
      
      <ul class="list-unstyled d-flex justify-content-center mb-0 fs-2">
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li>
          <i class="fas fa-star fa-sm text-warning"></i>
        </li>
        <li style="display: flex; align-items: center;">
          <i class="far fa-star fa-sm text-warning"></i>
<span style="color: black; font-size:20px">&up</span>

        </li>
      </ul>
      
   


                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9 mt-4">
                     <div class="row">
                         <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/1.jpg?updatedAt=1705345228635" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Olixar Black Case with Card Slot - For Samsung Galaxy S24</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£19.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£19.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
  10 In Stock
</p>
</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                         
                          <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/1.jpg?updatedAt=1705411179251" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Olixar ExoShield MagSafe Clear Case - For Samsung Galaxy S23 FE</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£16.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£23.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>
</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                          <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/2.jpg?updatedAt=1705411320873" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Ringke Fusion Matte Clear Case - For Samsung Galaxy S23 FE</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£18.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£26.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
  10 In Stock
</p>
</div>          </div>
                        </a>
                    </div>
                         </div>
                     </div>
                     
                     
                     <!-------------------------secont--------------------->
                      <div class="row pt-3">
                         <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/3.jpg?updatedAt=1705411469922" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Olixar Black Leather-Style Stand Case with Apple Pencil Slot - For iPad Pro 12.9" 2021</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£16.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£20.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                         
                          <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/4.jpg?updatedAt=1705411545562" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Ringke Fusion X iPad Pro 11" 2021 3rd Gen. Protective Case - Black</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£19.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£19.99</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  5 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                          <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/5.jpg?updatedAt=1705411668425" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Whitestone Dome EZ Screen Protectors 3 Pack - For Samsung Galaxy S23</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£17.99/</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£24.99</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                     </div>
                        
                     <!-------------------------secont--------------------->
                      <div class="row pt-3">
                         <div class="col-lg-4">
                                <a href="{{ route('checkout') }}">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/6.jpg?updatedAt=1705411778868" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Olixar Universal Headrest Tablet Mount 7-10 inch - For Nintendo Switch, iPad, Android And Windows Tablets</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£12.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;"> £14.99</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  3 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/7.jpg?updatedAt=1705411871704" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Spigen OneTap 12W Air Vent Wireless Car Charger & Mount</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£42.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£27.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/8.jpg?updatedAt=1705411958517" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>SuperTooth Buddy Bluetooth Hands-free Visor Car Kit</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£54.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£58.99</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                     </div>
                     
                        
                     <!-------------------------secont--------------------->
                      <div class="row pt-3">
                         <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/9.jpg?updatedAt=1705412039272" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Official Samsung Adaptive Fast Charger - Micro USB</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£19.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£20.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/10.jpg?updatedAt=1705412134521" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Official Samsung Trio 65W Charger with 2 USB-C and 1 USB-A Port</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£39.99/</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£64.99 </p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/12.jpg?updatedAt=1705412354776" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Official Samsung Graphite Sports Band (S/M) - For Samsung Galaxy Watch 6 Classic</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" > £39.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£43.99</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                     </div>
                     
                     
                     
                     
                     
                        
                     <!-------------------------secont--------------------->
                      <div class="row pt-3">
                         <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/13.jpg?updatedAt=1705412462994" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Araree Nukin Samsung Galaxy Watch 4 44mm Bezel Protector- Clear</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£5.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£9.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/14.jpg?updatedAt=1705412830180" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Spigen Rugged Armor Black Case - For Sony Xperia 10 IV</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£19.99/</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£20.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/15.jpg?updatedAt=1705412996306" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Olixar Sentinel iPhone 11 Pro Case & Glass Screen Protector - Black</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£9.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£12.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                     </div>
                     
                     
                     
                         <!-------------------------4kkd--------------------->
                      <div class="row pt-3">
                         <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/16.jpg?updatedAt=1705413080418" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>re accessories for iPhone 12 Pro Max:

Select Another Category
Maxlife 3687 mAh Replacement Battery - For iPhone 12 Pro Max</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£29.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£31.99.</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/17.jpg?updatedAt=1705413211943" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Scosche Universal Hands-Free Bluetooth Car Kit With 2 USB Charging Ports</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£29.99/</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;">£51.99</p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                         
                          <div class="col-lg-4">
                                <a href="">
                            <div class="card pt-1 align-items-center justify-content-center text-center">
                                <img src="https://ik.imagekit.io/b6iqka2sz/assets/18.jpg?updatedAt=1705413352819" class="img-fluid p-3" style="height:172px;width:172px" />
                                <div class="card-body" >
                                   <p>Olixar 3m USB to Lightning Charging Cable - For iPhones & iPads
</p>
      <div class="" style="display: flex; ">
  <p class="fs-5" >£9.99 /</p>
  <p class="text-decoration-line-through fs-5" style="margin-left: 10px;"> £14.99 </p>
</div>
    <div class="" style="display: flex; ">
<p>
  <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" 
       width="30"/>
     
  10 In Stock
</p>

</div>          </div>
                        </a>
                    </div>
                         </div>
                     </div>
                     
                     
                     
                </div>
            
               
               
              

            </div>

        </section>




    </div>
    <!--<section class="sabscrib ">-->
    <!--    <div class="container d-flex flex-wrap  justify-content-between align-items-center ">-->
    <!--        <div class="left">-->
    <!--            <h2>Join Our Newsletter Now</h2>-->
    <!--            <p>Register now to get updates</p>-->
    <!--        </div>-->
    <!--        <div class="right">-->
    <!--            <input type="text" placeholder="Enter your email address" class="form-control">-->
    <!--            <button>SUBSCRIBE</button>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
<style>
    .sabscrib {
        background-color: dark; /* Optional: Add background color */
        padding: 20px; /* Optional: Add padding for better spacing */
    }

    .container {
        
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .left {
        flex: 1; /* Allow the left section to grow and take available space */
    }

    .right {
        flex: 1; /* Allow the right section to grow and take available space */
        display: flex;
        flex-direction: column;
        align-items: flex-end; /* Align items to the end (right) */
        margin-top: 10px; /* Optional: Add margin for better spacing */
    }

    @media (max-width: 768px) {
        /* Adjust layout for screens 768 pixels and smaller */
        .container {
            flex-direction: column; /* Stack the sections vertically on smaller screens */
        }

        .right {
            align-items: flex-start; /* Align items to the start (left) on smaller screens */
            margin-top: 0; /* Reset margin on smaller screens */
            
            
        }
    }
</style>

<section class="sabscrib">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="left">
            <h2>Join Our Newsletter Now</h2>
            <p>Register now to get updates</p>
        </div>
        <div class="right">
            <input type="text" placeholder="Enter your email address" class="form-control">
            <button class="">SUBSCRIBE</button>
        </div>
    </div>
</section>









</div>
<style>
    .kh {
        font-weight: 900 !important;
    }
</style>
<style>
    @media (max-width: 767px) {
        h2.text-sm {
            font-size: 14px !important; /* Adjust the font size as needed */
        }
   .card {
    min-width: 113px;
}
.img-fluid {
    max-width: 110% !important;
    /*height: 20vh !important;*/
}

    }
</style>
     <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
  });
});

      </script>
      <style>
    /* Import Google Font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");


/*.wrapper {*/
/*  width: 400px;*/
/*  background: #fff;*/
/*  border-radius: 10px;*/
/*  padding: 20px 25px 40px;*/
/*  box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);*/
/*}*/
header h2 {
  font-size: 24px;
  font-weight: 600;
}
header p {
  margin-top: 5px;
  font-size: 16px;
}
.price-input {
  width: 100%;
  display: flex;
  margin: 30px 0 35px;
}
.price-input .field {
  display: flex;
  width: 100%;
  height: 45px;
  align-items: center;
}
.field input {
  width: 100%;
  height: 100%;
  outline: none;
  font-size: 19px;
  margin-left: 12px;
  border-radius: 5px;
  text-align: center;
  border: 1px solid #999;
  -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
.price-input .separator {
  width: 130px;
  display: flex;
  font-size: 19px;
  align-items: center;
  justify-content: center;
}
.slider {
  height: 14px;
  position: relative;
  background: #ddd;
  border-radius: 5px;
}
.slider .progress {
  height: 100%;
  left: 0%;
  right: 5%;
  position: absolute;
  border-radius: 5px;
  background: #17a2b8;
}
.range-input {
  position: relative;
}
.range-input input {
  position: absolute;
  width: 100%;
  height: 5px;
  top: -5px;
  background: none;
  pointer-events: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}
input[type="range"]::-webkit-slider-thumb {
  height: 17px;
  width: 17px;
  border-radius: 50%;
  background: #17a2b8;
  pointer-events: auto;
  -webkit-appearance: none;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}
input[type="range"]::-moz-range-thumb {
  height: 17px;
  width: 17px;
  border: none;
  border-radius: 50%;
  background: #17a2b8;
  pointer-events: auto;
  -moz-appearance: none;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
}

/* Support */
.support-box {
  top: 2rem;
  position: relative;
  bottom: 0;
  text-align: center;
  display: block;
}
/*input {*/
/*    padding: 8px 10px!important;*/
/*     border: 0px solid white !important; */
/*    border-radius: 5px;*/
/*    width: 100%;*/
/*}*/
.b-btn {
  color: white;
  text-decoration: none;
  font-weight: bold;
}
.b-btn.paypal i {
  color: blue;
}
.b-btn:hover {
  text-decoration: none;
  font-weight: bold;
}
.b-btn i {
  font-size: 20px;
  color: yellow;
  margin-top: 2rem;
}

</style>