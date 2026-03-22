<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
</head>

<body style="font-family: sans-serif; color: #1e293b; padding: 32px;">

    <h2>Booking Confirmed 🎉</h2>

    <p>Dear {{ $booking->full_name ?? 'Traveller' }},</p>

    <p>
        Your booking has been successfully confirmed. Please find your itinerary attached as a PDF.
    </p>

    <table style="margin-top: 24px; width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px; color: #64748b;">Booking Reference</td>
            <td style="padding: 8px;"><strong>{{ $booking->booking_reference }}</strong></td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Package</td>
            <td style="padding: 8px;">{{ $booking->package_name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Departure Start Date</td>
            <td style="padding: 8px;">
                {{ \Carbon\Carbon::parse($booking->departure_start_date)->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Departure End Date</td>
            <td style="padding: 8px;">
                {{ \Carbon\Carbon::parse($booking->departure_end_date)->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Number of Travellers</td>
            <td style="padding: 8px;">{{ $booking->num_travelers }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Total Price</td>
            <td style="padding: 8px;">
                <strong>${{ number_format($booking->total_price, 2) }}</strong>
            </td>
        </tr>
    </table>

    <p style="margin-top: 32px; color: #64748b; font-size: 13px;">
        For any assistance, feel free to reply to this email or contact us at
        <a href="mailto:{{ config('mail.from.address') }}">
            {{ config('mail.from.address') }}
        </a>.
    </p>

    <p style="margin-top: 16px; color: #94a3b8; font-size: 12px;">
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </p>

</body>

</html>
