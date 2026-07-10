@extends('frontend.layouts.app')
@section('title', 'FAQ')
@section('content')
    <section class="repair-types ">
        <livewire:components.mega-nav theme="white" />
        <div class="bg-color">
            <div class="container">
                <div class="text-center py-5 w-75 mx-auto">
                    <h2 class="text-danger">FAQ’s</h2>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Ah, a phone repair shop, right?</h3>
                    <hr>
                    <p>Well, actually, it’s a Walk-In Surgery at London Bridge, plus an appointment-based
                        clinic at Liverpool Street & another one coming soon at Canary Wharf. Oh, and we also have a
                        Paramedic Repair service and a postal/courier repair service.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Wait, what’s a Paramedic Repair?</h3>
                    <hr>
                    <p>It’s when you don’t come to us, but we come to you. One of our “paramedics” will
                        carry out a repair at your home or office (socially distanced of-course).</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Well, what do you fix then?</h3>
                    <hr>
                    <p>Phones, laptops & tablets across a wide range of manufacturers. So it’s not just
                        your iPhones & Samsung Galaxy phones, we also fix iPads, Huawei Tablets & phones, Samsung tablets,
                        Dell Laptops, OnePlus phones, Toshiba laptops, Amazon Kindle tablets, Xiaomi, Sony, Oppo,
                        Blackberry, LG, HTC, Motorola, Nokia (yup, still) phones, Macbooks, Asus tablets and laptops, Acer
                        and so many more…</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>So just broken screens then, or anything else?</h3>
                    <hr>
                    <p>Broken screens account for around 60% of our repairs, but there’s also battery
                        replacements, charging port repairs, antenna faults, software issues, audio repairs, motherboard
                        repairs, data recovery, liquid damaged devices</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Liquid Damage, eh?</h3>
                    <hr>
                    <p>Yup, believe us, we’ve seen it all; water, wine, milkshake, olive oil, hot
                        chocolate, even pee damage (and worse). You think of it, we’ve seen it!</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>You can fix all of that?</h3>
                    <hr>
                    <p>Not always, some phones are too badly damaged and we’re not magicians. But with
                        the skill set in our team, there’s a good chance that if we can’t fix it, nobody else can.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>OK, but if you can’t fix a device, do we still pay?!</h3>
                    <hr>
                    <p>No. With our no-fix, no-fee guarantee if we can’t successfully complete your
                        repair, there’s nothing to pay. Plus we don’t charge to diagnose so you’re in complete control.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>And how long do these repairs take?</h3>
                    <hr>
                    <p>Different for each scenario, but most common screen & battery repairs can be
                        completed in under an hour. Our record time for an iPhone 6S battery repair is under 4 minutes
                        (including testing). That’s quicker than we can eat a packet of Jaffa Cakes!</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Is there a warranty with these repairs?</h3>
                    <hr>
                    <p>Yeah, by default, our repairs have a 12-month warranty, unless otherwise advised.
                        Some Original & Service Pack Screen Repairs will have a long warranty for any technical faults
                        (just don’t break it again). Battery replacements & certain other repairs will have a 3-month
                        warranty.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Hang on, are you an official service centre?</h3>
                    <hr>
                    <p>Quite deliberately not! We learnt very early on, that we can’t trust manufacturers
                        and networks. They don’t really care about looking out for you, it’s just profits and numbers and we
                        don’t want be part of their cynical cartel. Sure, we’re running a business and we want to make money
                        out of you, but it’s important for us to be fair and that’s why we’re proudly independent. It means
                        we don’t have to follow a manufacturer handbook or buy parts only from limited official sources and
                        let’s us be creative in how we approach repairs. This means we put your interests before
                        manufacturers profits and that’s why we’ll never compromise on our independence.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Why does my device tell me you're not using genuine part repair?</h3>
                    <hr>
                    <p>We’re deliberately independent! This means that we’re not part of any manufacturer
                        accreditation programmes and so don’t buy our parts directly from Apple, Samsung or Huawei etc. This
                        doesn’t prevent us from buying original Service Pack parts or from refurbishing original displays
                        in-house, which is what we do for the majority of the Apple screens we use. However, in a bid to
                        monopolise repairs, some manufacturers (especially Apple) will not recognise independent 3rd party
                        service centres. As a result, some devices will display messages advising that parts cannot be
                        confirmed as genuine. This will be the same if using original or generic parts. As an example, if we
                        took an original display from an iPhone 11 Pro and placed it on another iPhone 11 Pro, an error
                        message would advise that the part cannot be confirmed as genuine; this is because the part number
                        does not match the corresponding entry on Apple’s database. This is designed to restrict your
                        ability to repair your phone. To learn more on this, please search more about the Right to Repair
                        movement or see this great video from Marcus Brownlee.</p>
                </div>
            </div>
        </div>
    </section> <br>
    <script>
        var faq = document.getElementsByClassName("faq-page");
        var i;
        for (i = 0; i < faq.length; i++) {
            faq[i].addEventListener("click", function() {
                /* Toggle between adding and removing the "active" class,
                to highlight the button that controls the panel */
                this.classList.toggle("actives");
                /* Toggle between hiding and showing the active panel */
                var body = this.nextElementSibling;
                if (body.style.display === "block") {
                    body.style.display = "none";
                } else {
                    body.style.display = "block";
                }
            });
        }
    </script>
@endsection
