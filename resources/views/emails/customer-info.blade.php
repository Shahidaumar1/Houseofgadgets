 <!-- resources/views/emails/customer-info.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Your Product Information</title>
</head>

<body>
    <h2>Hello, {{ $data['firstName'] }} {{ $data['lastName'] }}</h2>

    <p>Thank you for providing your information. Here are the details you submitted:</p>

    <ul>
        <li><strong>Phone:</strong> {{ $data['phone'] }}</li>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Confirm Email</strong> {{ $data['productName'] }}</li>

    </ul>

    <!-- Display the selected checkboxes -->
    @if (isset($data['checkboxes']) && count($data['checkboxes']) > 0)
        <p>Checkboxes you selected:</p>
        <ul>
            @foreach ($data['checkboxes'] as $checkbox)
                <li>{{ $checkbox }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Display text for "Other" checkbox if applicable -->
    @if (isset($data['otherText']) && !empty($data['otherText']))
        <p>You specified: {{ $data['otherText'] }}</p>
    @endif

    <!-- Display whether the customer is an existing customer -->
    <p>Existing Customer: {{ $data['existingCustomer'] == 'yes' ? 'Yes' : 'No' }}</p>

    <!-- Display whether the customer is a business -->
    <p>Business: {{ $data['isBusiness'] == 'yes' ? 'Yes' : 'No' }}</p>

    <!-- Display brand and model information -->
    @if (isset($data['brand']) && !empty($data['brand']))
        <p>Brand: {{ $data['brand'] }}</p>
    @endif

    @if (isset($data['model']) && !empty($data['model']))
        <p>Model: {{ $data['model'] }}</p>
    @endif

    <!-- Additional description if available -->
    @if (isset($data['additionalDescription']) && !empty($data['additionalDescription']))
        <p>Additional Description: {{ $data['additionalDescription'] }}</p>
    @endif

    <p>We appreciate your interest and will get back to you soon.</p>

    <p>Best regards,</p>
    <p>{{ $siteSettings->buisness_name ?? '' }}</p>
</body>

</html>
