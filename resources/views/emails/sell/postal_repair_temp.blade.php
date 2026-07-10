<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <title>Postal Sent</title>
    <link rel="stylesheet" href="Clinic-Repair-LB.css" />
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <p class="m-0 fs-5"> Hi <span style=" font-weight: 600">{{ $data['patient']['name'] }},</span>
                </p>
                <p class="fs-5">
                    I hope you're well and thanks for booking your
                    <span style=" font-weight: 600">
                        {{ $data['sell_detail']['specs']['modal']['name'] }} </span>
                    mobile. Here’s the details you need:
                </p>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Customer Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td style="width: 180px;">Name:</td>
                            <td style="font-weight: 600">
                                {{ $data['patient']['name'] }} 
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px;">Email:</td>
                            <td style=" font-weight: 600">
                                {{ $data['patient']['email'] }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 180px;">Contact number:</td>
                            <td style=" font-weight: 600">
                                {{ $data['patient']['phone'] }}
                            </td>
                        </tr>
                
                

                    </tbody>
                </table>
            </div>

<tr>
                            <td scope="row" style="width: 170px;">appointment at</td>
                            <td>
                                <span style="color: red"><strong>@if(session()->has('clinic_name'))
    <p>{{ session('clinic_name') }}</p>
@else
    <p>Branch name not available</p>
@endif
</strong></span>
                            </td>
                        </tr>
                           <tr>
                            <td scope="row" style="width: 170px;"> Payment Method</td>
                            <td>
                                <span style="color: red"><strong>@if(session()->has('payment-method'))
    <p>{{ session('payment-method') }}</p>
@else
    <p>Payment Method NOT aVAILABLE  not available</p>
@endif
</strong></span>
                            </td>
                        </tr>
                                                <tr>
                  <table>
    <tr>
        <td scope="row" style="width: 170px;">Location</td>
        <td>
            @if(session()->has('map_link'))
                <a href="{{ session('map_link') }}" target="_blank">
                    <img src="https://staticmap.openstreetmap.de/staticmap.php?center=51.515373671697525,0.05569271195689881&zoom=15&size=600x400&maptype=mapnik&markers=51.515373671697525,0.05569271195689881,red-pushpin" alt="Map location" style="border: 0;">
                </a>
            @else
                Map link not available
            @endif
        </td>
    </tr>
</table>
            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Device Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td scope="col" style="width: 180px;">Sell Device Reference:</td>
                            <td scope="col">
                                This will follow in the acknowledgement email to be sent by
                                our Lab Team
                            </td>
                        </tr>
                        <tr>

                            <td scope="row" style="width: 170px;">Device:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['specs']['device']['name'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Model:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['specs']['modal']['name'] }}</td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Memory Size:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['specs']['memory_size'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Color:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['specs']['color'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Condition:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['specs']['condition'] }}</td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Provisional Quote:</td>
                            <td style=" font-weight: 600"> £ {{ $data['sell_detail']['specs']['price'] }}</td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Note</td>
                            <td>
                                {{ $data['form']['repair_note'] }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Payment Option Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td scope="col" style="width: 180px;">Sell Device Reference:</td>
                            <td scope="col">
                                This will follow in the acknowledgement email to be sent by
                                our Lab Team
                            </td>
                        </tr>
                        @if($data['sell_detail']['paypal'])
                        <tr>
                            <td scope="row" style="width: 170px;">Paypal:</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Paypal Account Name:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['paypal']['account_name'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Paypal Account Email:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['paypal']['email'] }}</td>
                        </tr>
                        @elseif($data['sell_detail']['bank'])
                        <tr>
                            <td scope="row" style="width: 170px;">Bank :</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Bank Name:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['bank']['name'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Bank Account Number:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['bank']['account_number'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Sort Code:</td>
                            <td style=" font-weight: 600">{{ $data['sell_detail']['bank']['sort_code'] }}</td>
                        </tr>
                        @else
                        @endif
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</body>

</html>