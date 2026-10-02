<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>
        Print Order - {{ $order->order_no }}
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        @media print {

            .no-print {
                display: none !important;
            }

            .print-block {
                page-break-inside: avoid;
            }

            body {
                background: white !important;
            }
        }

    </style>

</head>

<body class="bg-gray-100">

<div class="max-w-7xl mx-auto p-6">

    <!-- TOP BUTTON -->

    <div class="no-print flex justify-end mb-6">

        <button
            onclick="window.print()"
            class="px-5 py-2 bg-blue-600 text-white rounded-lg">

            Print

        </button>

    </div>


    <!-- ORDER HEADER -->

    <div class="bg-white rounded-xl border p-5 mb-6">

        <div class="flex justify-between">

            <div>

                <h1 class="text-2xl font-bold">
                    {{ $order->order_no }}
                </h1>

                <p class="text-gray-500">
                    Order Date:
                    {{ $order->order_date }}
                </p>

            </div>

            <div class="text-right">

                <p class="font-semibold">
                    {{ $order->customer?->name }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $order->customer?->phone }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ $order->customer?->city }}
                </p>

            </div>

        </div>

    </div>


    <!-- ITEMS -->

    @foreach($order->items as $item)

        @php

            $track = $item->tracks->last();

            $measurements = $item->measurements;

            if (is_string($measurements)) {
                $measurements = json_decode(
                    $measurements,
                    true
                );
            }

        @endphp


        <div class="print-block bg-white border rounded-2xl mb-6 overflow-hidden">


            <!-- ITEM HEADER -->

            <div class="flex justify-between items-center bg-gray-100 px-5 py-4">

                <div>

                    <h2 class="text-lg font-bold">

                        {{ $item->item_no }}

                    </h2>

                    <p class="text-sm text-gray-500">

                        {{ $item->type?->type ?? '-' }}

                    </p>

                </div>


                <div class="text-right">

                    <p class="text-sm">

                        Assigned:

                        <strong>
                            {{ $track?->tailor?->name ?? 'UnAssigned' }}
                        </strong>

                    </p>

                    <p class="text-sm">

                        Stage:

                        <strong>
                            {{ $track?->stage?->name ?? '-' }}
                        </strong>

                    </p>

                    <p class="text-sm">

                        Status:

                        <strong>
                            {{ $track?->status ?? '-' }}
                        </strong>

                    </p>

                </div>

            </div>


            <!-- CUSTOMER -->

            <div class="p-5">

                <table class="w-full text-sm border-collapse">

                    <tbody>

                        <tr class="border-b">

                            <td class="bg-gray-50 font-semibold p-3 w-32">
                                Customer
                            </td>

                            <td class="p-3">

                                {{ $order->customer?->name ?? '-' }}

                                |

                                {{ $order->customer?->phone ?? '-' }}

                                |

                                {{ $order->customer?->city ?? '-' }}

                            </td>

                        </tr>


                        <!-- NOTES -->

                        <tr class="border-b">

                            <td class="bg-gray-50 font-semibold p-3 align-top">
                                Notes
                            </td>

                            <td class="p-3">

                                {!! nl2br(
                                    e($item->notes ?? '')
                                ) !!}

                            </td>

                        </tr>


                        <!-- MEASUREMENTS -->

                        <tr>

                            <td class="bg-gray-50 font-semibold p-3 align-top">

                                Measurements

                            </td>

                            <td class="p-3">

                                <table class="w-full text-sm border-collapse">

                                    <tbody>

                                        @if(!empty($measurements))

                                            @foreach(
                                                array_chunk(
                                                    array_values($measurements),
                                                    5
                                                )
                                                as $row
                                            )

                                                <tr>

                                                    @foreach($row as $measurement)

                                                        @if(
                                                            !empty(
                                                                $measurement['name']
                                                            )
                                                        )

                                                            <td class="border p-0">

                                                                <table class="w-full">

                                                                    <tr>

                                                                        <td class="bg-gray-100 border-b text-center font-semibold p-2">

                                                                            {{ $measurement['name'] }}

                                                                        </td>

                                                                    </tr>

                                                                    <tr>

                                                                        <td class="text-center p-3">

                                                                            {{ $measurement['value'] ?? '' }}

                                                                        </td>

                                                                    </tr>

                                                                </table>

                                                            </td>

                                                        @endif

                                                    @endforeach

                                                </tr>

                                            @endforeach

                                        @endif

                                    </tbody>

                                </table>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>
