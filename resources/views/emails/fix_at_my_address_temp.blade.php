<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <title>Fix at my address repair</title>
    <link rel="stylesheet" href="Clinic-Repair-LB.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="m-0 fs-5"> Hi <span style=" font-weight: 600">{{ $data['patient']['first_name'] }},</span>
                </p>
                <p class="fs-5">
                    I hope you're well and thanks for booking your
                    <span style="font-weight: 600">
                        {{ $data['repair_detail']['model'] }} </span>
                    repair. Here’s the details you need:
                </p>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Customer Details:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td style="width: 180px;">Name:</td>
                            <td style=" font-weight: 600">
                                {{ $data['patient']['first_name'] }} {{ $data['patient']['last_name'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px;">Email:</td>
                            <td style="font-weight: 600">
                                {{ $data['patient']['email'] }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 180px;">Contact number:</td>
                            <td style="font-weight: 600">
                                {{ $data['patient']['phone'] }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 180px;">Existing Customer:</td>
                            <td style=" font-weight: 600">
                                {{ $data['patient']['existing_patient'] ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 180px;">Business Repair:</td>
                            <td style=" font-weight: 600">
                                {{ $data['patient']['business_repair'] ? 'Yes' : 'No' }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 180px;">Company Name:</td>
                            <td style="font-weight: 600">
                                {{ $data['patient']['company_name'] ?? 'N/A' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Repair Details:</b></h5>
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
                            <td style=" font-weight: 600">{{ $data['repair_detail']['device'] }}
                                {{ $data['repair_detail']['model'] }}
                                {{ array_key_exists('emc', $data) ? $data['emc'] : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Fault:</td>
                            <td style=" font-weight: 600">
                                @if (array_key_exists('faults', $data['repair_detail']))
                                @foreach ($data['repair_detail']['faults'] as $value)
                                @if ($value != 'Other Fault (Please Specify)')
                                <span style=" font-weight: 600">{{ $value }}</span><br>
                                @endif
                                @endforeach
                                @endif
                                {{ $data['repair_detail']['fault'] }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Turnaround Time:</td>
                            <td style="font-weight: 600">{{ $data['repair_detail']['How_long'] }}
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Part Used:</td>
                            <td style=" font-weight: 600">{{ $data['repair_detail']['part_used'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Warranty:</td>
                            <td style=" font-weight: 600">{{ $data['repair_detail']['warranty'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Provisional Quote:</td>
                            <td style=" font-weight: 600">£ {{ $data['repair_detail']['quotePrice'] }}</td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Additional Costs:</td>
                            <td style=" font-weight: 600">
                                {{ $data['repair_detail']['screen_protector'] }}<br>
                                {{ $data['repair_detail']['protective_case'] }}<br>
                                {{ $data['repair_detail']['postal_price'] }}<br>
                                {{ $data['repair_detail']['fix_form_price'] }}<br>
                                {{ $data['repair_detail']['collection_form_price'] }}<br>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Repair Note</td>
                            <td>
                                {{ $data['form']['repair_note'] }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 170px;">Info:</td>
                            <td>
                                If we can’t repair your device, then under our
                                <span style="color: red"><strong>No-Fix, No-Fee </strong></span>promise, there’s nothing
                                to pay for the work undertaken.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-3 col-12">
                <h5 class="m-0"><b>Repair option Options:</b></h5>
                <table class="table table-bordered table-sm border-dark" style="font-size: 1.2rem;">
                    <tbody>
                        <tr>
                            <td style="width: 180px;">Appointment Time:</td>
                            <td class="text-info" style="font-weight: 600;">
                                {{ $data['form']['repair_date'] }}
                                {{ $data['form']['repair_slot'] }}
                                {{-- [Appointment Day] [Appointment Date] [Appointment Time] --}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 180px;">Appointment Address:</td>
                            <td style=" font-weight: 600">
                                {{ $data['form']['address_line_1'] }}
                                {{ $data['form']['address_line_2'] }} <br>
                                {{ $data['form']['city'] }} <br>
                                {{ $data['form']['post_code'] }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>