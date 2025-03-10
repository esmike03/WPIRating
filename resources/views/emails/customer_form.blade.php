<!DOCTYPE html>
<html>

<head>
    <title>New Customer Form Submission</title>
</head>

<body style="color: black; font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">

    <h2 style="color: #2c3e50;">New Customer Form Submitted</h2>

    <!-- Two-column layout for personal info -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px;"><strong>Date:</strong> {{ $data['date'] }}</td>
            <td style="padding: 8px;"><strong>Customer Code:</strong> {{ $data['customer_code'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><strong>Customer Name:</strong> {{ $data['customer_name'] }}</td>
            <td style="padding: 8px;"><strong>Address:</strong> {{ $data['address'] }}</td>
        </tr>
    </table>
    @php
        $color = $data['average_rating'] >= 7 ? 'green' : ($data['average_rating'] >= 4 ? 'orange' : 'red');
    @endphp

    <h3>Average Rating:
        <span style="font-weight: bold; color: {{ $color }};">
            {{ $data['average_rating'] }}
        </span>
    </h3>

    <p style="padding: 8px;"><strong>Comments and Remarks:</strong> {{ $data['comments'] }}</p>

    <hr style="border: 1px solid #ddd; margin: 20px 0;">

    <!-- Two-column section for categories -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h3 style="color: #2980b9;">Personal Relation</h3>
                @php
                    $questions = [
                        'To Customers',
                        'To Agent and Partner',
                        'Loyalty to the Company',
                        'To the Manager of the Company',
                        'To the Supervisor',
                        'To the Office Feedback',
                        'Loyalty to the Company',
                    ];
                @endphp
                <ul>

                    @foreach (json_decode($data['personalrelation'], true) as $key => $value)
                        <li><span>{{ $questions[$key] }}:</span> <strong>{{ $value }}</strong></li>
                    @endforeach
                </ul>
            </td>

            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h3 style="color: #2980b9;">Sales and Collection</h3>
                @php
                    $questions2 = ['Ordering Concerns', 'Terms Concerns', 'Deal Concerns', 'Discounting Concerns', 'Collection Concerns'];
                @endphp
                <ul>
                    @foreach (json_decode($data['sales'], true) as $key => $value)
                        <li><span>{{ $questions2[$key] }}:</span> <strong>{{ $value }}</strong></li>
                    @endforeach
                </ul>
            </td>
        </tr>


    </table>

</body>

</html>
