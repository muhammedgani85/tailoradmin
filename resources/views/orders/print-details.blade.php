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







\\========================================================= */















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







    font-size: 14px;







    cursor: pointer;







}















/* =========================================================







   A5 PAGE







   Height is NOT fixed.







   Content determines the required height.







\\========================================================= */















.a5-page {







    width: 148mm;

    max-width: 148mm;

    margin: 0 auto 20px;







    padding: 9mm 8mm 7mm;







    background: #ffffff;







}















/* =========================================================







   HEADER







\\========================================================= */















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







\\========================================================= */















.info-table {







    width: 100%;







    border-collapse: collapse;







    margin-bottom: 5px;







    font-size: 11px;







}















.info-table td {







    border: 1px solid #111111;







    padding: 4px 5px;







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







\\========================================================= */















.work-area {







    width: 100%;







    display: flex;







    align-items: stretch;







    border: 1px solid #111111;







}















/* =========================================================







   MEASUREMENT SIDE







\\========================================================= */















.measurement-side {

    width: 65%;

    flex: 0 0 65%;

    min-width: 0;







}















/* =========================================================







   MEASUREMENT TABLE







   Natural/content-based row height.







\\========================================================= */















.measurement-table {

    width: 100%;

    max-width: 100%;







    border-collapse: collapse;







    table-layout: fixed;







    font-size: 8px;







}















.measurement-table td {







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







    font-size: 9px;







    font-weight: 600;







    line-height: 1.1;







    word-break: break-word;







}















.measurement-value {







    padding: 3px 2px 4px;







    font-size: 13px;
    font-weight: bold;







    line-height: 1.1;







}



















.body-loose-table { width: 100%; border-collapse: collapse; table-layout: fixed; font-size: 10px; }

.body-loose-table th,

.body-loose-table td { width: 33.3333%; border-right: 1px solid #111111; border-bottom: 1px solid #111111; padding: 3px 2px; text-align: center; vertical-align: top; }

.body-loose-table th { font-size: 10px; font-weight: 700; letter-spacing: 0.3px; }

.body-loose-table .body-loose-title { font-size: 10px; font-weight: 700; }

.body-loose-table .body-loose-col-head { font-size: 8px; font-weight: 700; line-height: 1.15; word-break: break-word; }

.body-loose-table td:last-child,

.body-loose-table th:last-child { border-right: 0; }

.body-loose-table tr:last-child td { border-bottom: 0; }

.body-loose-row > td { padding: 0 !important; }















/* =========================================================







   NOTES SIDE







   Separate DIV.







   No height is specified.







   Flex stretch makes it exactly as tall as measurements.







\\========================================================= */















.notes-side {

    width: 35%;

    flex: 0 0 35%;

    min-width: 0;







    border-left: 1px solid #111111;







    padding: 4px;







    align-self: stretch;



    vertical-align: top;



    text-align: left;



}















.notes-heading {







    text-align: left;







    font-size: 8px;







    font-weight: 700;







    border-bottom: 1px solid #111111;







    padding: 0 0 4px;







    margin: 0 0 5px;







}















.notes-content {







    font-size: 10px;







    line-height: 1.3;







    text-align: left;







    white-space: pre-wrap;







    overflow-wrap: anywhere;







}















/* =========================================================







   FOOTER







\\========================================================= */















.footer {







    margin-top: 5px;







    display: flex;







    justify-content: space-between;







    font-size: 7px;







}















/* =========================================================







   PRINT







\\========================================================= */















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







    $rawMeasurements = $item->measurements;



    if (is_string($rawMeasurements)) {

        $rawMeasurements = json_decode($rawMeasurements, true) ?? [];

    }



    $rawMeasurements = is_array($rawMeasurements) ? $rawMeasurements : [];



    $measurementIds = [];

    foreach ($rawMeasurements as $measurementKey => $measurement) {

        if (is_numeric($measurementKey)) {

            $measurementIds[] = (int) $measurementKey;

        }

        if (is_array($measurement) && isset($measurement['id']) && is_numeric($measurement['id'])) {

            $measurementIds[] = (int) $measurement['id'];

        }

    }



    $measurementMasters = \App\Models\Measurement::whereIn('id', array_unique($measurementIds))

        ->get()

        ->keyBy('id');



    $measurements = [];

    foreach ($rawMeasurements as $measurementKey => $measurement) {

        if (!is_array($measurement)) {

            $measurement = ['value' => $measurement];

        }



        $measurementId = is_numeric($measurementKey)

            ? (int) $measurementKey

            : (int) ($measurement['id'] ?? 0);

        $master = $measurementId ? ($measurementMasters[$measurementId] ?? null) : null;



        $measurements[] = [

            'id' => $measurementId,

            'field_name' => trim((string) ($master->field_name ?? ($measurement['field_name'] ?? ''))),

            'name' => trim((string) ($master->display_name ?? ($measurement['display_name'] ?? ($measurement['name'] ?? '')))),

            'value' => $measurement['value'] ?? '',

        ];

    }



    // Group these exact field_name keys in the BODY LOOSE box.
    $bodyLooseFieldOrder = [
        'full', 'fbody', 'floose',
        'front', 'front_thadu', 'front_loose',
        'back', 'back_thadu', 'back_loose',
    ];

    $normalizeFieldName = function ($name) {
        $name = mb_strtolower(trim((string) $name), 'UTF-8');
        return preg_replace('/\\s+/u', '_', $name);
    };

    $specialMeasurements = [];
    foreach ($measurements as $measurement) {
        $fieldKey = $normalizeFieldName($measurement['field_name'] ?? '');
        if (in_array($fieldKey, $bodyLooseFieldOrder, true)) {
            $specialMeasurements[$fieldKey] = $measurement;
        }
    }

    $measurementBlocks = [];
    $regularBuffer = [];

    $flushRegularBuffer = function () use (&$measurementBlocks, &$regularBuffer) {
        if (!empty($regularBuffer)) {
            foreach (array_chunk($regularBuffer, 4) as $regularRow) {
                $measurementBlocks[] = ['type' => 'regular', 'items' => $regularRow];
            }
            $regularBuffer = [];
        }
    };

    // Keep all ordinary measurements first. Collect BODY LOOSE fields separately
    // and append their special box at the bottom of the measurement table.
    foreach ($measurements as $measurement) {
        $fieldKey = $normalizeFieldName($measurement['field_name'] ?? '');

        if (in_array($fieldKey, $bodyLooseFieldOrder, true)) {
            continue;
        }

        $regularBuffer[] = $measurement;
    }

    $flushRegularBuffer();

    $bodyLooseItems = [];
    foreach ($bodyLooseFieldOrder as $specialFieldKey) {
        if (isset($specialMeasurements[$specialFieldKey])) {
            $bodyLooseItems[] = $specialMeasurements[$specialFieldKey];
        }
    }

    if (!empty($bodyLooseItems)) {
        $measurementBlocks[] = [
            'type' => 'body_loose',
            'name' => 'Body Loose',
            'items' => $bodyLooseItems,
        ];
    }
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



        <td class="info-label">Customer</td>



        <td class="info-value">



            {{ $order->customer?->name ?? '-' }}



        </td>







        <td class="info-label">Quantity</td>



        <td class="info-value">



            {{ $item->qty ?? 1 }}



        </td>



    </tr>







    <tr>



        <td class="info-label">Order Date</td>



        <td class="info-value">



            {{ $order->order_date



                ? \Carbon\Carbon::parse($order->order_date)->format('d-m-Y')



                : '-' }}



        </td>







        <td class="info-label">Delivery Date</td>



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















                @if(count($measurementBlocks) > 0)

                    @foreach($measurementBlocks as $block)

                        @if($block['type'] === 'regular')

                            <tr>

                                @foreach($block['items'] as $measurement)

                                    <td style="width: {{ 100 / 4 }}%;">

                                        <div class="measurement-name">{{ $measurement['name'] ?? '-' }}</div>

                                        <div class="measurement-value">{{ $measurement['value'] ?? '' }}</div>

                                    </td>

                                @endforeach

                                @for($i = count($block['items']); $i < 4; $i++)

                                    <td><div class="measurement-empty">&nbsp;</div></td>

                                @endfor

                            </tr>

                        @else

                            <tr class="body-loose-row">
                                <td colspan="4" style="padding:0;">
                                    <table class="body-loose-table">
                                        <thead>
                                            <tr><th class="body-loose-title" colspan="3">{{ $block['name'] }}</th></tr>
                                        </thead>
                                        <tbody>
                                            @foreach(array_chunk($block['items'], 3) as $bodyLooseRow)
                                                <tr>
                                                    @foreach($bodyLooseRow as $bodyLooseItem)
                                                        <td>
                                                            <div class="measurement-name">{{ $bodyLooseItem['name'] ?? '-' }}</div>
                                                            <div class="measurement-value">{{ $bodyLooseItem['value'] ?? '' }}</div>
                                                        </td>
                                                    @endforeach
                                                    @for($i = count($bodyLooseRow); $i < 3; $i++)
                                                        <td><div class="measurement-empty">&nbsp;</div></td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endif

                    @endforeach

                @else

                    <tr><td colspan="4"><div class="measurement-empty">No measurements available</div></td></tr>

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















            <div class="notes-content">@if(!empty(trim((string) $item->notes))){!! nl2br(e(trim((string) $item->notes))) !!}@else&nbsp;@endif</div>















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
