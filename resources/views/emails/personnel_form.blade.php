<!DOCTYPE html>
<html>

<head>
    <title>New Personnel Form Submission</title>
</head>

<body style="color: black; font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">

    <h2 style="color: #2c3e50;">New Personnel Form Submitted</h2>

    <!-- Two-column layout for personal info -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px;"><strong>Date:</strong> {{ $data['date'] }}</td>
            <td style="padding: 8px;"><strong>Area Code:</strong> {{ $data['area_code'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><strong>Agent Name:</strong> {{ $data['agent_name'] }}</td>
            <td style="padding: 8px;"><strong>Partner Name:</strong> {{ $data['partner_name'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px;"><strong>Supervisor Name:</strong> {{ $data['supervisor_name'] }}</td>
            <td style="padding: 8px;"><strong>Manager Name:</strong> {{ $data['manager_name'] }}</td>
        </tr>
    </table>
    @php
        $color = $data['average_rating'] >= 7 ? 'green' : ($data['average_rating'] >= 4 ? 'orange' : 'red');
    @endphp

    <h1>Average Rating:
        <span style="font-weight: bold; color: {{ $color }};">
            {{ $data['average_rating'] }}
        </span>
    </h1>
    <p style="padding: 8px;"><strong>Comments and Remarks:</strong> {{ $data['comments'] }}</p>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <img src="https://i.imgur.com/LLLS3V2.png" alt="Logo" style="width: 100px; display: block;" />
            </td>
        </tr>
    </table>
    <p style="text-align: center; margin-top: 20px; font-size: 12px; color: #7f8c8d;">
        <em>This is an automated email. Please do not reply.</em>
    </p>


    <hr style="border: 1px solid #ddd; margin: 20px 0;">

    <!-- Two-column section for categories -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h3 style="color: #2980b9;">Personal Relation</h3>
                @php
                    $questions = [
                        'Spirit of Entrepreneurship',
                        'Relationship to Clients',
                        'Relationship with Partner',
                        'Relationship with Superior',
                    ];
                @endphp
                <ul>

                    @foreach (json_decode($data['personalrelation'], true) as $key => $value)
                        <li><span>{{ $questions[$key] }}:</span> <strong>{{ $value }}</strong></li>
                    @endforeach
                </ul>
            </td>

            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h3 style="color: #2980b9;">Grooming</h3>
                @php
                    $questions2 = ['Dress', 'Cleanliness', 'Neatness', 'Odor'];
                @endphp
                <ul>
                    @foreach (json_decode($data['grooming'], true) as $key => $value)
                        <li><span>{{ $questions2[$key] }}:</span> <strong>{{ $value }}</strong></li>
                    @endforeach
                </ul>
            </td>
        </tr>

        <tr>
            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h3 style="color: #2980b9;">Stocks and Concerns</h3>
                @php
                    $questions3 = [
                        'Product Knowledge',
                        'Booking Mastery',
                        'Cooperation with Partner',
                        'A/R Concerns and Safety',
                        'Account Receivable Keeping',
                        'Vehicle Maintenance',
                        'Vehicle Cleanliness',
                        'Vehicle Reporting',
                    ];
                @endphp
                <ul>
                    @foreach (json_decode($data['stocks'], true) as $key => $value)
                        <li><span>{{ $questions3[$key] }}:</span> <strong>{{ $value }}</strong></li>
                    @endforeach
                </ul>
            </td>

            <td style="vertical-align: top; padding: 10px; width: 50%;">
                <h3 style="color: #2980b9;">Expenses Management</h3>
                @php
                    $questions4 = [
                        'Meal Subsidy',
                        'Customers Snacks',
                        'Diesel Consumption',
                        'Lodging Expenses',
                        'Office Supplies',
                    ];
                @endphp
                <ul>
                    @foreach (json_decode($data['expenses'], true) as $key => $value)
                        <li><span>{{ $questions4[$key] }}:</span> <strong>{{ $value }}</strong></li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </table>


</body>

</html>
