<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Delivery Tracking</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .timeline-wrapper {
            overflow-x: auto;
            padding-bottom: 15px;
        }

        .timeline {
            display: flex;
            align-items: flex-start;
            min-width: 1400px;
        }

        .timeline-stage {
            position: relative;
            width: 120px;
            flex-shrink: 0;
            text-align: center;
        }

        .timeline-stage:not(:last-child)::after {
            content: "";
            position: absolute;
            top: 18px;
            left: 60px;
            width: 120px;
            height: 4px;
            background: #ef4444;
            z-index: 0;
        }

        .timeline-stage.completed:not(:last-child)::after {
            background: #22c55e;
        }

        .timeline-stage.current:not(:last-child)::after {
            background: #eab308;
        }

        .stage-circle {
            position: relative;
            z-index: 2;
            margin: auto;
        }

        .no-orders {
            padding: 30px;
            text-align: center;
            color: #6b7280;
        }
    </style>
</head>


<body class="bg-gray-100 min-h-screen">

    <!-- HEADER -->

    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-4 text-center text-lg font-semibold rounded-b-2xl shadow">
        Order Delivery Tracking
    </div>


    <!-- SEARCH -->

    <div class="p-4">

        <div class="bg-white rounded-xl shadow p-4">

            <form id="trackingForm">

                <div class="flex gap-2">

                    <input
                        type="text"
                        id="mobileNumber"
                        name="phone"
                        inputmode="numeric"
                        autocomplete="tel"
                        maxlength="20"
                        placeholder="Enter Mobile Number"
                        class="flex-1 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-200"
                    >

                    <button
                        type="submit"
                        id="trackButton"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg text-sm">
                        Track
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- ORDERS -->

    <div id="ordersContainer" class="px-4 pb-20 space-y-4"></div>


<script>

const trackingUrl = @json(route('orders.delivery-tracking.track'));


/* =========================================================
   FORM
========================================================= */

document.getElementById('trackingForm')
    .addEventListener('submit', function(event) {

        event.preventDefault();

        trackOrders();

    });


function trackOrders()
{
    const mobile =
        document.getElementById('mobileNumber')
            .value
            .trim();

    if (!mobile) {

        showMessage('Please enter mobile number.');

        return;
    }

    const button =
        document.getElementById('trackButton');

    button.disabled = true;
    button.innerText = 'Searching...';

    document.getElementById('ordersContainer').innerHTML = '';


    const url =
        trackingUrl + '?phone=' + encodeURIComponent(mobile);

    fetch(url, {

        method: 'GET',

        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }

    })
    .then(async response => {

        const data = await response.json();

        if (!response.ok) {
            throw new Error(
                data.message ||
                'No orders found.'
            );
        }

        return data;

    })
    .then(data => {

        renderOrders(data.orders || []);

    })
    .catch(error => {

        showMessage(error.message);

    })
    .finally(() => {

        button.disabled = false;
        button.innerText = 'Track';

    });
}


/* =========================================================
   MESSAGE
========================================================= */

function showMessage(message)
{
    document.getElementById('ordersContainer').innerHTML = `

        <div class="bg-white rounded-xl shadow p-8 text-center">

            <div class="text-gray-400 text-4xl mb-3">
                🔍
            </div>

            <div class="text-gray-700 font-semibold">
                ${escapeHtml(message)}
            </div>

        </div>

    `;
}


/* =========================================================
   RENDER ORDERS
========================================================= */

