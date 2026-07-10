<div>
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<style>
    .product_brand_section {
        display: block;
        width: 100%;
        margin-bottom: 70px;
        float: left;
        padding: 0px 10px;
        overflow: hidden; 
        background: #000 !important; /* ✅ changed */
    }

    .product_brand_main {
        float: left;
        width: 100%;
    }

    .brand_slider_arrow_box {
        display: flex;
        justify-content: space-between;
        height: 100%;
        align-items: center;
        position: absolute;
        top: 0px;
        left: 0px;

        width: 100%;
    }

    .brand_slider_arrow_box a.brand_pre_arrow.slick-arrow {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99;
    }

    .brand_slider_arrow_box a.brand_pre_arrow.slick-arrow i {
        color: #000;
    }


    .product_brand_list {
        float: left;
        width: 100%;
        padding: 0px 0px;
        position: relative;
    }

    .product_brand_list ul {
        margin: 0px -15px;
        padding: 0px;
    }

    .product_brand_list ul li {
        list-style: none;
        width: 25%;
        padding: 0px 15px 0px 15px;
        float: left;
        margin: 0px !important;
    }

    .product_brand_figure_box {
        float: left;
        text-align: center;
        display: flex;
        justify-content: center;
        width: 100%;
        align-items: center;

    }

    .product_brand_figure_box figure {
        width: 100%;
        height: 100%;
        margin: 0px !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product_brand_figure_box figure img {
        width: 100%;
        object-fit: cover;
        height: 100%;
        max-width: 169px;
    }

    @media (max-width: 1024px) {

        .product_brand_list {
            width: 100%;
            padding: 0px;
        }

        .product_brand_list ul {
            margin: 0px -10px;
        }

        .product_brand_list ul li {

            padding: 0px 10px 0px 10px;

        }

        .brand_slider_arrow_box a.brand_pre_arrow.slick-arrow {
            background: #FFFFFF;
            box-sizing: border-box;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.12);
            border-radius: 2px;
        }

        .product_brand_section { 
            margin-bottom: 50px;
        }

    }

    @media(max-width: 768px) {
        .product_brand_section { 
            margin-bottom: 40px;
        }
    }

    @media (max-width: 548px) {
        .product_brand_section { 
            margin-bottom: 30px;
        }
    }
    @media (max-width: 576px) {
    html, body {
        overflow-x: hidden;
        background-color: black;
    }
</style>
<section class="product_brand_section">
    <div class="product_brand_main">
        <div class="product_brand_list">
            <div class="brand_slider_arrow_box"></div>
            <ul class="product_brand_slider">
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/xw77qbzn7/House%20of%20gadgets%20/Apple.png?updatedAt=1759986067319" />
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/xw77qbzn7/House%20of%20gadgets%20/3.png?updatedAt=1759909643753" />
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/xw77qbzn7/House%20of%20gadgets%20/Apple%20(1).png?updatedAt=1759986067276" />
                        </figure>
                    </div>
                </li>
                <li>
                    <div class="product_brand_figure_box">
                        <figure><img class="lazy"
                                src="https://ik.imagekit.io/xw77qbzn7/House%20of%20gadgets%20/2.png?updatedAt=1759909643780" />
                        </figure>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Slick JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function () {
        $(".product_brand_slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            centerMode: true,
            centerPadding: '0px',
            arrows: false,
            appendArrows: $('.brand_slider_arrow_box'),
            nextArrow: '<a class="brand_pre_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></a>',
            prevArrow: '<a class="brand_pre_arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></a>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        dots: false,
                        arrows: false,
                        centerPadding: '60px',
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        dots: false,
                        arrows: false,
                        centerPadding: '40px',
                    },
                },
                {
                    breakpoint: 540,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        dots: false,
                        arrows: false,
                        centerPadding: '40px',
                    },
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1500,
                        dots: false,
                        arrows: false,
                    },
                },
            ],
        });
    });


</script>
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/Home_page_sections/brandSectionSider.blade.php ENDPATH**/ ?>