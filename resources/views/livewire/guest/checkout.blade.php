<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .top-bar {
            height: 40px;
            background-color: black;
            padding: 0 10px;
            color: white;
        }

        .left-text,
        .right-text {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-item.nav-link.active-link {
            border-bottom: 2px solid red !important;
        }

        .button-width {
            min-width: 150px;
        }

        .star-container {
            color: gold;
        }
    </style>

    <title>Checkout Page</title>
</head>

<body>
    <!-- Only include the header and navigation once here-->
    
    <livewire:components.top-bar />
    <livewire:components.mega-nav />
    <!-- Main Content Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Product Image Section -->
                <div class="card d-flex flex-column text-center">
                    <img class="card-img-top img-fluid" src="https://ik.imagekit.io/b6iqka2sz/assets/1.jpg?updatedAt=1705411179251" alt="Card image cap">
                </div>
            </div>

            <div class="col-md-6">
                <h2>LoveCases Cherry Blossom Case - For Samsung Galaxy S24</h2>
                <p>The Galaxy A23 5G features a 6.6-inch Infinity display with a resolution of 1080 x 2408 pixels and a 20:9 aspect ratio. Equipped with Corning Gorilla Glass 5 for protection and a multi-lens camera system, including a 50MP main camera with OIS (Optical Image Stabilization).</p>

                <div class="row mt-3">
                    <div class="col-3">
                        <button class="btn btn-danger btn-lg button-width">Checkout</button>
                    </div>
                </div>

                <p style="color: black;">More Color</p>
                <div class="card-deck">
                    <div class="card d-flex flex-column text-center">
                        <img class="card-img-top img-fluid" src="https://ik.imagekit.io/b6iqka2sz/assets/1.jpg?updatedAt=1705411179251" alt="Card image cap">
                        <span class="mt-auto">White</span>
                    </div>

                    <div class="card d-flex flex-column text-center">
                        <img class="card-img-top img-fluid" src="https://ik.imagekit.io/b6iqka2sz/assets/19.jpg?updatedAt=1705429904488" alt="Card image cap">
                        <span class="mt-auto">Black</span>
                    </div>

                    <div class="card d-flex flex-column text-center">
                        <img class="card-img-top img-fluid" src="https://ik.imagekit.io/b6iqka2sz/assets/20.jpg?updatedAt=1705430076134" alt="Card image cap">
                        <span class="mt-auto">Pink</span>
                    </div>

                    <div class="card d-flex flex-column text-center">
                        <img class="card-img-top img-fluid" src="https://ik.imagekit.io/b6iqka2sz/assets/21.jpg?updatedAt=1705430166954" alt="Card image cap">
                        <span class="mt-auto">Blue</span>
                    </div>
                </div>

                <br/>
                <div class="card d-flex flex-column text-center" style="width: 120px;">
                    <img class="card-img-top img-fluid" src="https://ik.imagekit.io/b6iqka2sz/assets/1.jpg?updatedAt=1705411179251" width="50px" alt="Card image cap">
                    <span class="mt-auto">White</span>
                </div>

                <br/>
                <p style="color: rgb(42, 109, 159); font-size: 15px;">Write a review</p>
                <p class="fs-5 mb-0">Price: <span style="color: black; font-size: 20px;">£11.99</span></p>
                <p>
                    <img src="https://img.freepik.com/premium-vector/green-check-mark-icon-symbol-logo-circle-tick-symbol-green-color-vector-illustration_685751-503.jpg?w=360" width="30" />
                    10 In Stock
                </p>

                <div class="col-3" style="margin-left: 120px;">
                    <button class="btn btn-danger btn-lg button-width">ADD TO BASKET</button>
                </div>
            </div>
        </div>

        <!-- Tabs for Overview, Q&A, Delivery & Returns -->
        <nav>
            <div class="nav nav-tabs text-dark" id="nav-tab" role="tablist">
                <button class="nav-link active text-dark" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Overview</button>
                <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Questions & Answers</button>
                <button class="nav-link text-dark" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Delivery & Returns</button>
            </div>
        </nav>
        <div class="tab-content mt-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h3 class="fw-bolder">Key Features</h3>
                <ul>
                    <li>Ultra-thin, flexible and lightweight</li>
                    <li>Transparent case with a unique LoveCases design</li>
                    <li>Raised bezels</li>
                    <li>Non-slip coating</li>
                    <li>Access all your Samsung Galaxy S24's features and ports</li>
                    <li>Wireless charging compatible</li>
                </ul>
                <h3 class="fw-bolder">Description</h3>
                <p>Have your Samsung Galaxy S24 looking cute, while also being protected from life's little accidents with this beautiful case from LoveCases.</p>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <h3 class="fw-bolder">Questions & Answers</h3>
                <p>Coming soon...</p>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <h3 class="fw-bolder">Delivery & Returns</h3>
                <p>All product stock messages are up to date and as accurate as possible. Delivery times quoted at checkout are accurate.</p>
                <h3 class="fw-bolder">Delivery Methods</h3>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
