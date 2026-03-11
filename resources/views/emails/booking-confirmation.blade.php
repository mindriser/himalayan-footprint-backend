<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
</head>
<body style="font-family: sans-serif; color: #1e293b; padding: 32px;">

    <h2>Booking Confirmed 🎉</h2>
    <p>Dear {{ $booking->full_name ?? 'Traveller' }},</p>

    <p>Your booking has been confirmed. Please find your itinerary attached as a PDF.</p>

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
            <td style="padding: 8px; color: #64748b;">Departure Date</td>
            <td style="padding: 8px;">{{ \Carbon\Carbon::parse($booking->departure_start_date)->format('d M Y') }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Travellers</td>
            <td style="padding: 8px;">{{ $booking->num_travelers }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; color: #64748b;">Total Price</td>
            <td style="padding: 8px;"><strong>{{ $booking->currency }} {{ number_format($booking->total_price, 2) }}</strong></td>
        </tr>
    </table>


    // attach iternaries here as well.
    either in pdf attached to mail
    


    <p style="margin-top: 32px; color: #64748b; font-size: 13px;">
        For any assistance, contact us at <a href="mailto:info@royalhimalayanfootprints.com">info@royalhimalayanfootprints.com</a>
    </p>

    <p style="margin-top: 8px; color: #94a3b8; font-size: 12px;">
        Royal Himalayan Footprints
    </p>

</body>
</html>
