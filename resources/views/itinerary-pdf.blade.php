<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <style>
        :root {
            --primary: #006aab;
            --primary-dark: #064b74;
        }

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

        /* ── Cover Header ───────────────────────────────────────────── */
        .header {
            background: #0f172a;
            color: #ffffff;
            padding: 40px 48px 36px;
            position: relative;
        }

        .header-accent {
            width: 48px;
            height: 4px;
            background: #3b82f6;
            border-radius: 2px;
            margin-bottom: 16px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
            line-height: 1.2;
        }

        .header .subtitle {
            font-size: 12px;
            color: #94a3b8;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* ── Meta pills ─────────────────────────────────────────────── */
        .meta-bar {
            display: block;
            background: #1e293b;
            padding: 16px 48px;
            margin-bottom: 0;
        }

        .meta-table {
            width: 100%;
            border-collapse: collapse;
        }

        .meta-table td {
            padding: 0 24px 0 0;
            vertical-align: top;
        }

        .meta-label {
            font-size: 10px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            display: block;
            margin-bottom: 2px;
        }

        .meta-value {
            font-size: 13px;
            font-weight: 700;
            color: #f1f5f9;
        }

        /* ── Divider ─────────────────────────────────────────────────── */
        .divider {
            height: 4px;
            background: #3b82f6;
            margin-bottom: 36px;
        }

        /* ── Body ────────────────────────────────────────────────────── */
        .body {
            padding: 0 48px 48px;
        }

        .section-title {
            font-size: 11px;
            font-weight: 700;
            color: #3b82f6;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
        }

        /* ── Day card ────────────────────────────────────────────────── */
        .day {
            margin-bottom: 24px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            overflow: hidden;
            page-break-inside: avoid;
        }

        .day-header {
            background: #f8fafc;
            padding: 14px 20px;
            border-bottom: 1px solid #e2e8f0;
            /* table trick for side-by-side in dompdf */
            display: block;
        }

        .day-header-inner {
            width: 100%;
            border-collapse: collapse;
        }

        .day-header-inner td {
            vertical-align: middle;
            padding: 0;
        }

        .day-badge-cell {
            width: 52px;
        }

        .day-badge {
            width: 44px;
            height: 44px;
            background: var(--primary);
            border-radius: 4px;
            text-align: center;
            padding-top: 6px;
        }

        .day-badge .day-label {
            font-size: 8px;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }

        .day-badge .day-num {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1;
            display: block;
        }

        .day-title-cell {
            padding-left: 14px;
        }

        .day-title {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        /* ── Day body ────────────────────────────────────────────────── */
        .day-body {
            padding: 16px 20px;
        }

        .description {
            font-size: 12.5px;
            line-height: 1.8;
            color: #475569;
            padding-left: 2rem;
        }

        .extra-notes {
            margin-top: 12px;
            padding: 10px 14px;
            background: #f8fafc;
            border-left: 3px solid #3b82f6;
            font-size: 12px;
            color: #64748b;
            font-style: italic;
            border-radius: 0 4px 4px 0;
        }

        /* ── Images grid (table-based for DomPDF) ───────────────────── */
        .images-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 6px 6px;
            margin-bottom: 14px;
        }

        .img-cell img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            display: block;
        }

        /* ── Footer ──────────────────────────────────────────────────── */
        .footer {
            margin-top: 48px;
            padding: 24px 48px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            text-align: center;
        }

        .footer-logo {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .footer-contact {
            font-size: 11px;
            color: #94a3b8;
        }

        .footer-contact a {
            color: #3b82f6;
            text-decoration: none;
        }

        .page-number {
            font-size: 10px;
            color: #cbd5e1;
            margin-top: 8px;
        }
    </style>
</head>

<body>

    @php

        $packageName = $booking->package_name ?? $package->title;
        $subtitle = isset($booking) ? 'Booking Confirmation — Itinerary' : 'Day By Day Itinerary';
        $reference = $booking->booking_reference ?? null;
        $departureDate = isset($booking)
            ? \Carbon\Carbon::parse($booking->departure_start_date)->format('d M Y')
            : null;
        $numTravelers = $booking->num_travelers ?? null;
    @endphp

    {{-- ── Header ── --}}
    <div class="header">
        <div class="header-accent"></div>
        <h1>{{ $packageName }}</h1>
        <div class="subtitle">{{ $subtitle }}</div>
    </div>

    {{-- ── Meta bar (only if booking context) ── --}}
    @if ($reference || $departureDate || $numTravelers)
        <div class="meta-bar">
            <table class="meta-table">
                <tr>
                    @if ($reference)
                        <td>
                            <span class="meta-label">Booking Ref</span>
                            <span class="meta-value">#{{ $reference }}</span>
                        </td>
                    @endif
                    @if ($departureDate)
                        <td>
                            <span class="meta-label">Departure</span>
                            <span class="meta-value">{{ $departureDate }}</span>
                        </td>
                    @endif
                    @if ($numTravelers)
                        <td>
                            <span class="meta-label">Travellers</span>
                            <span class="meta-value">{{ $numTravelers }}</span>
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    @endif

    <div class="divider"></div>

    {{-- ── Body ── --}}
    <div class="body">
        @foreach ($itineraries as $day)
            <div class="day">

                {{-- Day header --}}
                <div class="day-header">
                    <table class="day-header-inner">
                        <tr>
                            <td class="day-badge-cell">
                                <div class="day-badge">
                                    <span class="day-label">Day</span>
                                    <span class="day-num">{{ $day->day_number }}</span>
                                </div>
                            </td>
                            <td class="day-title-cell">
                                <div class="day-title">{{ $day->title }}</div>
                            </td>
                        </tr>
                    </table>
                </div>



                {{-- Day body --}}
                <div class="day-body">

                    {{-- Images: 2 per row using table --}}
                    @if ($day->processedImages->isNotEmpty())
                        @php $chunks = $day->processedImages->chunk(2); @endphp
                        @foreach ($chunks as $row)
                            <table class="images-table">
                                <tr>
                                    @foreach ($row as $image)
                                        <td class="img-cell" style="width: 50%;">
                                            <img src="data:image/jpeg;base64,{{ $image['data'] }}"
                                                alt="{{ $image['alt'] }}" />
                                        </td>
                                    @endforeach
                                    @for ($i = $row->count(); $i < 2; $i++)
                                        <td style="width: 50%;"></td>
                                    @endfor
                                </tr>
                            </table>
                        @endforeach
                    @endif


                    <div class="description">
                        {!! strip_tags($day->description, '<b><strong><em><ul><li><p><br>') !!}
                    </div>

                    {{-- Extra notes --}}
                    @if ($day->extra_notes)
                        <div class="extra-notes">
                            {{ $day->extra_notes }}
                        </div>
                    @endif

                </div>
            </div>
        @endforeach
    </div>

    {{-- ── Footer ── --}}
    <div class="footer">
        <div class="footer-logo">{{ config('app.name') }}</div>
        @php
            $packageUrl = config('app.client_url') . '/destination/' . $package->category->slug . '/' . $package->slug;
        @endphp

        <div class="footer-contact">
            For more info visit
            <a href="{{ $packageUrl }}">{{ $packageUrl }}</a>
        </div>
    </div>

</body>

</html>
