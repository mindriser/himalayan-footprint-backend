<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #1a1a2e;
        }

        h3 {
            color: #444;
            border-bottom: 1px solid #ddd;
            padding-bottom: 4px;
            margin-top: 24px;
        }

        p {
            margin: 6px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 8px;
        }

        th {
            background: #f4f4f4;
            text-align: left;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background: #fafafa;
        }

        .warning-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 12px 16px;
            margin: 16px 0;
            color: #856404;
        }

        .info-box {
            background: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 12px 16px;
            margin: 16px 0;
            color: #0c5460;
        }

        .badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-green {
            background: #d4edda;
            color: #155724;
        }

        .badge-yellow {
            background: #fff3cd;
            color: #856404;
        }

        .badge-red {
            background: #f8d7da;
            color: #721c24;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 24px;
            background: #4f46e5;
            color: #fff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        hr {
            border: none;
            border-top: 1px solid #eee;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <h2>🧾 New Booking Received</h2>
    <p><strong>Reference:</strong> {{ $booking->booking_reference }}</p>

    @php
        $projectedOccupancy = $departure->current_occupancy + $booking->num_travelers;
        $isOverCapacity = $projectedOccupancy > $departure->max_capacity;
        $isNearCapacity =
            !$isOverCapacity && $departure->max_capacity > 0 && $projectedOccupancy / $departure->max_capacity >= 0.9;
    @endphp

    @if ($isOverCapacity)
        <div class="warning-box">
            ⚠️ <strong>Occupancy Exceeded!</strong><br>
            This booking pushes occupancy to <strong>{{ $projectedOccupancy }} / {{ $departure->max_capacity }}</strong>
            — over the limit by <strong>{{ $projectedOccupancy - $departure->max_capacity }}</strong> seat(s).
            Please review before confirming.
        </div>
    @elseif ($isNearCapacity)
        <div class="info-box">
            ℹ️ <strong>Almost Full:</strong>
            Departure will be at <strong>{{ $projectedOccupancy }} / {{ $departure->max_capacity }}</strong> seats after
            this booking (≥90% capacity).
        </div>
    @endif

    <hr>

    <h3>Booking Details</h3>
    <p><strong>Package:</strong> {{ $booking->package_name }}</p>
    <p><strong>Departure:</strong> {{ $booking->departure_start_date }} → {{ $booking->departure_end_date }}</p>
    <p><strong>Capacity:</strong>
        {{ $departure->current_occupancy }} occupied +
        {{ $booking->num_travelers }} new =
        <strong>{{ $projectedOccupancy }} / {{ $departure->max_capacity }}</strong>
    </p>
    <p><strong>Total Price:</strong> {{ $booking->total_price }}</p>
    <p>
        <strong>Booking Status:</strong>
        @php
            $bookingBadge = match ($booking->booking_status) {
                'confirmed' => 'badge-green',
                'pending' => 'badge-yellow',
                default => 'badge-red',
            };
        @endphp
        <span class="badge {{ $bookingBadge }}">{{ ucfirst($booking->booking_status) }}</span>
    </p>
    <p>
        <strong>Payment Status:</strong>
        @php
            $paymentBadge = match ($booking->payment_status) {
                'paid' => 'badge-green',
                'pending' => 'badge-yellow',
                default => 'badge-red',
            };
        @endphp
        <span class="badge {{ $paymentBadge }}">{{ ucfirst($booking->payment_status) }}</span>
    </p>

    <hr>

    <h3>Special Request</h3>
    <p>{{ $booking->special_request ?? 'N/A' }}</p>

    <hr>

    <h3>All Travellers ({{ $booking->members->count() }})</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Nationality</th>
                <th>Passport No.</th>
                <th>Lead</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($booking->members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->full_name }}</td>
                    <td>{{ $member->gender ?? '-' }}</td>
                    <td>{{ $member->age ?? '-' }}</td>
                    <td>{{ $member->nationality ?? '-' }}</td>
                    <td>{{ $member->passport_number ?? '-' }}</td>
                    <td>{{ $member->is_lead_member ? '✅ Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/admin/bookings/' . $booking->id . '/edit') }}" class="btn">
        View in Admin Panel →
    </a>

</body>

</html>
