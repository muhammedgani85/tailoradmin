<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        {{ $order->order_no }} - Measurement Print
    </title>

    <style>

        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
        }


        /* =========================================================
           SCREEN
        ========================================================= */

        body {
            margin: 0;
            padding: 20px;

            background: #f3f4f6;

            font-family:
                Arial,
                "Noto Sans Tamil",
                sans-serif;

            color: #111827;
        }


        /* =========================================================
           PRINT TOOLBAR
        ========================================================= */

        .toolbar {
            width: 148mm;

            margin: 0 auto 15px auto;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .toolbar-title {
            font-size: 13px;

            font-weight: 600;

            color: #374151;
        }


        .print-button {
            border: 0;

            border-radius: 6px;

            padding: 8px 16px;

            background: #2563eb;

            color: #ffffff;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;
        }


        .print-button:hover {
            background: #1d4ed8;
        }


        /* =========================================================
           A5 PAGE
        ========================================================= */

        .a5-page {
            width: 148mm;

            min-height: 210mm;

            margin: 0 auto 20px auto;

            padding: 8mm;

            background: #ffffff;

            box-shadow:
                0 1px 5px rgba(0, 0, 0, 0.15);

            position: relative;
        }


        /* =========================================================
           COMPACT HEADER
        ========================================================= */

        .job-header {
            display: flex;

            align-items: center;

            width: 100%;

            border-bottom: 1px solid #111827;

            padding-bottom: 5px;

            margin-bottom: 7px;
        }


        .job-header-left {
            display: flex;

            align-items: center;

            gap: 6px;

            width: 100%;

            white-space: nowrap;
        }


        .item-no {
            font-size: 13px;

            font-weight: 700;

            color: #111827;
        }


        .order-no {
            font-size: 10px;

            font-weight: 500;

            color: #4b5563;
        }


        .item-type {
            font-size: 11px;

            font-weight: 700;

            color: #111827;

            text-transform: uppercase;
        }


        .separator {
            font-size: 10px;

            color: #9ca3af;
        }


        /* =========================================================
           CUSTOMER / ORDER INFORMATION
        ========================================================= */

        .info-table {
            width: 100%;

            border-collapse: collapse;

            margin-bottom: 8px;

            font-size: 10px;
        }


        .info-table td {
            border: 1px solid #d1d5db;

            padding: 4px 5px;

            vertical-align: middle;
        }


        .info-label {
            width: 20%;

            background: #f3f4f6;

            font-weight: 700;
        }


        .info-value {
            width: 30%;

            font-weight: 500;
        }


        /* =========================================================
           SECTION TITLE
        ========================================================= */

        .section-title {
            background: #e5e7eb;

            border: 1px solid #9ca3af;

            padding: 4px 6px;

            margin-top: 7px;

            font-size: 11px;

            font-weight: 700;
        }


        /* =========================================================
           MEASUREMENT TABLE
        ========================================================= */

        .measurement-table {
            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

            font-size: 10px;
        }


        .measurement-table td {
            width: 20%;

            border: 1px solid #9ca3af;

            vertical-align: top;

            padding: 0;
        }


        .measurement-name {
            min-height: 22px;

            padding: 4px 2px;

            background: #f3f4f6;

            border-bottom: 1px solid #9ca3af;

            text-align: center;

            font-size: 9px;

            font-weight: 600;

            word-break: break-word;
        }


        .measurement-value {
            min-height: 26px;

            padding: 5px 2px;

            text-align: center;

            font-size: 12px;

            font-weight: 700;
        }


        /* =========================================================
           NOTES
        ========================================================= */

        .notes {
            min-height: 35px;

            border: 1px solid #9ca3af;

            border-top: 0;

            padding: 6px;

            font-size: 10px;

            line-height: 1.4;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            margin-top: 8px;

            display: flex;

            justify-content: space-between;

            font-size: 8px;

            color: #6b7280;
        }


        /* =========================================================
           PRINT SETTINGS
        ========================================================= */

        @page {
            size: A5 portrait;

            margin: 0;
        }


        @media print {

            html,
            body {
                width: 148mm;

                margin: 0 !important;

                padding: 0 !important;

                background: #ffffff !important;
            }


            .no-print {
                display: none !important;
            }


            .a5-page {
                width: 148mm;

                height: 210mm;

                min-height: 210mm;

                margin: 0 !important;

                padding: 8mm;

                box-shadow: none;

                overflow: hidden;

                page-break-after: always;

                break-after: page;
            }


            .a5-page:last-child {
                page-break-after: auto;

                break-after: auto;
            }


            table,
            tr,
            td {
                page-break-inside: avoid;

                break-inside: avoid;
            }

        }

    </style>

</head>


<body>


{{-- ============================================================
     PRINT TOOLBAR
============================================================ --}}

<div class="toolbar no-print">

    <div class="toolbar-title">

        {{ $order->order_no }}

        — A5 Measurement Sheet

    </div>


    <button
        type="button"
        onclick="window.print()"
        class="print-button">

        Print A5

    </button>

</div>



{{-- ============================================================
     EACH ORDER ITEM = ONE A5 PAGE
============================================================ --}}

@foreach($order->items as $item)


    @php

        $measurements = $item->measurements;


        if (is_string($measurements)) {

            $measurements =
                json_decode(
                    $measurements,
                    true
                ) ?? [];

        }


        $measurements =
            is_array($measurements)
                ? array_values($measurements)
                : [];

    @endphp



    {{-- =========================================================
         A5 PAGE
    ========================================================== --}}

    <div class="a5-page">


        {{-- =====================================================
             COMPACT HEADER
        ====================================================== --}}

        <div class="job-header">

            <div class="job-header-left">

                <span class="item-no">
                    {{ $item->item_no }}
                </span>


                <span class="separator">
                    |
                </span>


                <span class="order-no">
                    Order: {{ $order->order_no }}
                </span>


                <span class="separator">
                    |
                </span>


                <span class="item-type">
                    {{ $item->type?->type ?? '-' }}
                </span>

            </div>

        </div>



        {{-- =====================================================
             CUSTOMER INFORMATION
        ====================================================== --}}

        <table class="info-table">

            <tr>

                <td class="info-label">
                    Customer
                </td>

                <td class="info-value">

                    {{ $order->customer?->name ?? '-' }}

                </td>


                <td class="info-label">
                    Phone
                </td>

                <td class="info-value">

                    {{ $order->customer?->phone
                        ?? $order->phone
                        ?? '-'
                    }}

                </td>

            </tr>


            <tr>

                <td class="info-label">
                    Quantity
                </td>

                <td class="info-value">

                    {{ $item->qty ?? 1 }}

                </td>


                <td class="info-label">
                    Item Type
                </td>

                <td class="info-value">

                    {{ $item->type?->type ?? '-' }}

                </td>

            </tr>

        </table>



        {{-- =====================================================
             MEASUREMENTS
        ====================================================== --}}

        <div class="section-title">

            Measurements

        </div>


        @if(count($measurements) > 0)

            <table class="measurement-table">

                <tbody>

                @foreach(
                    array_chunk($measurements, 5)
                    as $measurementRow
                )

                    <tr>

                        @foreach(
                            $measurementRow
                            as $measurement
                        )

                            <td>

                                <div class="measurement-name">

                                    {{ $measurement['name'] ?? '-' }}

                                </div>


                                <div class="measurement-value">

                                    {{ $measurement['value'] ?? '' }}

                                </div>

                            </td>

                        @endforeach


                        @for(
                            $i = count($measurementRow);
                            $i < 5;
                            $i++
                        )

                            <td>

                                <div class="measurement-name">
                                    &nbsp;
                                </div>

                                <div class="measurement-value">
                                    &nbsp;
                                </div>

                            </td>

                        @endfor

                    </tr>

                @endforeach

                </tbody>

            </table>

        @else

            <div class="notes">

                No measurements available.

            </div>

        @endif



        {{-- =====================================================
             NOTES
        ====================================================== --}}

        <div class="section-title">

            Notes

        </div>


        <div class="notes">

            @if(!empty($item->notes))

                {!! nl2br(e($item->notes)) !!}

            @else

                &nbsp;

            @endif

        </div>



        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <div class="footer">

            <span>

                {{ $order->order_no }}

                /

                {{ $item->item_no }}

            </span>


            <span>

                {{ now()->format('d-m-Y H:i') }}

            </span>

        </div>


    </div>


@endforeach



</body>

</html>
