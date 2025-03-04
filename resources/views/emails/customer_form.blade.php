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
    <p style="padding: 8px;"><strong>Comments and Remarks:</strong> {{ $data['comments'] }}</p>
    <p style="text-align: center; margin-top: 20px; font-size: 12px; color: #7f8c8d;">
        <em>This is an automated email. Please do not reply.</em>
    </p>

</body>

</html>
