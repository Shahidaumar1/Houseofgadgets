<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    {{-- dynamic page title --}}
    <title>{{ ($siteSettings->meta_title ?? $siteSettings->buisness_name ?? 'Website') }} | Terms &amp; Conditions</title>

    <style>
        a:link { color:#000; background-color:transparent; text-decoration:none; }
        a:hover{ color:red; background-color:transparent; text-decoration:underline; }
        ol.d { list-style-type: lower-alpha; }
    </style>
</head>
<body>
    <h1 class="text-center p-5">Terms &amp; Conditions</h1>
    <div class="lh-lg" style="text-align: justify; padding: 0px 222px">
        <h2>Sell Your Device to Us</h2>
        At {{ $siteSettings->buisness_name ?? '' }}, we provide a seamless process for selling your devices.
        Before proceeding, please carefully review the terms and conditions outlined below to ensure a smooth transaction.<br />
        <ul class="p-0 m-0">
            <h4>1. Device Evaluation Process</h4>
            <ol class="d">
                <li><b>Device Selection:</b> Select the device you wish to sell; offered price shows based on provided info.</li>
                <li><b>Condition Verification:</b> We inspect for damages, functionality, and match to selected details.</li>
                <li><b>Verification Process:</b> Comprehensive checks to confirm specs/condition.</li>
            </ol>
        </ul>

        <h4>2. Payment and Verification</h4>
        <ol class="d">
            <li><b>Payment Confirmation:</b> If device matches description and passes verification, we pay the agreed price.</li>
            <li><b>Payment Methods:</b> Multiple methods per your preference.</li>
            <li><b>Discrepancies or Issues:</b> If mismatched, we’ll contact you to adjust or return.</li>
        </ol>

        <h4>3. Data and Security</h4>
        <ol class="d">
            <li><b>Data Erasure:</b> Back up and erase personal data before selling.</li>
            <li><b>Data Privacy:</b> We handle data securely and per regulations.</li>
        </ol>

        <h4>4. Warranty and After-Sale Support</h4>
        <ol class="d">
            <li><b>Post-sale Warranty:</b> No warranty after sale for sold devices.</li>
            <li><b>Customer Support:</b> Assistance available during the selling process.</li>
        </ol>

        <p>By initiating the process to sell your device to {{ $siteSettings->buisness_name ?? '' }}, you agree to these terms.</p>

        <h2>Buy Devices from Us</h2>
        At {{ $siteSettings->buisness_name ?? '' }}, we aim to make buying easy.<br />
        <ul class="p-0 m-0">
            <h4>1. Device Selection and Purchase</h4>
            <ol class="d">
                <li><b>Device Selection:</b> Browse inventory with specs & condition.</li>
                <li><b>Reservation and Payment:</b> Reserve for pickup or pay online for delivery.</li>
                <li><b>Checkout Process:</b> Choose device, method, and provide accurate info.</li>
            </ol>
        </ul>

        <h4>2. Device Delivery and Condition</h4>
        <ol class="d">
            <li><b>Delivery Options:</b> Delivery to your address or collect in-store.</li>
            <li><b>Condition Verification:</b> Inspect on arrival; contact us if anything’s off.</li>
        </ol>

        <h4>3. Payment and Warranty</h4>
        <ol class="d">
            <li><b>Payment Methods:</b> Secure online options.</li>
            <li><b>Warranty Coverage:</b> Limited warranty per listing.</li>
        </ol>

        <h4>4. Returns and Customer Support</h4>
        <ol class="d">
            <li><b>Return Policy:</b> Eligible returns if specs don’t match.</li>
            <li><b>Customer Support:</b> We’re here to help.</li>
        </ol>

        <h2>Device Repair Services</h2>
        At {{ $siteSettings->buisness_name ?? '' }}, we prioritize reliable repairs.<br />
        <ul class="p-0 m-0">
            <h4>1. Repair Options</h4>
            <ol class="d">
                <li><b>Visit our Store</b></li>
                <li><b>Mail-in Repairs</b></li>
                <li><b>Pickup Services</b></li>
                <li><b>On-site Repairs</b></li>
            </ol>
        </ul>

        <h4>2. Repair Process</h4>
        <ol class="d">
            <li><b>Evaluation and Estimate</b></li>
            <li><b>Repair Execution</b></li>
            <li><b>Quality Assurance</b></li>
        </ol>

        <h4>3. Payment, Warranty, and Repair Time</h4>
        <ol class="d">
            <li><b>Payment Methods</b></li>
            <li><b>Repair Warranty</b></li>
            <li><b>Device-Specific Repair Time</b></li>
        </ol>

        <h4>4. Data and Device Security</h4>
        <ol class="d">
            <li><b>Data Protection</b></li>
            <li><b>Device Security</b></li>
        </ol>

        <h4>5. GDPR Consent and Cookie Acceptance</h4>
        <ol class="d">
            <li><b>GDPR Consent</b></li>
            <li><b>Acceptance of Cookies</b></li>
        </ol>
    </div>
</body>
</html>
