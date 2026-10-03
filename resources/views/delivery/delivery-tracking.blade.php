<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Order Delivery Tracking</title>

    <script src="https://cdn.tailwindcss.com"></script>


    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* =========================================================
           TIMELINE
        ========================================================== */

        .timeline-wrapper {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            padding-bottom: 15px;
        }

        .timeline {
            display: flex;
            align-items: flex-start;
            min-width: 900px;
        }

        .timeline-stage {
            position: relative;
            width: 130px;
            min-width: 130px;
            flex-shrink: 0;
            text-align: center;
        }

        .timeline-stage:not(:last-child)::after {

            content: "";

            position: absolute;

            top: 18px;

            left: 65px;

            width: 130px;

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

            margin-left: auto;

            margin-right: auto;
        }

        .timeline-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .timeline-wrapper::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 10px;
        }

        .timeline-wrapper::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        /* =========================================================
           LOADER
        ========================================================== */

        .loader {

            width: 18px;

            height: 18px;

            border: 2px solid rgba(255,255,255,0.4);

            border-top-color: white;

            border-radius: 50%;

            animation: spin 0.7s linear infinite;

            display: inline-block;

            vertical-align: middle;
        }

        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }

    </style>

</head>


<body class="bg-gray-100 min-h-screen">


    <!-- =========================================================
         HEADER
    ========================================================== -->

    <div
        class="
            bg-gradient-to-r
            from-blue-600
            to-indigo-600
            text-white
            p-4
            rounded-b-2xl
            shadow
        "
    >

        <div
            class="
                max-w-6xl
                mx-auto
                flex
                items-center
                gap-3
            "
        >

            <!-- BACK BUTTON -->

            <button
                type="button"
                onclick="goBack()"
                class="
                    w-9
                    h-9
                    rounded-lg
                    bg-white/20
                    hover:bg-white/30
                    flex
                    items-center
                    justify-center
                    transition
                    flex-shrink-0
                "
                title="Back"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 19l-7-7 7-7"
                    />

                </svg>

            </button>


            <!-- TITLE -->

            <div class="flex-1 text-center">

                <div class="
                    text-lg
                    font-semibold
                ">

                    Order Delivery Tracking

                </div>

            </div>


            <!-- RIGHT SPACE -->

            <div class="w-9 flex-shrink-0"></div>

        </div>

    </div>


    <!-- =========================================================
         SEARCH SECTION
    ========================================================== -->

    <div class="p-4">

        <div
            class="
                bg-white
                rounded-xl
                shadow
                p-4
                max-w-6xl
                mx-auto
            "
        >

            <div class="mb-4">

                <h2
                    class="
                        text-base
                        font-semibold
                        text-gray-800
                    "
                >

                    Track Your Order

                </h2>


                <p
                    class="
                        text-xs
                        text-gray-500
                        mt-1
                    "
                >

                    Search using mobile number or order number.

                </p>

            </div>


            <!-- =================================================
                 SEARCH FORM
            ================================================== -->

            <form id="trackingForm">

                <div
                    class="
                        grid
                        grid-cols-1
                        md:grid-cols-3
                        gap-3
                    "
                >

                    <!-- MOBILE NUMBER -->

                    <div>

                        <label
                            for="mobileNumber"
                            class="
                                block
                                text-xs
                                font-medium
                                text-gray-600
                                mb-1
                            "
                        >

                            Mobile Number

                        </label>


                        <input
                            type="text"
                            id="mobileNumber"
                            name="phone"
                            inputmode="numeric"
                            autocomplete="tel"
                            maxlength="20"
                            placeholder="Enter Mobile Number"
                            class="
                                w-full
                                px-3
                                py-2.5
                                border
                                border-gray-300
                                rounded-lg
                                text-sm
                                outline-none
                                focus:ring-2
                                focus:ring-blue-200
                                focus:border-blue-500
                            "
                        >

                    </div>


                    <!-- ORDER NUMBER -->

                    <div>

                        <label
                            for="orderNumber"
                            class="
                                block
                                text-xs
                                font-medium
                                text-gray-600
                                mb-1
                            "
                        >

                            Order Number

                        </label>


                        <input
                            type="text"
                            id="orderNumber"
                            name="order_no"
                            maxlength="50"
                            placeholder="Example: OR002"
                            autocomplete="off"
                            class="
                                w-full
                                px-3
                                py-2.5
                                border
                                border-gray-300
                                rounded-lg
                                text-sm
                                uppercase
                                outline-none
                                focus:ring-2
                                focus:ring-blue-200
                                focus:border-blue-500
                            "
                        >

                    </div>


                    <!-- TRACK BUTTON -->

                    <div class="flex items-end">

                        <button
                            type="submit"
                            id="trackButton"
                            class="
                                w-full
                                px-5
                                py-2.5
                                bg-blue-600
                                hover:bg-blue-700
                                text-white
                                rounded-lg
                                text-sm
                                font-medium
                                transition
                                disabled:opacity-60
                                disabled:cursor-not-allowed
                            "
                        >

                            Track Order

                        </button>

                    </div>

                </div>


                <div
                    class="
                        mt-3
                        text-[11px]
                        text-gray-400
                    "
                >

                    You can enter either mobile number or order number.

                </div>

            </form>

        </div>

    </div>


    <!-- =========================================================
         ORDERS CONTAINER
    ========================================================== -->

    <div
        id="ordersContainer"
        class="
            px-4
            pb-20
            space-y-4
            max-w-6xl
            mx-auto
        "
    ></div>



