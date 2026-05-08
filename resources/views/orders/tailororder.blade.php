<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tailor Work Tracking</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<!-- HEADER -->
<div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white p-4 rounded-b-2xl shadow text-center">

    <img src="/logo.png" class="w-10 h-10 mx-auto mb-2 rounded-full">

    <h1 class="text-lg font-bold">Mohan Tailoring</h1>
    <p class="text-xs opacity-90">Cumbum</p>
    <p class="text-xs opacity-90">📞 +91 98765 43210</p>

</div>

<!-- SEARCH -->
<div class="p-4">
    <div class="bg-white rounded-xl shadow p-3 flex gap-2">
        <input type="text" id="tailorId"
            placeholder="Enter Tailor ID"
            class="flex-1 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-blue-200">

        <button onclick="loadOrders()"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
            Load
        </button>
    </div>
</div>

<!-- ORDER LIST -->
<div id="orderList" class="px-4 space-y-4 pb-20">

    <!-- ORDER CARD -->
    <!-- <div class="bg-white rounded-2xl shadow p-4">

        <div class="flex justify-between items-center">
            <div>
                <h3 class="font-semibold text-gray-800">ORD001-1</h3>
                <p class="text-xs text-gray-500">Order Date: 04 Apr 2026</p>
                <p class="text-xs text-gray-500">Assigned: 05 Apr 2026</p>
            </div>

            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">
                Assigned
            </span>
        </div>


        <div class="mt-4 flex justify-end">
            <button onclick="startWork(this)"
                class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg">
                Start
            </button>
        </div>

    </div> -->
    <div id="ordersContainer"
    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-5">
</div>

    <!-- ORDER CARD -->


</div>

<!-- JS -->





</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

function loadOrders()
{
    let id = document.getElementById('tailorId').value;


    if(!id){
        alert('Enter Employee ID');
        return;
    }

    $('#ordersContainer').html(`
        <div class="text-gray-400">
            Loading...
        </div>
    `);

    $.get('/tailor/works/' + id, function(res){

        if(!res.success){
            alert(res.message);
            return;
        }

        let html = '';

        if(res.data.length === 0){

            html = `
                <div class="text-gray-400">
                    No pending orders
                </div>
            `;

        } else {

            res.data.forEach(item => {

                let badge = '';

                if(item.status == 'pending'){

                    badge = `
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    `;

                } else {

                    badge = `
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                            In Progress
                        </span>
                    `;
                }

                html += `

                <div class="bg-white rounded-2xl shadow p-4">

                    <div class="flex justify-between items-start">

                        <div>

                            <h3 class="font-semibold text-gray-800">
                                ${item.item_no}
                            </h3>
                            <p class="text-xs text-gray-500">
                                Name : ${item.tailor_name}
                                </p>

                            <p class="text-xs text-gray-500 mt-1">
                                Order : ${item.order_no}
                            </p>

                            <p class="text-xs text-gray-500">
                                Type : ${item.type}
                            </p>

                            <p class="text-xs text-gray-500">
                                Stage : ${item.stage_name}
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                Assigned : ${item.assigned_date}
                            </p>
                             <p class="text-xs text-gray-500 mt-1">
                                 Notes : ${item.correction_notes}
                            </p>

                        </div>

                        ${badge}

                    </div>

                    <div class="mt-4 flex justify-end">

                        ${
                            item.status == 'pending'

                            ?

                            `<button
                               onclick="startWork(this, ${item.track_id})"
                                class="px-3 py-1 text-sm bg-green-600 text-white rounded-lg">
                                Start
                            </button>`

                            :

                            `<button
                                onclick="completeWork(this, ${item.track_id})"
                                class="px-3 py-1 text-sm bg-blue-600 text-white rounded-lg">
                                Complete
                            </button>`
                        }

                    </div>

                </div>
                `;
            });
        }

        $('#ordersContainer').html(html);

    });
}

</script>
<script>
// START
function startWork(btn, id){

    let card = btn.closest('.bg-white');

    $.post('/track/start/' + id, {
        _token: '{{ csrf_token() }}'
    }, function(res){

        if(res.success){

            btn.innerText = 'In Progress';

            btn.classList.remove('bg-green-600');
            btn.classList.add('bg-blue-600');
        }
    });
}

// STOP
function completeWork(btn, id){



    $.post('/track/complete/' + id, {
        _token: '{{ csrf_token() }}'
    }, function(res){

        if(res.success){

            let card = btn.closest('.bg-white');

            card.remove();
        }
    });
}

</script>
</html>
