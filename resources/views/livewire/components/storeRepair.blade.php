<div>
        <style>
        .custom-sec5 {
            display: block;
            float: left;
            width: 100%;
            padding: 0px 0px 0px 15px;
            margin-bottom: 72px;
            position: relative;
            background-color: white;
            height: 600px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.25);
        }

        .custom-sec5 .custom-container {

            max-width: 1383px;
            margin: 0 auto;
            height: 100%;
        }

        .custom-sec5-inner {
            height: 100%;
        }

        .sec5-content-box2 img {
            height: 600px;
        }

        .sec5-content-box {
            max-width: 866px;
            width: 66%;
        }

        .sec5-content-box2 {
            position: absolute;
            right: 0;
            top: 0;
            width: 34%;
        }

        .sec5-content-box {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 50px;
            align-items: center;
            height: 100%;
        }

        .sec5-content-box h3 {
            font-size: 52px;
            line-height: 60px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            letter-spacing: -1.56px;
        }

        .sec5-content-box p {
            font-size: 30px;
            line-height: 62px;
            font-weight: 400;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            letter-spacing: -0.9px;
            padding-bottom: 45px;
        }

        .sec5-content-box a {
            width: 193px;
            height: 65px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #EA1555;
            text-decoration: none;
            color: #fff !important;
            font-size: 20;
            line-height: 27.32px;
            font-weight: 600;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            border: 1px solid #EA1555;

        }

        .sec5-content-box a:hover {
            color: #EA1555 !important;
            border: 1px solid #EA1555;
            background: #fff;
            transition: 0.3s ease;
        }

        @media(max-width:1280px) {
            .custom-sec5 {
                height: 450px;

            }

            .sec5-content-box2 img {
                height: 450px;
            }

            .sec5-content-box p {
                font-size: 20px;
                line-height: 45px;
                padding-bottom: 30px;
            }
        }

        @media(max-width:1024px) {
            .custom-sec5 {
                height: 350px;

            }

            .sec5-content-box2 img {
                height: 350px;
            }
        }

        @media(max-width:991px) {
            .custom-sec5 {
                margin-bottom: 50px;
            }

            .sec5-content-box h3 {
                font-size: 35px;
                line-height: 40px;
                padding-bottom: 10px;
            }

            .sec5-content-box a {
                width: 133px;
                height: 48px;
                border-radius: 5px;
            }

            .sec5-content-box p {
                padding-bottom: 30px;
                font-size: 15px;
                line-height: 20px;
            }

            .sec5-content-box {
                gap: 30px;
            }

            .custom-sec5 {
                height: 320px;

            }

            .sec5-content-box2 img {
                height: 320px;
            }
        }

        @media(max-width:768px) {

            .custom-sec5 {
                height: 250px;
                margin-bottom: 40px;

            }

            .sec5-content-box2 img {
                height: 250px;
            }



            .sec5-content-box h3 {
                font-size: 20px;
                line-height: 20px;
                padding-bottom: 10px;
            }

            .sec5-content-box p {
                padding-bottom: 20px;
                font-size: 13px;
                line-height: 16px;
            }

            .sec5-content-box a {
                width: 105px;
                height: 25px;
                font-size: 10px;
                line-height: 13.66px;
                border-radius: 5px;
            }

        }

        @media(max-width:576px) {
            .custom-sec5 {
                padding: 0px 13px 0px 13px;
                margin-bottom: 30px;
            }

            .sec5-content-box {
                gap: 15px;
            }

            .sec5-content-box {
                max-width: 866px;
                width: 100%;

            }

            .sec5-content-box2 {
                display: none;
            }

            .sec5-content-box {
                grid-template-columns: 1fr 1.2fr;
            }

            .sec5-content-box img {
                height: 210px;
            }

    

        }
        @media(max-width:400px){
            
              .sec5-content-box {
                grid-template-columns: 1fr 1.2fr;
            } 
              .sec5-content-box img {
                height: 230px;
            }
        }
    </style>  
    <!-- custom 5  section html start-->
    <div class="custom-sec5 float-left w-100 d-block">
        <div class="custom-container">
            <div class="custom-sec5-inner">
                <div class="sec5-content-box">
                    <!-- <figure>
                        <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/storeRepair/2-37-600x600%201%20(1).png" class="img-fluid">
                    </figure> -->
                    <div class="content-box-inner">
                        <h3>Store Repair</h3>
                        <p>Most repairs are done while you wait</p>
                        <a href="{{ route('categories') }}">Book Repair</a>
                    </div>
                </div>
                <div class="sec5-content-box2">
                    <figure class="position-relative">
                        <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/storeRepair/Group%201000004416.png" alt="" class="img-fluid ms-auto d-block">
                    </figure>
                </div>
            </div>

        </div>
    </div>

</div>