<script>


/* =========================================================
   TRACKING URL
========================================================= */

const trackingUrl = @json(
    route('orders.delivery-tracking.track')
);


/* =========================================================
   BACK BUTTON
========================================================= */

function goBack()
{
    window.history.back();
}


/* =========================================================
   FORM SUBMIT
========================================================= */

document
    .getElementById('trackingForm')
    .addEventListener(
        'submit',
        function(event) {

            event.preventDefault();

            trackOrders();

        }
    );


/* =========================================================
   ORDER NUMBER UPPERCASE
========================================================= */

document
    .getElementById('orderNumber')
    .addEventListener(
        'input',
        function() {

            this.value =
                this.value.toUpperCase();

        }
    );


/* =========================================================
   TRACK ORDERS
========================================================= */

function trackOrders()
{

    const mobile =
        document
            .getElementById('mobileNumber')
            .value
            .trim();


    const orderNumber =
        document
            .getElementById('orderNumber')
            .value
            .trim()
            .toUpperCase();


    /* =========================================================
       VALIDATION
    ========================================================== */

    if (!mobile && !orderNumber) {

        showMessage(
            'Please enter mobile number or order number.'
        );

        return;
    }


    /* =========================================================
       BUTTON
    ========================================================== */

    const button =
        document.getElementById('trackButton');


    button.disabled = true;


    button.innerHTML = `
        <span class="loader"></span>
        <span class="ml-2">Searching...</span>
    `;


    /* =========================================================
       CLEAR OLD RESULT
    ========================================================== */

    document
        .getElementById('ordersContainer')
        .innerHTML = '';


    /* =========================================================
       QUERY PARAMETERS
    ========================================================== */

    const params =
        new URLSearchParams();


    if (mobile) {

        params.append(
            'phone',
            mobile
        );

    }


    if (orderNumber) {

        params.append(
            'order_no',
            orderNumber
        );

    }


    const url =
        trackingUrl +
        '?' +
        params.toString();


    /* =========================================================
       API REQUEST
    ========================================================== */

    fetch(
        url,
        {
            method: 'GET',

            headers: {

                'Accept':
                    'application/json',

                'X-Requested-With':
                    'XMLHttpRequest'

            }
        }
    )

    .then(
        async response => {

            let data = {};

            try {

                data =
                    await response.json();

            }
            catch (error) {

                throw new Error(
                    'Invalid response from server.'
                );

            }


            if (!response.ok) {

                throw new Error(
                    data.message ||
                    'No orders found.'
                );

            }


            return data;

        }
    )


    .then(
        data => {

            renderOrders(
                Array.isArray(data.orders)
                    ? data.orders
                    : []
            );

        }
    )


    .catch(
        error => {

            showMessage(
                error.message ||
                'Unable to retrieve order details.'
            );

        }
    )


    .finally(
        () => {

            button.disabled = false;

            button.innerHTML =
                'Track Order';

        }
    );

}


