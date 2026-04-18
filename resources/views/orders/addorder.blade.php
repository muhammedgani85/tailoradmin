@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="User Profile" />
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">Profile</h3>
         <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
            <div class="flex w-full flex-col items-center gap-6 xl:flex-row">
                <div class="h-20 w-20 overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                    <img src="./images/user/owner.jpg" alt="user" />
                </div>
                <div class="order-3 xl:order-2">
                    <h4 class="mb-2 text-center text-lg font-semibold text-gray-800 xl:text-left dark:text-white/90">
                        Musharof Chowdhury
                    </h4>
                    <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            +91 363 398 46
                        </p>
                        <div class="hidden h-3.5 w-px bg-gray-300 xl:block dark:bg-gray-700"></div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Cumbum, Theni District.
                        </p>
                    </div>
                </div>
                <div class="order-2 flex grow items-center gap-2 xl:order-3 xl:justify-end">
                    <button
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                       <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/trouser-icon-svg-download-png-1995856.png?f=webp&w=256" />
                    </button>

                    <button
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                       <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/shirt-icon-svg-download-png-1595367.png?f=webp&w=256" />
                    </button>

                    <button
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                         <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/long-sleeve-shirt-icon-svg-download-png-1595364.png?f=webp&w=256" />
                    </button>

                    <button
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/shorts-icon-svg-download-png-1595376.png?f=webp&w=256" />
                    </button>

    <button
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/blazer-icon-svg-download-png-6931876.png?f=webp&w=256" />
                    </button>

                    <button
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/kurta-icon-svg-download-png-1553110.png?f=webp&w=256" />
                    </button>



                </div>
            </div>

            <button onclick="openSearchModal()"
                class="shadow-theme-xs flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                        fill="" />
                </svg>
                Search
            </button>
        </div>
    </div>


    <!-- Personal Info -->

    <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                    Measurement
                </h4>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                    <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:1200px !important;">
                        <div class="p-6 flex items-center px-6 py-2 justify-between">
                            <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Waist/Waist.png" style="color: transparent;">
                            <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Waist / இடுப்பு</label>
                            <div class="mt-0"><div class="relative">
                                <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                            </div></div></div></div></div>




                </div>



                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                    <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:1200px !important;">
                        <div class="p-6 flex items-center px-6 py-2 justify-between">
                            <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Seat/Seat.png" style="color: transparent;">
                            <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Seat / பின்புற அளவு</label>
                            <div class="mt-0"><div class="relative">
                                <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                            </div></div></div></div></div>




                </div>


                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                    <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:1200px !important;">
                        <div class="p-6 flex items-center px-6 py-2 justify-between">
                            <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Calf/Calf.png" style="color: transparent;">
                            <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Calf / Knee
கெண்டைக்கால் / முழங்கால்</label>
                            <div class="mt-0"><div class="relative">
                                <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                            </div></div></div></div></div>




                </div>


                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                    <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:1200px !important;">
                        <div class="p-6 flex items-center px-6 py-2 justify-between">
                            <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Ankle/Ankle.png" style="color: transparent;">
                            <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Bottom / Bells
கீழே / மணி</label>
                            <div class="mt-0"><div class="relative">
                                <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                            </div></div></div></div></div>




                </div>


                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                    <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:1200px !important;">
                        <div class="p-6 flex items-center px-6 py-2 justify-between">
                            <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Pants_Length/Pants_Length.png" style="color: transparent;">
                            <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Length / நீளம்</label>
                            <div class="mt-0"><div class="relative">
                                <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                            </div></div></div></div></div>




                </div>




            </div>

            <button class="edit-button" @click="$dispatch('open-profile-info-modal')">

                Edit
            </button>
        </div>
    </div>

    <!-- Personal Info  End-->


    <!-- Address Info -->
 <div class="p-5 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">Address</h4>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">Country</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">United States</p>
                    </div>

                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">City/State</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                            Phoenix, United States
                        </p>
                    </div>

                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">
                            Postal Code
                        </p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">ERT 2489</p>
                    </div>

                    <div>
                        <p class="mb-2 text-xs leading-normal text-gray-500 dark:text-gray-400">TAX ID</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">AS4568384</p>
                    </div>
                </div>
            </div>

            <button @click="$dispatch('open-profile-address-modal')"
                class="flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"
                        fill="" />
                </svg>
                Edit
            </button>
        </div>
    </div>
    <!-- Address Info End -->



    </div>




    <!-- Customer Search Model -->

    <div id="searchModal"
class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-black/30 backdrop-blur-sm" style="background-color: lightgrey !important;">

    <div class="w-half max-w-2xl bg-white rounded-2xl shadow-xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Search Customer</h3>
            <button onclick="closeSearchModal()" class="text-gray-400 hover:text-red-500 text-xl">✕</button>
        </div>

        <!-- BODY -->
        <div class="p-6">

            <!-- SEARCH INPUT -->
            <div class="mb-4 flex gap-2">
                <input type="text" id="searchPhone"
                    placeholder="Enter phone number..."
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200">

                <button onclick="searchCustomer()"
                    class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs">
                    Search
                </button>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto border rounded-lg">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                            <th class="px-4 py-3 text-left">Customer ID</th>
                            <th class="px-4 py-3 text-left">City</th>
                            <th class="px-4 py-3 text-left">State</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody id="customerTable" class="divide-y">

                        <!-- SAMPLE DATA -->
                        <tr>
                            <td class="px-4 py-3">Ravi Kumar</td>
                            <td class="px-4 py-3">9876543210</td>
                            <td class="px-4 py-3">CUS001</td>
                            <td class="px-4 py-3">Chennai</td>
                            <td class="px-4 py-3">Tamil Nadu</td>
                            <td class="px-4 py-3 text-center">
                                <button onclick="selectCustomer('CUS001')"
                                    class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs">
                                    Select
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

    <!-- Customer Search Model End -->


    <script>

function openSearchModal() {
    document.getElementById('searchModal').classList.remove('hidden');
}

function closeSearchModal() {
    document.getElementById('searchModal').classList.add('hidden');
}

function searchCustomer() {
    let phone = document.getElementById('searchPhone').value;
    console.log("Searching for:", phone);

    // 👉 Here you will call AJAX (Laravel)
}

function selectCustomer(id) {
    //alert("Selected Customer: " + id);
    closeSearchModal();
}

</script>



    @endsection
