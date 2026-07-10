<div>
       <!-- middle navbar-->
    <style>
        .middle-header-bar {
            padding: 20px 15px;
            
            
        }

        .custom-container {
            max-width: 1283px;
            margin: 0 auto;
        }

        .middle-header-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-middle-btns {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-middle-btns a {
            width: 140px;
            height: 50px;
            border-radius: 10px;
            border: 1px solid #000;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 15px;
            line-height: 24.59px;
            font-weight: 500;
            background: transparent;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            text-decoration: none;
        }

        .header-middle-btns a:hover {
            border: 1px solid #EA1555;
            color: #fff;
            background: #EA1555;
            transition: 0.3s ease;

        }

        @media(max-width:1200px) {
            .header-middle-btns a {
                width: 130px;
                height: 40px;
                font-size: 14px;
            }

            .header-middle-btns {
                gap: 10px;
            }
        }

        @media(max-width:991px) {

            .header-middle-btns a,
            .header-middle-btns .mobile-view-search i,
            .sidebar-toggleBtn {
                width: 40px !important;
                height: 40px;
                font-size: 14px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                color: #EA1555;
                border: 1px solid #000;
            }

            .header-middle-btns .mobile-view-search i:hover,
            .sidebar-toggleBtn:hover {
                color: #fff;
                background: #EA1555;
                border: 1px solid #EA1555;
                transition: 0.3s ease;
            }

            .header-middle-btns {
                gap: 8px;
            }

            .header-middle-btns a:nth-child(1) {
                display: none !important;
            }
        }
        
    </style>

    <div class="middle-header-bar w-100 float-left d-block">
        <div class="custom-container">
            <div class="middle-header-main">
                <!-- side bar mobile view toggle btn  -->
                <i class="fa fa-bars d-flex d-lg-none sidebar-toggleBtn"></i>

                <!-- Logo -->
                <livewire:components.logo />
                <!-- Search Bar -->
                <livewire:components.search-bar class="align-self-center d-none d-lg-block" />
                <!-- btns -->
                <div class="header-middle-btns">
                    <a href="/quotation">
                        <i class='fas fa-file-alt me-2 '></i>
                        Get a Quote
                    </a>
                    <a href="tel:02085242444">
                        <i class="fas fa-phone me-lg-2"></i><span class="d-none d-lg-block">02085242444</span>
                    </a>
                    <span class="mobile-view-search d-block d-lg-none">
                        <input class="d-none" type="text" placeholder="Search" wire:model="search">
                        <i class="fa fa-search"></i>
                    </span>

                </div>
            </div>
        </div>
    </div>
    
</div>
