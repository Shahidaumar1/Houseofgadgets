@php
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Category;
use App\Models\Branch;
$args = 'Publish';
$branches = Branch::all();
@endphp



<div>
          


<div class="d-none d-lg-block d-md-block">
    <nav class="meganav old py-3  ">
        <div class="logo">
            <a href="/">
                <img  src="{{ asset($siteSettings->logo ?? 'logo/logo.png') }}"
        class="img-fluid " style=" width:135px;padding-top:10px;">
            </a>
        </div>
      
        <ul class="nav-links pt-3 d-flex justify-content-center mx-auto ">
            <!-- Sell Service Menu -->
            @if ($formStatuses->sell)
                <li class="dropdown">
                    <a class="text-dark fw-bolder" href="#">Sell Your Device <b class="separator"> | </b></a>
                    <div class="mega-menu">
                        
                          @php
                $limitedCategories = collect($sellCategories)->take(3); // Limit to 3 categories
            @endphp
                        
                          @foreach($limitedCategories as $categoryId => $category)
                            <div class="menu-column">
                                <p>
                                    <a href="{{ route('guest-sell-models', ['device' => $categoryId]) }}" class="fw-bolder">
                                        {{ $category['name'] }}
                                    </a>
                                </p>
                                @php
                                    $items = collect($category['items'])->take(5); // Limit to 5 items
                                @endphp
                                @foreach($items as $item)
                                    <a href="{{ route('guest-sell-model-detail', ['model' => $item->id]) }}" style="font-size:16px !important ;">
                                        {{ $item->name }} 
                                    </a>
                                @endforeach
                                @if (count($category['items']) > 5)
                                    <a href="{{ route('guest-sell-models', ['device' => $categoryId]) }}" class="btn text-dark fw-bolder" style="margin-left:-10px !important;font-size: 16px; text-align: left; color: #db3444 !important; ">
                                        See More
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </li>
            @endif
            
            <!-- Buy Service Menu -->
            @if ($formStatuses->buy)
                <li class="dropdown">
                    <a class="text-dark fw-bolder" href="#">Buy A Device <b class="separator"> | </b></a>
                    <div class="mega-menu">
                        @php
                $limitedCategories = collect($sellCategories)->take(3); // Limit to 3 categories
            @endphp
                        
                          @foreach($limitedCategories as $categoryId => $category)
                            <div class="menu-column">
                                <p>
                                    <a href="{{ route('guest-buy-products', ['device' => $categoryId]) }}" class="fw-bolder">
                                        {{ $category['name'] }}
                                    </a>
                                </p>
                                @php
                                    $items = collect($category['items'])->take(5); // Limit to 5 items
                                @endphp
                                @foreach($items as $item)
                                    <a href="{{ route('guest-buy-product-specs', ['model' => $item->id]) }}"style="font-size:16px !important ;">
                                        {{ $item->name }}
                                    </a>
                                @endforeach
                                @if (count($category['items']) > 5)
                                    <a href="{{ route('guest-buy-products', ['device' => $categoryId]) }}" class="btn text-dark fw-bolder" style="margin-left:-10px !important;font-size: 16px; text-align: left; color: #db3444 !important; ">
                                        See More
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </li>
            @endif 
            
            <!-- Repair Service Menu -->
            @if ($formStatuses->repair)
                <li class="dropdown">
                    <a class="text-dark fw-bolder" href="#">Book A Repair <b class="separator"> | </b></a>
                    <div class="mega-menu">
                        @php
                $limitedCategories = collect($sellCategories)->take(3); // Limit to 3 categories
            @endphp
                        
                          @foreach($limitedCategories as $categoryId => $category)
                            <div class="menu-column">
                                <p>
                                    <a href="{{ route('modals', ['device' => $categoryId]) }}"  class="fw-bolder">
                                        {{ $category['name'] }}
                                    </a>
                                </p>
                                @php
                                    $items = collect($category['items'])->take(5); // Limit to 5 items
                                @endphp
                                @foreach($items as $item)
                                    <a href="{{ route('repair-types', ['device' => $categoryId, 'modal' => $item->id]) }}"style="font-size:16px !important ;">
                                        {{ $item->name }}
                                    </a>
                                @endforeach
                                @if (count($category['items']) > 5)
                                    <a href="{{ route('modals', ['device' => $categoryId]) }}" class="btn text-dark fw-bolder" style="margin-left:-10px !important;font-size: 16px; text-align: left; color: #db3444 !important; ">
                                        See More
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </li>
            @endif 
            
            <!--Others -->
            
   <li>
    <a class="text-dark fw-bolder" href="{{ route('aboutus') }}">About Us</a> <!-- Link to the About Us Livewire component -->
