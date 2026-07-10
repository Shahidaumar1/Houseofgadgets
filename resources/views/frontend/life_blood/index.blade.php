@extends('frontend.layouts.app')
@section('title', 'LifeBlood')
@section('content')
    <div>
        <section class="repair-types ">
            <livewire:components.mega-nav theme="white" />
            <div class="bg-color">
                <div class="container">
                    <div class="text-center py-5 w-75 mx-auto">
                        <h2 class="text-danger">LifeBlood Business FAQ’s</h2>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>Hey, do you offer a business repair service?</h3>
                        <hr>
                        <p>A-ha, we were hoping you would ask that. You see, communication is the
                            LifeBlood of Business. If your team can’t communicate, they can’t work and that’s especially the
                            case in these changing times. That’s why our LifeBlood Business Account is geared to keep your
                            comms flowing.</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>OK, but what does it do?</h3>
                        <hr>
                        <p>Well, firstly we offer discounted rates for business repairs, accessories &
                            devices. Remember, we fix a wide range of mobile, laptop & tablet devices across all
                            manufacturers. Plus, we’re independent and not manufacturer affiliated, so we can be creative in
                            our repair approach, without being tied to a manufacturer handbook</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>Mmmm and how long is the contract?</h3>
                        <hr>
                        <p>Oh, there’s no contract.</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>OK and how many devic- wait, what?! What do you mean no contract?</h3>
                        <hr>
                        <p>Err, there’s no contract! This means there’s no recurring fee, no minimum term
                            and no minimum volume or spend requirements. Use us once and never again, or keep on using us,
                            it’s up to you.</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>Hang on, what's the catch?</h3>
                        <hr>
                        <p>Well, you have to buy us lots of chocolate (not really, but we won’t say no if
                            you do!). The idea is that if you like the service, you’ll keep using us and if you don’t, then
                            we don’t deserve your business. We don’t think it’s fair to force you to use us if you don’t
                            want to. It’s that whole, “if you love someone, set them free” kind of thing…</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>OK, so it's basically just a discount, right?</h3>
                        <hr>
                        <p>Well, it’s a bit more than that. You’ll have a dedicated account manager to
                            help with your repairs and with any queries you may have and…</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>And?</h3>
                        <hr>
                        <p>And, we also give full access to our booking portal, so you can book & approve
                            repairs, view invoices and have full visibility of our repair notes for your devices. That means
                            if we’ve been saying bad things about how clumsy your sales manager is, you’ll know about it.
                            Our patients love this the most. It’s also great to help you track what you’ve been fixing.</p>
                    </div>
                    <div class="card about-fone-card my-3 p-3">
                        <h3>Anything else?</h3>
                        <hr>
                        <p>Yup, after some initial trading history is built up, we offer 14-day invoice
                            payment terms (subject to checks). Your finance team will like that.</p>
                    </div>
                </div>
            </div>
        </section>
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
    </div>
@endsection
