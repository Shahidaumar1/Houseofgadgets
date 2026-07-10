<div>

    <section class="repair-types ">
        <livewire:components.top-bar />
        <livewire:components.mega-nav theme="white" />
        <div class="bg-color">
            <div class="container-fluid">

                <div class="text-center py-5 w-75 mx-auto">
                    <h2 class="text-danger">About Us</h2>

                </div>
                <div class="card border-0 about-fone-card my-3">
                    {{-- <h3>About Us</h3> --}}
                    {{-- <hr> --}}
                    <p class="lh-lg" style="text-align: justify; ">
                        Your Trusted Mobile Phone Partner in the UK
                        Welcome to <strong>{{$siteSettings->buisness_name}}</strong>, where innovation meets reliability in the world of mobile phones. As one
                        of the largest mobile phone operators in the United Kingdom, <strong>{{$siteSettings->buisness_name}}</strong> has been at the
                        forefront of providing comprehensive services, including buying, selling, and repairing mobile
                        devices. With a commitment to quality and customer satisfaction, we have emerged as a trusted
                        name in the industry, catering to the diverse needs of our valued customers.
                        <br>
                        <span style= "font-size:25px; font-weight:bolder;">Our journey</span><br>
                        <strong>{{$siteSettings->buisness_name}}</strong> embarked on its journey with a vision to revolutionize the mobile phone retail
                        landscape in the UK. Established with a passion for technology and a commitment to offering
                        exceptional services, we have grown to become a key player in the mobile phone industry. Our
                        journey is marked by a relentless pursuit of excellence, customer-centric approach, and a focus
                        on staying ahead of the technological curve.<br>

                        <span style= "font-size:25px; font-weight:bolder;">Comprehensive Services</span><br>


                        <span style= "font-size:25px; font-weight:bolder;">1.Buy:</span><br>

                        At <strong>{{$siteSettings->buisness_name}}</strong>, we understand that your mobile device is not just a gadget; it's an essential
                        part of your daily life. Whether you are looking to upgrade to the latest model or sell your
                        current device, we offer a seamless buying and selling experience. Our extensive range of new
                        and pre-owned mobile phones ensures that you find the perfect device that suits your needs and
                        budget.
                        <br>
                        <span style= "font-size:25px; font-weight:bolder;">2. Sell:</span><br>
                        Looking to upgrade to the latest smartphone or simply want to part ways with your current
                        device? <strong>{{$siteSettings->buisness_name}}</strong> provides a hassle-free selling experience. We offer competitive prices for
                        your used mobile phones, ensuring that you get the best value for your device. Our transparent
                        and fair evaluation process has made us a preferred choice for those looking to sell their
                        mobile phones.<br>


                        <span style= "font-size:25px; font-weight:bolder;">3. Repair:</span><br>
                        We understand the frustration of a broken or malfunctioning mobile phone. <strong>{{$siteSettings->buisness_name}}</strong> is your
                        go-to destination for reliable and prompt mobile phone repairs. Our skilled technicians are
                        well-equipped to handle a wide range of issues, from screen replacements to battery repairs.
                        With a commitment to quality repairs and genuine spare parts, we ensure that your device is in
                        safe hands.<br>

                        <span style= "font-size:29px; font-weight:bolder;">The <strong>{{$siteSettings->buisness_name}}</strong> Advantage
                        </span><br>

                        <span style= "font-size:25px; font-weight:bolder;">1. Expertise:
                        </span><br>

                        Our team of experts at <strong>{{$siteSettings->buisness_name}}</strong> possesses extensive knowledge and expertise in the mobile
                        phone industry. From the latest technological trends to in-depth understanding of device
                        functionalities, we are equipped to provide accurate information and solutions to our
                        customers.<br>

                        <span style= "font-size:25px; font-weight:bolder;">2. Wide Network:
                        </span><br>

                        With multiple stores across the UK, <strong>{{$siteSettings->buisness_name}}</strong> has built a wide network to cater to the diverse
                        needs of customers. Whether you're in the heart of London or a smaller town, our presence
                        ensures accessibility and convenience for all.
                        <br>

                        <span style= "font-size:25px; font-weight:bolder;">3. Quality Assurance:


                        </span><br>


                        Quality is at the core of everything we do at <strong>{{$siteSettings->buisness_name}}</strong>. Whether it's selling new devices,
                        pre-owned phones, or repairing a malfunctioning device, we prioritize quality assurance. Our
                        commitment to using genuine spare parts and employing skilled technicians sets us apart in the
                        industry.
                        <br>


                        <span style= "font-size:25px; font-weight:bolder;">4. Customer-Centric Approach:


                        </span><br>

                        Our customers are at the center of our business. We strive to understand their needs, provide
                        personalized solutions, and ensure a positive and satisfying experience. Our customer-centric
                        approach has earned us the trust and loyalty of a growing customer base.
                        <br>


                        <span style= "font-size:25px; font-weight:bolder;">Community Engagement

                        </span><br>

                        At <strong>{{$siteSettings->buisness_name}}</strong>, we believe in giving back to the community that has supported us throughout our
                        journey. We actively engage in community initiatives, supporting local causes and contributing
                        to the well-being of the communities we serve. Our commitment goes beyond being just a mobile
                        phone retailer; we aim to make a positive impact on society.
                        <br>

                        <span style= "font-size:25px; font-weight:bolder;">Embracing Sustainability

                        </span><br>

                        As a responsible business, <strong>{{$siteSettings->buisness_name}}</strong> is committed to environmental sustainability. We actively
                        promote recycling initiatives, encouraging our customers to responsibly dispose of old devices.
                        By participating in our recycling programs, customers not only contribute to a cleaner
                        environment but also receive incentives for their eco-friendly efforts.
                        <br>

                        <span style= "font-size:25px; font-weight:bolder;">Looking Ahead


                        </span><br>

                        The future holds exciting possibilities for <strong>{{$siteSettings->buisness_name}}</strong>. We are committed to staying at the
                        forefront of technological advancements, expanding our services, and continuing to provide
                        innovative solutions to our customers. As we look ahead, our focus remains on delivering
                        excellence, building lasting relationships, and being the go-to destination for all mobile phone
                        needs in the UK.
                        In conclusion, <strong>{{$siteSettings->buisness_name}}</strong> is not just a mobile phone store; it's a destination where technology
                        meets trust. Whether you're buying, selling, or repairing a mobile device, you can rely on
                        <strong>{{$siteSettings->buisness_name}}</strong> for a seamless and satisfying experience. Join us on our journey as we continue to
                        redefine the mobile phone retail landscape in the United Kingdom.






                        <a target="_blank" href="#">
                            {{ $siteBranch->email ?? '' }}</a>.
                    </p>
                </div>


            </div>
        </div>
        <style>
        .lh-lg {
        padding: 0 222px;
    }

    @media only screen and (max-width: 767px) {
        /* Set padding to zero for screens smaller than 768 pixels (phones) */
        .lh-lg {
            padding: 0;
        }
    }
            a:link {
                color: rgb(0, 0, 0);
                background-color: transparent;
                text-decoration: none;
            }

            a:hover {
                color: red;
                background-color: transparent;
                text-decoration: underline;
            }
            /* ===== About Us section theming fix ===== */
.repair-types .bg-color{
  background:#000 !important;   /* no more white */
  color: var(--color-text);
}
.repair-types .container-fluid{ background: transparent; }

/* Title color = theme primary (instead of hard red) */
.repair-types .text-center h2{
  color: var(--color-primary) !important;
}

/* Card look on dark/light themes */
.repair-types .about-fone-card{
  background: transparent !important;
  color: var(--color-text) !important;
  border: 1px solid var(--color-primary) !important;
  border-radius: 12px;
  padding: 20px;
}


/* Links */
.repair-types .about-fone-card a{
  color: var(--color-primary);
  text-decoration: none;
}
.repair-types .about-fone-card a:hover{
  text-decoration: underline;
}

/* Keep your custom paragraph padding rules */
.lh-lg{ padding: 0 222px; }
@media (max-width: 767px){ .lh-lg{ padding: 0; } }

        </style>
    </section>
</div>
