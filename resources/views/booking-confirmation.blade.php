<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed | {{ config('app.name') }}</title>

    {{-- Google Ads Conversion Tag — fires only on this page --}}
    {{-- Replace AW-XXXXXXXXX/YYYYYYY with your actual conversion ID --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-XXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'AW-XXXXXXXXX');

        gtag('event', 'conversion', {
            'send_to': 'AW-XXXXXXXXX/YYYYYYY',
            'value': {{ $booking['price'] ?? 0 }},
            'currency': 'GBP'
        });
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Manrope', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #0a0a0a;
            position: relative;
            overflow-x: hidden;
        }

        /* ✅ Your specified background image */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: url('https://ik.imagekit.io/smolbsouh/House%20of%20gadgets/ChatGPT%20Image%20Mar%2025,%202026,%2002_14_19%20PM.png')
                center / cover no-repeat;
            filter: brightness(0.32);
            z-index: 0;
        }

        .card-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 900px;
            animation: fadeUp 0.6s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Checkmark */
        .check-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 82px;
            height: 82px;
            border-radius: 50%;
            background: #4caf50;
            box-shadow: 0 0 0 14px rgba(76,175,80,0.15);
            margin: 0 auto 20px;
            animation: popIn 0.5s 0.3s ease both;
        }

        @keyframes popIn {
            from { transform: scale(0.4); opacity: 0; }
            to   { transform: scale(1);   opacity: 1; }
        }

        h1.title {
            text-align: center;
            color: #fff;
            font-size: clamp(24px, 5vw, 36px);
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        p.subtitle {
            text-align: center;
            color: #c0c8d4;
            font-size: 15px;
            margin-bottom: 6px;
        }

        p.email-line {
            text-align: center;
            color: #c0c8d4;
            font-size: 14px;
            margin-bottom: 32px;
        }

        p.email-line strong { color: #f0c040; }

        /* Two column cards */
        .cards-row {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            flex: 1;
            min-width: 260px;
            max-width: 400px;
            background: rgba(0,0,0,0.58);
            border: 1px solid rgba(255,255,255,0.11);
            border-radius: 16px;
            padding: 24px;
            backdrop-filter: blur(8px);
        }

        .card-title {
            color: #f0c040;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 16px;
        }

        /* Summary table */
        .summary-table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
        .summary-table td { padding: 7px 0; border-bottom: 1px solid rgba(255,255,255,0.07); color: #c0c8d4; }
        .summary-table td:last-child { text-align: right; color: #fff; font-weight: 600; }
        .summary-table tr:last-child td { border-bottom: none; }

        /* Store info rows */
        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #c0c8d4;
            font-size: 13px;
            margin-bottom: 13px;
        }
        .info-row svg { flex-shrink: 0; margin-top: 2px; }
        .info-row a { color: #c0c8d4; text-decoration: none; }
        .info-row a:hover { color: #f0c040; }
        .info-row strong { color: #fff; display: block; margin-bottom: 2px; }
        .info-desc { color: #c0c8d4; font-size: 14px; line-height: 1.6; margin-bottom: 18px; }

        /* Buttons */
        .btn-row { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 20px; }
        .btn-ghost {
            flex: 1; min-width: 140px;
            display: inline-flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.08); color: #fff;
            font-weight: 600; font-size: 14px;
            padding: 13px 18px; border-radius: 9px;
            text-decoration: none; border: 1px solid rgba(255,255,255,0.2);
            transition: background 0.2s;
        }
        .btn-ghost:hover { background: rgba(255,255,255,0.14); }

        /* Tracking badge */
        .tracking-badge {
            text-align: center;
            margin-top: 28px;
            color: rgba(255,255,255,0.45);
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        .tracking-badge span { color: #f0c040; font-weight: 700; letter-spacing: 1px; }

        @media(max-width: 540px) {
            .cards-row { flex-direction: column; }
            .card { max-width: 100%; }
        }
    </style>
</head>
<body>

    <div class="card-wrapper">

        {{-- Checkmark --}}
        <div class="check-circle">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="none" viewBox="0 0 24 24">
                <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.8" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        {{-- Heading --}}
        <h1 class="title">Thank You for Your Booking!</h1>
        <p class="subtitle">Your booking has been successfully submitted.</p>
        <p class="email-line">
            A confirmation email has been sent to:&nbsp;
            <strong>{{ $booking['email'] ?? '' }}</strong>
        </p>

        {{-- Cards --}}
        <div class="cards-row">

            {{-- LEFT: Summary --}}
            <div class="card">
                @php
                    $formName = $booking['form_name'] ?? '';
                    $isRepair = !in_array($formName, ['Buy Device', 'Accessories Order', 'Sell Your Device']);
                @endphp

                <div class="card-title">
                    {{ $isRepair ? 'Repair Summary' : 'Order Summary' }}
                </div>

                <table class="summary-table">
                    <tr>
                        <td>Model</td>
                        <td>{{ $booking['model'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{ $booking['form_name'] ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>{{ $booking['repair_type'] ?? 'Service' }}</td>
                        <td>£ {{ number_format($booking['price'] ?? 0, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Total Price</td>
                        <td>£ {{ number_format($booking['price'] ?? 0, 2) }}</td>
                    </tr>

                    {{-- ✅ Repair Time — only for Repair bookings --}}
                    @if($isRepair)
                    <tr>
                        <td>Repair Time</td>
                        <td>{{ $booking['repair_time'] ?? 'Not Available' }}</td>
                    </tr>
                    @endif

                    {{-- ✅ Warranty — hide only for Sell --}}
                    @if($formName !== 'Sell Your Device')
                    <tr>
                        <td>Warranty</td>
                        <td>{{ $booking['warranty'] ?? 'Not Available' }}</td>
                    </tr>
                    @endif

                </table>
            </div>

            {{-- RIGHT: Store Info --}}
            <div class="card">
                <div class="card-title">Store Details</div>
                <p class="info-desc">
                    Please check your email for booking details and further instructions.
                </p>

                <div class="info-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f0c040" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                    </svg>
                    <div>
                        <strong>{{ $booking['store_name'] ?? '' }}</strong>
                        {{ $booking['address'] ?? '' }}
                    </div>
                </div>

                <div class="info-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f0c040" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <a href="mailto:{{ $booking['store_email'] ?? '' }}">{{ $booking['store_email'] ?? '' }}</a>
                </div>

                <div class="info-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f0c040" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg>
                    <span>{{ $booking['phone'] ?? '' }}</span>
                </div>

                <div class="btn-row">
                    <a href="{{ url('/') }}" class="btn-ghost">&#8249; Back to Home</a>
                </div>
            </div>

        </div>

        {{-- Tracking number --}}
        @if(!empty($booking['tracking']))
        <div class="tracking-badge">
            Booking Reference: <span>{{ $booking['tracking'] }}</span>
        </div>
        @endif

    </div>

</body>
</html>