function renderOrders(orderList)
{
    const container =
        document.getElementById('ordersContainer');

    if (!orderList.length) {

        showMessage(
            'No orders found for this mobile number.'
        );

        return;
    }


    let html = '';


    orderList.forEach(order => {

        let timelineHtml = '';


        order.stages.forEach((stage, index) => {

            let circleClass = 'bg-red-500';
            let icon = index + 1;


            if (stage.completed) {

                circleClass = 'bg-green-500';
                icon = '✓';

            }
            else if (stage.current) {

                circleClass = 'bg-yellow-500';
                icon = index + 1;

            }


            timelineHtml += `

                <div class="
                    timeline-stage
                    ${stage.completed ? 'completed' : ''}
                    ${stage.current ? 'current' : ''}
                ">

                    <div class="
                        stage-circle
                        w-9
                        h-9
                        rounded-full
                        ${circleClass}
                        text-white
                        flex
                        items-center
                        justify-center
                        text-xs
                        font-bold
                        shadow
                    ">
                        ${icon}
                    </div>


                    <div class="
                        mt-3
                        text-xs
                        font-semibold
                        text-gray-700
                        min-h-[32px]
                    ">
                        ${escapeHtml(stage.name)}
                    </div>


                    <div class="
                        mt-2
                        text-[10px]
                        text-gray-500
                    ">
                        <b>Start</b><br>
                        ${stage.start_date || '--'}
                    </div>


                    <div class="
                        mt-1
                        text-[10px]
                        text-gray-500
                    ">
                        <b>End</b><br>
                        ${stage.end_date || '--'}
                    </div>


                    <div class="mt-2">

                        <span class="
                            px-2
                            py-1
                            rounded-full
                            text-[9px]
                            ${
                                stage.completed
                                    ? 'bg-green-100 text-green-700'
                                    : stage.current
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-red-100 text-red-700'
                            }
                        ">

                            ${
                                stage.completed
                                    ? 'Completed'
                                    : stage.current
                                        ? 'Current'
                                        : 'Not Started'
                            }

                        </span>

                    </div>

                </div>

            `;

        });


        let itemsHtml = '';

        if (order.items && order.items.length) {

            itemsHtml = `

                <div class="mt-5 pt-4 border-t">

                    <div class="text-sm font-semibold text-gray-700 mb-2">
                        Items
                    </div>

                    <div class="flex flex-wrap gap-2">

                        ${
                            order.items.map(item => `
                                <span class="
                                    px-3
                                    py-1
                                    bg-gray-100
                                    rounded-full
                                    text-xs
                                    text-gray-700
                                ">
                                    ${escapeHtml(item.item_no)}
                                    -
                                    ${escapeHtml(item.type || '')}
                                </span>
                            `).join('')
                        }

                    </div>

                </div>

            `;

        }


        html += `

            <div class="
                bg-white
                rounded-2xl
                shadow
                p-5
            ">


                <!-- ORDER HEADER -->

                <div class="
                    flex
                    justify-between
                    items-center
                    mb-6
                ">

                    <div>

                        <h3 class="
                            font-semibold
                            text-gray-800
                            text-lg
                        ">
                            ${escapeHtml(order.order_no)}
                        </h3>


                        <p class="
                            text-xs
                            text-gray-500
                        ">
                            Order Date:
                            ${order.order_date || '--'}
                            &nbsp; | &nbsp;
                            Delivery:
                            ${order.delivery_date || '--'}
                        </p>

                    </div>


                    <span class="
                        px-3
                        py-1
                        text-xs
                        rounded-full
                        ${
                            order.status === 'Ready for Delivery'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-yellow-100 text-yellow-700'
                        }
                    ">
                        ${escapeHtml(order.status)}
                    </span>

                </div>


                <!-- TIMELINE -->

                <div class="timeline-wrapper">

                    <div class="timeline">

                        ${timelineHtml}

                    </div>

                </div>


                ${itemsHtml}


                <!-- LEGEND -->

                <div class="
                    mt-5
                    pt-4
                    border-t
                    flex
                    gap-5
                    text-xs
                    text-gray-500
                    flex-wrap
                ">

                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        Completed
                    </div>


                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                        Current
                    </div>


                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-red-500"></span>
                        Not Started
                    </div>

                </div>

            </div>

        `;

    });


    container.innerHTML = html;
}


/* =========================================================
   ESCAPE HTML
========================================================= */

function escapeHtml(value)
{
    return String(value ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}

</script>

</body>
</html>
