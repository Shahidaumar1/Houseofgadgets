<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <section>
        <livewire:components.mega-nav theme="white" />
    </section>
    <div>
        @switch($type)
            @case('other-mobiles')
                <livewire:guest.others.other-mobiles />
            @break

            @case('samsung-glaxy-tab')
                <livewire:guest.others.samsung-glaxy-tab />
            @break

            @case('other-tablets')
                <livewire:guest.others.other-tablets />
            @break

            @case('apple-macbook')
                <livewire:guest.others.apple-macbook />
            @break

            @case('microsoft-surface')
                <livewire:guest.others.microsoft-surface />
            @break

            @case('other-laptops')
                <livewire:guest.others.other-laptops />
            @break

            @case('other-repair-types')
                <livewire:guest.other-repair-types :make='$make' :modal='$modal' />
            @break

            @default
        @endswitch


        <div class="container">


            <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="my-5">
                With repair clinics in popular Central London hubs, free collections from your Liverpool Street or
                <br /> style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';"
                Canary Wharf
                office and Postal/Courier repairs across the UK, we’ll have you up & running in no time.<br /><br>
                With the best value parts & express repair options, our experienced technicians have fixed over
                <br>120,000
                devices since 2004.
            </p>


            <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="row">
                <div class="col-12 col-lg-6 col-md-6 bg-danger text-light ">
                    <div class="w-75 mx-auto p-4">
                        <livewire:guest.components.patient-detail-form :key="uniqid()" />
                    </div>
                </div>
                <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="col-12 col-lg-6 col-md-6 bg-danger text-light">
                    <div class="w-75 mx-auto p-4 position-relative">
                        <livewire:guest.components.form-toggle />
                    </div>
                </div>
                <livewire:guest.others.book-repair type="TBC" />

            </div>

        </div>
    </div>
</div>
