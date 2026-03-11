<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #1e293b;
            background: #ffffff;
        }

        .header {
            background: #1d4ed8;
            color: #ffffff;
            padding: 32px 40px;
            margin-bottom: 32px;
        }

        .header h1 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .header p {
            font-size: 13px;
            opacity: 0.85;
        }

        .meta {
            margin-top: 16px;
            font-size: 12px;
        }

        .meta-item {
            margin-bottom: 6px;
        }

        .meta-item span {
            opacity: 0.75;
            font-size: 11px;
        }

        .meta-item strong {
            font-size: 13px;
        }

        .body {
            padding: 0 40px 40px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1d4ed8;
            border-bottom: 2px solid #dbeafe;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        .day {
            margin-bottom: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            page-break-inside: avoid;
        }

        .day-header {
            background: #f8fafc;
            padding: 12px 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .day-number {
            font-size: 11px;
            font-weight: 700;
            color: #1d4ed8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .day-title {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            margin-top: 2px;
        }

        .day-body {
            padding: 14px 16px;
        }

        .description {
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }

        .day-image {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            margin-bottom: 12px;
            border-radius: 4px;
        }

        .footer {
            margin-top: 40px;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            text-align: center;
            font-size: 11px;
            color: #94a3b8;
        }

        .footer strong {
            color: #475569;
        }
    </style>
</head>

<body>

    @php
        // Normalize context — works whether called from booking or package
        $packageName = $booking->package_name ?? $package->name;
        $subtitle = isset($booking) ? 'Detailed Itinerary — Booking Confirmation' : 'Detailed Day-by-Day Itinerary';
        $reference = $booking->booking_reference ?? null;
        $departureDate = isset($booking)
            ? \Carbon\Carbon::parse($booking->departure_start_date)->format('d M Y')
            : null;
        $numTravelers = $booking->num_travelers ?? null;
    @endphp

    <div class="header">
        <h1>{{ $packageName }}</h1>
        <p>{{ $subtitle }}</p>
        <div class="meta">
            @if ($reference)
                <div class="meta-item">
                    <span>Booking Reference</span>
                    <strong>#{{ $reference }}</strong>
                </div>
            @endif
            @if ($departureDate)
                <div class="meta-item">
                    <span>Departure Date</span>
                    <strong>{{ $departureDate }}</strong>
                </div>
            @endif
            @if ($numTravelers)
                <div class="meta-item">
                    <span>Travellers</span>
                    <strong>{{ $numTravelers }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="body">
        <div class="section-title">Day-by-Day Itinerary</div>



        @foreach ($itineraries as $day)
            <div class="day">
                <div class="day-header">
                    <div class="day-number">Day {{ $day->day_number }}</div>
                    <div class="day-title">{{ $day->title }}</div>
                </div>
                <div class="day-body">
                    @if ($day->image)
                        @php
                            $imgPath = storage_path('app/public/' . $day->image);
                            $imgType = pathinfo($imgPath, PATHINFO_EXTENSION);
                            $imgData = file_exists($imgPath) ? base64_encode(file_get_contents($imgPath)) : null;
                        @endphp
                        @if ($imgData)
                            <img class="day-image" src="data:image/{{ $imgType }};base64,{{ $imgData }}" />
                        @endif
                    @endif

                    {{-- @php

                        dd($day->images);
                    @endphp --}}

                    {{-- Polymorphic images --}}
                    @if ($day->images->isNotEmpty())
                            {{--  fix this; should be in grid: 3 images per row. gap -2 between images --}}
                        <div class="day-images">
                            @foreach ($day->images as $image)
                                @php
                                    $imgPath = storage_path('app/private/' . $image->image_url);
                                    $imgType = pathinfo($imgPath, PATHINFO_EXTENSION);
                                    $imgData = file_exists($imgPath)
                                        ? base64_encode(file_get_contents($imgPath))
                                        : null;
                                @endphp
                                @if ($imgData)
                                    <img class="day-image"
                                        src="data:image/{{ $imgType }};base64,{{ $imgData }}"
                                        alt="{{ $image->alt ?? $day->title }}" />
                                @endif
                            @endforeach
                        </div>
                    @endif

                    <div class="description">
                        {!! strip_tags($day->description, '<b><strong><em><ul><li><p><br>') !!}
                    </div>

                    @if ($day->extra_notes)
                        <p style="margin-top: 10px; font-size: 12px; color: #94a3b8; font-style: italic;">
                            📝 {{ $day->extra_notes }}
                        </p>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="footer">
            <p>Thank you for choosing <strong>Royal Himalayan Footprints</strong>.</p>
            <p>For assistance: <strong>info@royalhimalayanfootprints.com</strong></p>
        </div>
    </div>

</body>

</html>
