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
                        {{ $data['buy_detail']['modal']['name'] }} </span>
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
                        
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>

          
            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Device Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td scope="col" style="width: 180px;">Booking Reference:</td>
                            <td scope="col">
                                This will follow in the acknowledgement email to be sent by
                                our Lab Team
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Device:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['device']['name'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Model:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['modal']['name'] }}</td>
                        </tr>

                        <tr>
                            <td scope="row" style="width: 170px;">Memory Size:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['memory_size'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Color:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['color'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Grade:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['grade'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Detail:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['detail'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Specification:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['specification'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Warranty:</td>
                            <td style=" font-weight: 600">{{ $data['buy_detail']['warranty'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Quantity:</td>
                            <td style=" font-weight: 600"> {{ $data['buy_detail']['quantity'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Provisional Quote:</td>
                            <td style=" font-weight: 600"> £ {{ $data['buy_detail']['price'] }}</td>
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



        </div>
    </div>
</body>

</html>