</li>
        </ul>
        
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle dropdown click event
        $('.dropdown > a').click(function(e) {
            e.preventDefault();
            let $dropdown = $(this).next('.mega-menu');  // The dropdown content
            $('.mega-menu').not($dropdown).slideUp();    // Close other dropdowns
            $dropdown.slideToggle();                     // Toggle the clicked dropdown
            e.stopPropagation();                         // Prevent click propagation to document
        });

        // Click event to close dropdown if clicked outside
        $(document).click(function() {
            $('.mega-menu').slideUp(); // Close all dropdowns when clicking outside
        });

        // Stop the click inside the dropdown from closing it
        $('.mega-menu').click(function(e) {
            e.stopPropagation(); // Stop propagation so that clicking inside doesn't close the dropdown
        });

        // Prevent the menu from closing when scrolling
      
    });
</script>


<style>

.old{
    opacity:80%;
}

  .separator {
            color: #db3444;
            
        }
    .meganav {
        display: flex;

        align-items: center;
        
        background-color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .logo a {
        font-size: 26px;
        font-weight: bold;
        color: #f5a623;
        text-decoration: none;
        letter-spacing: 2px;
        transition: color 0.3s ease;
        padding-left:80px;
    }

    .logo a:hover {
        color: #fff;
        
    }

    .nav-links {
        display: flex;
        list-style: none;
         
        text-align:center;
    }

    .nav-links li {
        margin-left:50px;
        justify-content:center;
    }

    .nav-links li a {
        color: black;
        text-decoration: none;
        font-size: 18px;
        font-weight: 500;
    
        transition: color 0.3s ease;
    }

    .nav-links li a:hover {
        color: #f5a623;
    }

    .nav-links li:hover .mega-menu {
        display: flex;
        opacity: 1;
        transform: translateY(0);
        transition: all 0.4s ease-in-out;
    }

    .mega-menu {
        position:absolute;
    
   
        background-color: #fff;
        width: 110vh;
        padding-top:30px;
        padding-bottom:30px;
        /*padding-left:30px;*/
        /*padding-right:30px;*/
        display: none;
        justify-content: space-around;
       
        border-radius: 20px;
   
        opacity: 80%;
        transform: translateY(10px);
        transition: all 0.3s ease;
    z-index:99999999999;
        
    }

    .menu-column {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-left:30px;
    }

    .menu-column p {
 
      color: #db3444;
        transition: color 0.3s ease;
        text-align:left;
    
    }

    .menu-column p a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
        
    }

    .menu-column p a:hover {
        color: #f5a623;
    }

    .menu-column a {
        color: #555;
        text-decoration: none;
        font-size:6px;
        margin-bottom: 8px;
        transition: color 0.3s ease;
        text-align:left;
    }

    .menu-column a:hover {
        color: #f5a623;
    }

     Responsive Styling 
    @media (max-width: 768px) {
        .meganav {
            padding: 15px 30px;
            flex-direction: column;
        }

        .nav-links {
            flex-direction: column;
            margin-right: 0;
        }

        .nav-links li {
            margin: 10px 0;
        }

        .mega-menu {
            width: 100%;
            padding: 20px;
            border-radius: 0;
        }

        .menu-column {
            flex: 1;
        }
    }
    
</style>


</div>