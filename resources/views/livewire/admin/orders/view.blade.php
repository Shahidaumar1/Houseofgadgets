@php
    function safeStr($val, $default = '-') {
        if (is_null($val)) return $default;
        if (is_array($val)) return implode(', ', array_filter($val, fn($v) => !is_array($v)));
        return (string) $val ?: $default;
    }
@endphp
<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="orders" />
        <x-content>
            <livewire:admin.orders.components.top-nav active="" />

            <div class="container my-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-primary">Order Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">

                                <!-- Customer Details -->
                                <div class="mb-3 col-12">
                                    <h3 class="text-primary text-center"><b>Customer Details</b></h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td style="font-weight:600">
                                                    {{ $order->customer_name ?? ($patient['name'] ?? (trim(($patient['first_name'] ?? '') . ' ' . ($patient['last_name'] ?? '')))) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td style="font-weight:600">
                                                    {{ $order->customer_email ?? ($patient['email'] ?? '-') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Contact number:</td>
                                                <td style="font-weight:600">
                                                    {{ safeStr($patient['phone'] ?? null) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payment Method:</td>
                                                <td style="font-weight:600">
                                                    {{ str_replace('_', ' ', ucwords(safeStr($order->payment_method ?? null, 'N/A'), '_')) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td style="font-weight:600">
                                                    {{ ucfirst($order->status ?? '-') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tracking Number:</td>
                                                <td style="font-weight:600">
                                                    {{ $order->tracking_number ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Order Date:</td>
                                                <td style="font-weight:600">
                                                    {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y h:i A') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Repair Details -->
                                <div class="mb-3 col-12">
                                    <h3 class="text-primary text-center"><b>{{ ucfirst(is_array($order->service ?? null) ? implode(', ', $order->service) : ($order->service ?? 'Repair')) }} Details</b></h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width:170px;">Device:</td>
                                                <td style="font-weight:600">
                                                    {{ safeStr($repairDetail['device'] ?? null) }}
                                                    {{ safeStr($repairDetail['model'] ?? null, '') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Fault:</td>
                                                <td style="font-weight:600">
                                                    @if(!empty($repairDetail['faults']))
                                                        @foreach($repairDetail['faults'] as $fault)
                                                            @if($fault != 'Other Fault (Please Specify)')
                                                                <span>{{ is_array($fault) ? implode(', ', $fault) : $fault }}</span><br>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if(!empty($repairDetail['fault']))
                                                        {{ is_array($repairDetail['fault']) ? implode(', ', $repairDetail['fault']) : $repairDetail['fault'] }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Turnaround Time:</td>
                                                <td style="font-weight:600">
                                                    {{ safeStr($repairDetail['How_long'] ?? null) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Part Used:</td>
                                                <td style="font-weight:600">
                                                    {{ safeStr($repairDetail['part_used'] ?? null) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Warranty:</td>
                                                <td style="font-weight:600">
                                                    {{ safeStr($repairDetail['warranty'] ?? null) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quote Price:</td>
                                                <td style="font-weight:600">
                                                    £ {{ safeStr($repairDetail['quotePrice'] ?? null, '0') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Price:</td>
                                                <td style="font-weight:600">£ {{ number_format($order->amount ?? 0, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Additional Costs:</td>
                                                <td style="font-weight:600">
                                                    @foreach(['screen_protector','protective_case','postal_price','fix_form_price','collection_form_price'] as $key)
                                                        @if(!empty($repairDetail[$key]))
                                                            {{ is_array($repairDetail[$key]) ? implode(', ', $repairDetail[$key]) : $repairDetail[$key] }}<br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Repair Type:</td>
                                                <td style="font-weight:600">
                                                    {{ safeStr($repairDetail['repair_type_name'] ?? null) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Appointment Details -->
                                @if(!empty($form))
                                <div class="mb-3 col-12">
                                    <h3 class="text-primary text-center"><b>Appointment Details</b></h3>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width:170px;">Date - Time:</td>
                                                <td class="text-info" style="font-weight:600;">
                                                    {{ $form['appointment_date'] ?? $form['repair_date'] ?? '-' }}
                                                    -
                                                    {{ $form['appointment_time'] ?? $form['repair_time'] ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td style="font-weight:600;">
                                                    {{ $form['address_line_1'] ?? '' }}
                                                    {{ !empty($form['address_line_2']) ? ', ' . $form['address_line_2'] : '' }}
                                                    {{ !empty($form['city']) ? ', ' . $form['city'] : '' }}
                                                    {{ !empty($form['post_code']) ? ', ' . $form['post_code'] : '' }}
                                                </td>
                                            </tr>
                                            @if(!empty($form['repair_note']))
                                            <tr>
                                                <td>Repair Note:</td>
                                                <td>{{ is_array($form['repair_note']) ? implode(', ', $form['repair_note']) : $form['repair_note'] }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @endif

                                <div class="col-12">
                                    <div class="alert alert-info">
                                        <strong>No-Fix, No-Fee Promise:</strong> If we can't repair your device, under our promise, there's nothing to pay for the work undertaken.
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <a href="{{ route('orders') }}" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left"></i> Back to Orders
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-content>
    </div>
</div>