/* =========================================================
   MESSAGE
========================================================= */

function showMessage(message)
{

    document
        .getElementById('ordersContainer')
        .innerHTML = `

        <div
            class="
                bg-white
                rounded-xl
                shadow
                p-8
                text-center
            "
        >

            <div
                class="
                    text-gray-400
                    text-4xl
                    mb-3
                "
            >

                🔍

            </div>


            <div
                class="
                    text-gray-700
                    font-semibold
                "
            >

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
        document.getElementById(
            'ordersContainer'
        );


    /* =========================================================
       VALIDATE
    ========================================================== */

    if (
        !Array.isArray(orderList) ||
        orderList.length === 0
    ) {

        showMessage(
            'No orders found.'
        );

        return;
    }


    let html = '';


    /* =========================================================
       LOOP ORDERS
    ========================================================== */

    orderList.forEach(
        order => {


            let itemsHtml = '';


            /* =================================================
               LOOP ITEMS
            ================================================= */

            if (
                Array.isArray(order.items) &&
                order.items.length > 0
            ) {


                order.items.forEach(
                    item => {


                        let timelineHtml = '';


                        /* =========================================
                           ITEM STAGES
                        ========================================== */

                        if (
                            Array.isArray(item.stages) &&
                            item.stages.length > 0
                        ) {


                            item.stages.forEach(
                                (stage, index) => {


                                    let circleClass =
                                        'bg-red-500';


                                    let icon =
                                        index + 1;


                                    /* =================================
                                       COMPLETED
                                    ================================= */

                                    if (
                                        stage.completed
                                    ) {

                                        circleClass =
                                            'bg-green-500';

                                        icon =
                                            '✓';

                                    }


                                    /* =================================
                                       CURRENT
                                    ================================= */

                                    else if (
                                        stage.current
                                    ) {

                                        circleClass =
                                            'bg-yellow-500';

                                    }


                                    /* =================================
                                       STATUS
                                    ================================= */

                                    let statusText =
                                        'Not Started';


                                    let statusClass =
                                        'bg-red-100 text-red-700';


                                    if (
                                        stage.completed
                                    ) {

                                        statusText =
                                            'Completed';

                                        statusClass =
                                            'bg-green-100 text-green-700';

                                    }

                                    else if (
                                        stage.current
                                    ) {

                                        statusText =
                                            'Current';

                                        statusClass =
                                            'bg-yellow-100 text-yellow-700';

                                    }

                                    else if (
                                        stage.status
                                    ) {

                                        statusText =
                                            stage.status;

                                    }


                                    /* =================================
                                       STAGE
                                    ================================= */

                                    timelineHtml += `

                                        <div
                                            class="
                                                timeline-stage
                                                ${
                                                    stage.completed
                                                        ? 'completed'
                                                        : ''
                                                }
                                                ${
                                                    stage.current
                                                        ? 'current'
                                                        : ''
                                                }
                                            "
                                        >

                                            <!-- CIRCLE -->

                                            <div
                                                class="
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
                                                "
                                            >

                                                ${icon}

                                            </div>


                                            <!-- STAGE -->

                                            <div
                                                class="
                                                    mt-3
                                                    text-xs
                                                    font-semibold
                                                    text-gray-700
                                                    min-h-[32px]
                                                "
                                            >

                                                ${escapeHtml(
                                                    stage.name ||
                                                    ''
                                                )}

                                            </div>


                                            <!-- START -->

                                            <div
                                                class="
                                                    mt-2
                                                    text-[10px]
                                                    text-gray-500
                                                "
                                            >

                                                <b>Start</b>

                                                <br>

                                                ${
                                                    stage.start_date ||
                                                    '--'
                                                }

                                            </div>


                                            <!-- END -->

                                            <div
                                                class="
                                                    mt-1
                                                    text-[10px]
                                                    text-gray-500
                                                "
                                            >

                                                <b>End</b>

                                                <br>

                                                ${
                                                    stage.end_date ||
                                                    '--'
                                                }

                                            </div>


                                            <!-- STATUS -->

                                            <div class="mt-2">

                                                <span
                                                    class="
                                                        px-2
                                                        py-1
                                                        rounded-full
                                                        text-[9px]
                                                        ${statusClass}
                                                    "
                                                >

                                                    ${escapeHtml(
                                                        statusText
                                                    )}

                                                </span>

                                            </div>

                                        </div>

                                    `;

                                }
                            );

                        }


                        /* =========================================
                           ITEM STATUS
                        ========================================== */

                        let itemStatusClass =
                            'bg-yellow-100 text-yellow-700';


                        if (
                            item.status ===
                            'Ready for Delivery'
                        ) {

                            itemStatusClass =
                                'bg-green-100 text-green-700';

                        }
                        else if (
                            item.status ===
                            'Completed'
                        ) {

                            itemStatusClass =
                                'bg-green-100 text-green-700';

                        }
                        else if (
                            item.status ===
                            'Not Started'
                        ) {

                            itemStatusClass =
                                'bg-red-100 text-red-700';

                        }


                        /* =========================================
                           ITEM CARD
                        ========================================== */

                        itemsHtml += `

                            <div
                                class="
                                    border
                                    border-gray-200
                                    rounded-xl
                                    overflow-hidden
                                    bg-gray-50
                                "
                            >


                                <!-- ITEM HEADER -->

                                <div
                                    class="
                                        px-4
                                        py-3
                                        bg-white
                                        border-b
                                        border-gray-200
                                        flex
                                        flex-wrap
                                        justify-between
                                        items-center
                                        gap-2
                                    "
                                >

                                    <div>

                                        <div
                                            class="
                                                text-base
                                                font-bold
                                                text-gray-800
                                            "
                                        >

                                            ${escapeHtml(
                                                item.item_no ||
                                                ''
                                            )}

                                            -

                                            ${escapeHtml(
                                                item.type ||
                                                ''
                                            )}

                                        </div>


                                        <div
                                            class="
                                                text-xs
                                                text-gray-500
                                                mt-1
                                            "
                                        >

                                            Quantity:

                                            ${escapeHtml(
                                                String(
                                                    item.qty ??
                                                    0
                                                )
                                            )}

                                        </div>

                                    </div>


                                    <!-- ITEM STATUS -->

                                    <span
                                        class="
                                            px-3
                                            py-1
                                            rounded-full
                                            text-xs
                                            font-medium
                                            ${itemStatusClass}
                                        "
                                    >

                                        ${escapeHtml(
                                            item.status ||
                                            'Not Started'
                                        )}

                                    </span>

                                </div>


                                <!-- ITEM TIMELINE -->

                                <div class="p-4">

                                    ${
                                        timelineHtml

                                        ?

                                        `
                                            <div
                                                class="
                                                    timeline-wrapper
                                                "
                                            >

                                                <div
                                                    class="
                                                        timeline
                                                    "
                                                >

                                                    ${timelineHtml}

                                                </div>

                                            </div>
                                        `

                                        :

                                        `
                                            <div
                                                class="
                                                    text-center
                                                    text-sm
                                                    text-gray-500
                                                    py-5
                                                "
                                            >

                                                No tracking information
                                                available.

                                            </div>
                                        `
                                    }

                                </div>

                            </div>

                        `;

                    }
                );

            }
            else {

                itemsHtml = `

                    <div
                        class="
                            text-center
                            text-sm
                            text-gray-500
                            py-5
                        "
                    >

                        No items found for this order.

                    </div>

                `;

            }


            /* =================================================
               ORDER STATUS
            ================================================== */

            let orderStatusClass =
                'bg-yellow-100 text-yellow-700';


            if (
                order.status ===
                'Ready for Delivery'
            ) {

                orderStatusClass =
                    'bg-green-100 text-green-700';

            }
            else if (
                order.status ===
                'Completed'
            ) {

                orderStatusClass =
                    'bg-green-100 text-green-700';

            }
            else if (
                order.status ===
                'Not Started'
            ) {

                orderStatusClass =
                    'bg-red-100 text-red-700';

            }


            /* =================================================
               ORDER CARD
            ================================================== */

            html += `

                <div
                    class="
                        bg-white
                        rounded-2xl
                        shadow
                        p-5
                    "
                >


                    <!-- =========================================
                         ORDER HEADER
                    ========================================== -->

                    <div
                        class="
                            flex
                            flex-wrap
                            justify-between
                            items-center
                            gap-3
                            mb-5
                        "
                    >


                        <div>

                            <!-- ORDER NUMBER -->

                            <h3
                                class="
                                    font-semibold
                                    text-gray-800
                                    text-lg
                                "
                            >

                                ${escapeHtml(
                                    order.order_no ||
                                    ''
                                )}

                            </h3>


                            <!-- CUSTOMER -->

                            ${
                                order.customer
                                    ? `
                                        <p
                                            class="
                                                text-xs
                                                text-gray-500
                                                mt-1
                                            "
                                        >

                                            Customer:

                                            ${escapeHtml(
                                                order.customer
                                            )}

                                        </p>
                                    `
                                    : ''
                            }


                            <!-- MOBILE -->

                            ${
                                order.phone
                                    ? `
                                        <p
                                            class="
                                                text-xs
                                                text-gray-500
                                                mt-1
                                            "
                                        >

                                            Mobile:

                                            ${escapeHtml(
                                                order.phone
                                            )}

                                        </p>
                                    `
                                    : ''
                            }


                            <!-- DATES -->

                            <p
                                class="
                                    text-xs
                                    text-gray-500
                                    mt-1
                                "
                            >

                                Order Date:

                                ${escapeHtml(
                                    order.order_date ||
                                    '--'
                                )}

                                &nbsp; | &nbsp;

                                Delivery:

                                ${escapeHtml(
                                    order.delivery_date ||
                                    '--'
                                )}

                            </p>

                        </div>


                        <!-- ORDER STATUS -->

                        <span
                            class="
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                font-medium
                                ${orderStatusClass}
                            "
                        >

                            ${escapeHtml(
                                order.status ||
                                'In Progress'
                            )}

                        </span>

                    </div>


                    <!-- =========================================
                         ITEMS
                    ========================================== -->

                    <div class="space-y-4">

                        ${itemsHtml}

                    </div>


                    <!-- =========================================
                         LEGEND
                    ========================================== -->

                    <div
                        class="
                            mt-5
                            pt-4
                            border-t
                            border-gray-200
                            flex
                            gap-5
                            text-xs
                            text-gray-500
                            flex-wrap
                        "
                    >

                        <!-- COMPLETED -->

                        <div
                            class="
                                flex
                                items-center
                                gap-1
                            "
                        >

                            <span
                                class="
                                    w-3
                                    h-3
                                    rounded-full
                                    bg-green-500
                                "
                            ></span>

                            Completed

                        </div>


                        <!-- CURRENT -->

                        <div
                            class="
                                flex
                                items-center
                                gap-1
                            "
                        >

                            <span
                                class="
                                    w-3
                                    h-3
                                    rounded-full
                                    bg-yellow-500
                                "
                            ></span>

                            Current

                        </div>


                        <!-- NOT STARTED -->

                        <div
                            class="
                                flex
                                items-center
                                gap-1
                            "
                        >

                            <span
                                class="
                                    w-3
                                    h-3
                                    rounded-full
                                    bg-red-500
                                "
                            ></span>

                            Not Started

                        </div>

                    </div>


                </div>

            `;

        }
    );


    /* =========================================================
       DISPLAY
    ========================================================== */

    container.innerHTML = html;

}


/* =========================================================
   ESCAPE HTML
========================================================= */

function escapeHtml(value)
{

    return String(
        value ?? ''
    )

    .replace(
        /&/g,
        '&amp;'
    )

    .replace(
        /</g,
        '&lt;'
    )

    .replace(
        />/g,
        '&gt;'
    )

    .replace(
        /"/g,
        '&quot;'
    )

    .replace(
        /'/g,
        '&#039;'
    );

}

</script>


</body>

</html>