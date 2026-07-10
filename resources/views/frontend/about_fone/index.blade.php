@extends('frontend.layouts.app')
@section('title', 'About-fone-doctors')
@section('content')
    <section>
        <livewire:components.mega-nav theme="white" />
        <div>
            <div class="container">
                <div class="text-center py-5 w-75 mx-auto">
                    <h2 class="text-danger">About fone doctors</h2>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>OK, so what makes you guys so special?</h3>
                    <hr>
                    <p>Well, we started fixing phones in London Bridge in 2004 and haven’t stopped since.
                        We’re rated 4.8 by
                        TrustPilot and have been finalists for the What Mobile Awards for several years, so whilst we don’t
                        like to brag, we must be doing something right.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Don’t like to brag, eh?</h3>
                    <hr>
                    <p>Well, we like to think we’re good at what we do and our patients seem to agree.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Patients? What the?</h3>
                    <hr>
                    <p>Hey, fone doctors, patients, geddit?</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Oh, cheesy</h3>
                    <hr>
                    <p>Well, we do enjoy what we do, plus we’re independent and not manufacturer
                        affiliated, so we have the freedom to be creative in our repair approach, rather than be tied to a
                        manufacturer handbook</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Liquid Damage, eh?</h3>
                    <hr>
                    <p>Yup, believe us, we’ve seen it all; water, wine, milkshake, olive oil, hot
                        chocolate, even pee damage (and worse). You think of it, we’ve seen it!</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>But if you’re not manufacturer approved, how can we know that you’re not using dodgy parts?</h3>
                    <hr>
                    <p>Because in 17 years of fixing tech, we’ve only used the best quality parts
                        available. We refurbish our Apple screens in-house and for Samsung & Huawei displays, we mainly use
                        Official Service Pack display modules. Plus, with our business repair background, our patients
                        insist on the best quality. Quite simply, if it’s not good enough for us, it’s not good enough for
                        you (what was that song?)</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>OK, but if you can’t fix a device, do we still pay?!</h3>
                    <hr>
                    <p>No. With our no-fix, no-fee guarantee if we can’t successfully complete your
                        repair, there’s nothing to pay. Plus we don’t charge to diagnose so you’re in complete control.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Does that mean your prices are super expensive?</h3>
                    <hr>
                    <p>Quite the contrary. Some of our repairs using original screens are less than other
                        companies charge for generic displays. Our aim is not to be the cheapest, because, ultimately, we
                        don’t want to compromise on quality or service. We do feel, however, that we offer the best value of
                        any repair company.</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Are you guys always this cheeky?</h3>
                    <hr>
                    <p>Yup, it’s part of the job description</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>Just cheeky, or is there more substance?</h3>
                    <hr>
                    <p>Well, we believe in treating people equally in all that we do. We especially
                        believe that everyone, irrespective of gender, colour, creed, race, religion, sexuality, physical or
                        mental ability, sporting affiliation, food preferences etc, should have an equally non-existent
                        chance of getting their grubbly little hands on our beloved Jaffa Cakes!</p>
                </div>
                <div class="card about-fone-card my-3 p-3">
                    <h3>God, you are really weird, aren’t you?</h3>
                    <hr>
                    <p>It has been mentioned.</p>
                </div>
            </div>
        </div>
    </section>


    <br>
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
