<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $order->order_no }} - Measurement Print</title>

<style>
* {
    box-sizing: border-box;
}

html,
body {
    margin: 0;
    padding: 0;
    background: #eeeeee;
    color: #111111;
    font-family: Arial, "Noto Sans Tamil", sans-serif;
}

/* =========================================================
   TOOLBAR
========================================================= */

.toolbar {
    width: 148mm;
    margin: 12px auto;
    display: flex;
    justify-content: flex-end;
}

.print-button {
    border: 0;
    padding: 8px 16px;
    background: #222222;
    color: #ffffff;
    font-size: 12px;
    cursor: pointer;
}

/* =========================================================
   A5 PAGE
   Height is NOT fixed.
   Content determines the required height.
========================================================= */

.a5-page {
    width: 148mm;
    margin: 0 auto 20px;
    padding: 9mm 8mm 7mm;
    background: #ffffff;
}

/* =========================================================
   HEADER
========================================================= */

.job-header {
    width: 100%;
    border-bottom: 1px solid #111111;
    padding-bottom: 4px;
    margin-bottom: 5px;
}

.job-header-left {
    display: flex;
    align-items: center;
    gap: 5px;
    white-space: nowrap;
}

.item-no {
    font-size: 12px;
    font-weight: 700;
}

.order-no {
    font-size: 9px;
}

.item-type {
    font-size: 10px;
    font-weight: 700;
}

.separator {
    font-size: 9px;
    color: #555555;
}

/* =========================================================
   CUSTOMER INFORMATION
========================================================= */

.info-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 5px;
    font-size: 9px;
}

.info-table td {
    border: 1px solid #111111;
    padding: 3px 4px;
    vertical-align: middle;
}

.info-label {
    width: 16%;
    font-weight: 700;
}

.info-value {
    width: 34%;
}

/* =========================================================
   WORK AREA
   NO HEIGHT IS SET HERE.

   The measurement table determines the height naturally.
   Notes stretches to exactly the same height using flex.
========================================================= */

.work-area {
    width: 100%;
    display: flex;
    align-items: stretch;
    border: 1px solid #111111;
}

/* =========================================================
   MEASUREMENT SIDE
========================================================= */

.measurement-side {
    width: 75%;
    flex: 0 0 75%;
}

/* =========================================================
   MEASUREMENT TABLE
   Natural/content-based row height.
========================================================= */

.measurement-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
    font-size: 8px;
}

.measurement-table td {
    width: 25%;
    border-right: 1px solid #111111;
    border-bottom: 1px solid #111111;
    padding: 0;
    text-align: center;
    vertical-align: middle;
}

.measurement-table td:last-child {
    border-right: 0;
}

/* Remove bottom border because work-area supplies it */
.measurement-table tr:last-child td {
    border-bottom: 1px solid #111111;
}

.measurement-name {
    padding: 3px 2px 2px;
    font-size: 7.5px;
    font-weight: 600;
    line-height: 1.1;
    word-break: break-word;
}

.measurement-value {
    padding: 3px 2px 4px;
    font-size: 10px;
    line-height: 1.1;
}

.measurement-empty {
    padding: 7px 2px;
}

/* =========================================================
   NOTES SIDE
   Separate DIV.
   No height is specified.
   Flex stretch makes it exactly as tall as measurements.
========================================================= */

.notes-side {
    width: 25%;
    flex: 0 0 25%;
    border-left: 1px solid #111111;
    padding: 4px;
    align-self: stretch;
}

.notes-heading {
    text-align: center;
    font-size: 8px;
    font-weight: 700;
    border-bottom: 1px solid #111111;
    padding: 0 0 4px;
    margin: 0 0 5px;
}

.notes-content {
    font-size: 8px;
    line-height: 1.25;
    text-align: left;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

/* =========================================================
   FOOTER
========================================================= */

.footer {
    margin-top: 5px;
    display: flex;
    justify-content: space-between;
    font-size: 7px;
}

/* =========================================================
   PRINT
========================================================= */

@page {
    size: A5 portrait;
    margin: 0;
}

@media print {

    html,
    body {
        width: 148mm;
        background: #ffffff;
    }

    .no-print {
        display: none !important;
    }

    .a5-page {
        width: 148mm;
        margin: 0;
        padding: 9mm 8mm 7mm;
        background: #ffffff;
        page-break-after: always;
        break-after: page;
    }

    .a5-page:last-child {
        page-break-after: auto;
        break-after: auto;
    }

    .work-area {
        page-break-inside: avoid;
        break-inside: avoid;
    }
}
</style>
</head>

<body>

<div class="toolbar no-print">
    <button
        type="button"
        class="print-button"
        onclick="window.print()">
        Print A5
    </button>
</div>

@foreach($order->items as $item)

@php
    $measurements = $item->measurements;

    if (is_string($measurements)) {
        $measurements = json_decode($measurements, true) ?? [];
    }

    $measurements = is_array($measurements)
        ? array_values($measurements)
        : [];
@endphp

<div class="a5-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="job-header">

        <div class="job-header-left">

            <span class="item-no">
                {{ $item->item_no }}
            </span>

            <span class="separator">|</span>

            <span class="order-no">
                Order: {{ $order->order_no }}
            </span>

            <span class="separator">|</span>

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
                    ?? '-' }}
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

        <tr>
            <td class="info-label">
                Order Date
            </td>

            <td class="info-value">
                {{ $order->order_date
                    ? \Carbon\Carbon::parse($order->order_date)->format('d-m-Y')
                    : '-' }}
            </td>

            <td class="info-label">
                Delivery Date
            </td>

            <td class="info-value">
                {{ $order->delivery_date
                    ? \Carbon\Carbon::parse($order->delivery_date)->format('d-m-Y')
                    : '-' }}
            </td>
        </tr>

    </table>


    {{-- =====================================================
         MEASUREMENTS + NOTES

         IMPORTANT:
         There is NO fixed height.
         Measurement rows determine the height.
         Notes automatically stretches to that height.
    ====================================================== --}}

    <div class="work-area">

        {{-- =================================================
             LEFT: MEASUREMENTS
        ================================================== --}}

        <div class="measurement-side">

            <table class="measurement-table">

                <tbody>

                @if(count($measurements) > 0)

                    @foreach(array_chunk($measurements, 4) as $measurementRow)

                        <tr>

                            @foreach($measurementRow as $measurement)

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
                                $i < 4;
                                $i++
                            )

                                <td>
                                    <div class="measurement-empty">
                                        &nbsp;
                                    </div>
                                </td>

                            @endfor

                        </tr>

                    @endforeach

                @else

                    <tr>

                        <td colspan="4">

                            <div class="measurement-empty">
                                No measurements available
                            </div>

                        </td>

                    </tr>

                @endif

                </tbody>

            </table>

        </div>


        {{-- =================================================
             RIGHT: NOTES
             Completely separate DIV.
        ================================================== --}}

        <div class="notes-side">

            <div class="notes-heading">
                Notes
            </div>

            <div class="notes-content">

                @if(!empty($item->notes))

                    {!! nl2br(e($item->notes)) !!}

                @else

                    &nbsp;

                @endif

            </div>

        </div>

    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="footer">

        <span>
            {{ $order->order_no }} / {{ $item->item_no }}
        </span>

        <span>
            {{ $item->type?->type ?? '-' }}
        </span>

    </div>

</div>

@endforeach

</body>
</html>
