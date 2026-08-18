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

        /* Connecting line */
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

        /* Green line for completed stage */
        .timeline-stage.completed:not(:last-child)::after {
            background: #22c55e;
        }

        .stage-circle {
            position: relative;
            z-index: 2;
            margin: auto;
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

            <div class="flex gap-2">

                <input
                    type="text"
                    id="mobileNumber"
                    placeholder="Enter Mobile Number"
                    class="flex-1 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-200">

                <button
                    onclick="trackOrders()"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg text-sm">

                    Track

                </button>

            </div>

        </div>

    </div>


    <!-- ORDERS -->

    <div id="ordersContainer" class="px-4 pb-20 space-y-4"></div>


<script>

const stages = [

    "Order Received",
    "Washing",
    "Cutting",
    "Insert Material",
    "Stitching",
    "Kaja Marking",
    "Kaja/Button Shop",
    "Thread Checking",
    "Ironing",
    "Hemming",
    "Final Rack",
    "Ready for Delivery"

];


const orders = [

    {
        order_no: "ORD001",

        delivery_date: "08 Apr 2026",

        stages: [

            {
                name: "Order Received",
                start_date: "01 Apr 2026",
                end_date: "01 Apr 2026",
                completed: true
            },

            {
                name: "Washing",
                start_date: "02 Apr 2026",
                end_date: "02 Apr 2026",
                completed: true
            },

            {
                name: "Cutting",
                start_date: "03 Apr 2026",
                end_date: "03 Apr 2026",
                completed: true
            },

            {
                name: "Insert Material",
                start_date: "04 Apr 2026",
                end_date: "04 Apr 2026",
                completed: true
            },

            {
                name: "Stitching",
                start_date: "05 Apr 2026",
                end_date: "06 Apr 2026",
                completed: true
            },

            {
                name: "Kaja Marking",
                start_date: "07 Apr 2026",
                end_date: "07 Apr 2026",
                completed: true
            },

            {
                name: "Kaja/Button Shop",
                start_date: "07 Apr 2026",
                end_date: "07 Apr 2026",
                completed: true
            },

            {
                name: "Thread Checking",
                start_date: "08 Apr 2026",
                end_date: "",
                completed: false
            },

            {
                name: "Ironing",
                start_date: "",
                end_date: "",
                completed: false
            },

            {
                name: "Hemming",
                start_date: "",
                end_date: "",
                completed: false
            },

            {
                name: "Final Rack",
                start_date: "",
                end_date: "",
                completed: false
            },

            {
                name: "Ready for Delivery",
                start_date: "",
                end_date: "",
                completed: false
            }

        ]
    }

];


function trackOrders()
{
    const mobile =
        document.getElementById("mobileNumber").value.trim();

    if (!mobile) {

        alert("Please enter mobile number");

        return;
    }

    renderOrders(orders);
}


function renderOrders(orderList)
{
    let html = "";


    orderList.forEach(order => {


        /* Find last completed stage */

        let currentStage = -1;

        order.stages.forEach((stage, index) => {

            if (stage.completed) {

                currentStage = index;

            }

        });


        /* Order status */

        let status = "In Progress";

        let statusClass =
            "bg-yellow-100 text-yellow-700";


        if (currentStage === stages.length - 1) {

            status = "Ready for Delivery";

            statusClass =
                "bg-green-100 text-green-700";

        }


        /* Timeline */

        let timelineHtml = "";


        stages.forEach((stageName, index) => {

            const stage =
                order.stages[index] || {};


            const completed =
                stage.completed === true;


            const current =
                !completed &&
                index === currentStage + 1;


            let circleClass =
                "bg-red-500";

            let icon = "✕";


            if (completed) {

                circleClass =
                    "bg-green-500";

                icon = "✓";

            }
            else if (current) {

                circleClass =
                    "bg-yellow-500";

                icon = index + 1;

            }
            else {

                circleClass =
                    "bg-red-500";

                icon = index + 1;

            }


            timelineHtml += `

                <div class="
                    timeline-stage
                    ${completed ? "completed" : ""}
                ">

                    <!-- CIRCLE -->

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


                    <!-- STAGE -->

                    <div class="
                        mt-3
                        text-xs
                        font-semibold
                        text-gray-700
                        min-h-[32px]
                    ">

                        ${stageName}

                    </div>


                    <!-- START -->

                    <div class="
                        mt-2
                        text-[10px]
                        text-gray-500
                    ">

                        <b>Start</b><br>

                        ${stage.start_date || "--"}

                    </div>


                    <!-- END -->

                    <div class="
                        mt-1
                        text-[10px]
                        text-gray-500
                    ">

                        <b>End</b><br>

                        ${stage.end_date || "--"}

                    </div>


                    <!-- STATUS -->

                    <div class="mt-2">

                        <span class="
                            px-2
                            py-1
                            rounded-full
                            text-[9px]
                            ${completed
                                ? "bg-green-100 text-green-700"
                                : "bg-red-100 text-red-700"}
                        ">

                            ${completed
                                ? "Completed"
                                : "Not Completed"}

                        </span>

                    </div>

                </div>

            `;

        });


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

                            ${order.order_no}

                        </h3>

                        <p class="
                            text-xs
                            text-gray-500
                        ">

                            Estimated Delivery:
                            ${order.delivery_date}

                        </p>

                    </div>


                    <span class="
                        px-3
                        py-1
                        text-xs
                        rounded-full
                        ${statusClass}
                    ">

                        ${status}

                    </span>

                </div>


                <!-- HORIZONTAL TIMELINE -->

                <div class="timeline-wrapper">

                    <div class="timeline">

                        ${timelineHtml}

                    </div>

                </div>


                <!-- LEGEND -->

                <div class="
                    mt-5
                    pt-4
                    border-t
                    flex
                    gap-5
                    text-xs
                    text-gray-500
                ">

                    <div class="flex items-center gap-1">

                        <span class="
                            w-3
                            h-3
                            rounded-full
                            bg-green-500
                        "></span>

                        Completed

                    </div>


                    <div class="flex items-center gap-1">

                        <span class="
                            w-3
                            h-3
                            rounded-full
                            bg-yellow-500
                        "></span>

                        Current

                    </div>


                    <div class="flex items-center gap-1">

                        <span class="
                            w-3
                            h-3
                            rounded-full
                            bg-red-500
                        "></span>

                        Not Completed

                    </div>

                </div>


            </div>

        `;

    });


    document.getElementById("ordersContainer").innerHTML = html;
}


renderOrders(orders);

</script>

</body>

</html>
