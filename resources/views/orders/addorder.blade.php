@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="User Profile" />
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">Profile</h3>
         <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
            <div class="flex w-full flex-col items-center gap-6 xl:flex-row">
                <div class="h-20 w-20 overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                    <img src="/images/user/owner.jpg" alt="user" />
                </div>
               <div class="order-3 xl:order-2">
    <h4 id="custName" class="mb-2 text-center text-lg font-semibold text-gray-800 xl:text-left">
        -
    </h4>

    <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">

        <p id="custPhone" class="text-sm text-gray-500">
            -
        </p>

        <div class="hidden h-3.5 w-px bg-gray-300 xl:block"></div>

        <p id="custLocation" class="text-sm text-gray-500">
            -
        </p>



    </div>
</div>
                <div class="order-2 flex grow items-center gap-2 xl:order-3 xl:justify-end">
                    <button data-id="1"
                        class="type-btn shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                       <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/trouser-icon-svg-download-png-1995856.png?f=webp&w=256" />
                    </button>

                    <button data-id="2"
                        class="type-btn shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                       <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/shirt-icon-svg-download-png-1595367.png?f=webp&w=256" />
                    </button>

                    <button data-id="3"
                        class="type-btn shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                         <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/long-sleeve-shirt-icon-svg-download-png-1595364.png?f=webp&w=256" />
                    </button>

                    <button data-id="4"
                        class="type-btn shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/shorts-icon-svg-download-png-1595376.png?f=webp&w=256" />
                    </button>

                     <button data-id="5"
                        class="type-btn shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/blazer-icon-svg-download-png-6931876.png?f=webp&w=256" />
                    </button>

                    <button data-id="6"
                         class="type-btn shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">

                        <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/kurta-icon-svg-download-png-1553110.png?f=webp&w=256" />
                    </button>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button onclick="openCartModal()"
                        class="shadow-theme-xs flex h-11 w-11 items-center justify-center gap-2 rounded-full border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        <img src="https://cdn.iconscout.com/icon/free/png-512/free-cart-icon-svg-download-png-1322328.png?f=webp&w=256" />
                    </button>

<input type="hidden" id="selected_type_id" name="type_id">

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
        <div id="measurementSection" class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
         <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                                Measurement
        </h4>
        </div>
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                        <!-- <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                                Measurement
                            </h4>

                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                                <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:auto !important;">
                                    <div class="p-6 flex items-center px-6 py-2 justify-between">
                                        <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Waist/Waist.png" style="color: transparent;">
                                        <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Waist / இடுப்பு</label>
                                        <div class="mt-0"><div class="relative">
                                            <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                                        </div></div></div></div></div>




                            </div>



                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                                <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:auto !important;">
                                    <div class="p-6 flex items-center px-6 py-2 justify-between">
                                        <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Seat/Seat.png" style="color: transparent;">
                                        <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Seat / பின்புற அளவு</label>
                                        <div class="mt-0"><div class="relative">
                                            <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                                        </div></div></div></div></div>




                            </div>


                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                                <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:auto !important;">
                                    <div class="p-6 flex items-center px-6 py-2 justify-between">
                                        <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Calf/Calf.png" style="color: transparent;">
                                        <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Calf / Knee
            கெண்டைக்கால் / முழங்கால்</label>
                                        <div class="mt-0"><div class="relative">
                                            <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                                        </div></div></div></div></div>




                            </div>


                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                                <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:auto !important;">
                                    <div class="p-6 flex items-center px-6 py-2 justify-between">
                                        <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Ankle/Ankle.png" style="color: transparent;">
                                        <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Bottom / Bells
            கீழே / மணி</label>
                                        <div class="mt-0"><div class="relative">
                                            <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                                        </div></div></div></div></div>




                            </div>


                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32" >
                                <div class="rounded-md bg-card text-card-foreground shadow-sm border border-default mt-2" style="width:auto !important;">
                                    <div class="p-6 flex items-center px-6 py-2 justify-between">
                                        <img alt="Waist" loading="lazy" width="100" height="100" decoding="async" data-nimg="1" src="https://s3.ap-south-1.amazonaws.com/static.tailormate.com/assets/app/images/measurements/male/Pants_Length/Pants_Length.png" style="color: transparent;">
                                        <div class="flex flex-col items-center gap-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-50 inline-block">Length / நீளம்</label>
                                        <div class="mt-0"><div class="relative">
                                            <input class="peer w-full bg-background dark:border-700 px-3 file:border-0 file:bg-transparent file:text-sm file:font-medium read-only:bg-background disabled:cursor-not-allowed disabled:opacity-50 transition duration-300 border-default-300 text-default focus:outline-none focus:border-primary disabled:bg-default-200 placeholder:text-accent-foreground/50 rounded-lg h-12 text-base read-only:leading-[48px] border peer text-center arrow-hide" id="measurement_147ed2b0-1a83-4089-af93-5fa39f9d3734" placeholder=" " name="measurements.0.measurement_value">
                                        </div></div></div></div></div>




                            </div>




                        </div> -->

            <div class="flex items-center gap-2">

            <textarea name="notes" id="notes" class="input flex-1" style="width:850px !important;"></textarea>

            <button onclick="openCorrectionModal()" class="shadow-theme-xs flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill=""></path>
                </svg>

            </button>

        </div>


        </div>
        <br />
         <button class="edit-button" onclick="saveMeasurement()">

                            Save
                        </button>

    </div>

    <!-- Personal Info  End-->


    <!-- Order Info -->
     <div class="p-5 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">

        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                    Order Details

                </h4>

                <div id="cartContent" class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                    <!-- <div>
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
                    </div> -->
                </div>
            </div>


        </div>
    </div>

    <!-- Order Info End -->
<br />
    <!-- Address Info -->
 <div class="p-5 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                    Documents

                </h4>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                   <div class="mb-3">

    <!-- MESSAGE -->
    <div id="noCameraMsg" class="text-red-500 text-sm mb-2 hidden">
        Camera not detected. Please upload files.
    </div>

    <!-- CAMERA -->
    <video id="video" width="200" autoplay class="border hidden"></video>
    <button onclick="capturePhoto()" id="captureBtn"
        class="hidden bg-green-500 text-white px-2 py-1 mt-1 rounded">
        Capture
    </button>

    <!-- FILE UPLOAD (ALWAYS AVAILABLE) -->
    <input type="file" id="fileInput" multiple class="border p-2 w-full mt-2">

</div>

<!-- PREVIEW TABLE -->
<table class="w-full text-sm border">
    <thead class="bg-gray-100">
        <tr>
            <th>#</th>
            <th>Preview</th>
            <th>Source</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="fileTableBody"></tbody>
</table>




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

    <div class="w-half max-w-2xl bg-white rounded-2xl shadow-xl overflow-y-auto" style="min-height:300px;">

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
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-200" maxlength="13">

                <button onclick="searchCustomer()"
                    class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs">
                    Search
                </button>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto border rounded-lg" style="height:300px;">

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
                       <!--  <tr>
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
                        </tr> -->

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

    <!-- Customer Search Model End -->


<!-- Correcton Note Search Model -->

    <div id="CorrectionModal"
class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-black/30 backdrop-blur-sm" style="background-color: lightgrey !important;">

    <div class="w-half max-w-2xl bg-white rounded-2xl shadow-xl overflow-y-auto" style="min-height:300px;">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Search Customer</h3>
            <button onclick="closecorrectionModal()" class="text-gray-400 hover:text-red-500 text-xl">✕</button>
        </div>

        <!-- BODY -->
        <div class="p-6">

            <!-- SEARCH INPUT -->
            <div class="mb-4 flex gap-2">

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto border rounded-lg" style="height:300px;">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-4 py-3 text-left"></th>
                            <th class="px-4 py-3 text-left">Description</th>

                        </tr>
                    </thead>

                    <tbody id="correctionTableBody" class="divide-y">

                        <!-- SAMPLE DATA -->
                       <!--  <tr>
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
                        </tr> -->

                    </tbody>

                </table>

            </div>
<button onclick="saveCorrections()" class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs"> Select</button>
        </div>

    </div>

</div>

    <!-- Correction Notes -->





    <!-- Cart Modal -->

    <div id="cartModal"
class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-black/30 backdrop-blur-sm" style="background-color: lightgrey !important;">

    <div class="w-half max-w-2xl bg-white rounded-2xl shadow-xl">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">
                Order Checkout
            </h3>
            <button onclick="closeCartModal()" class="text-gray-400 hover:text-red-500 text-xl">✕</button>
        </div>

        <!-- BODY -->
        <!-- BODY -->
<div class="p-4 space-y-6">

    <!-- 🔥 CUSTOMER DETAILS -->
    <div class="bg-gray-50 border rounded-xl p-4">

        <h4 class="text-sm font-semibold text-gray-800 mb-3">
            Customer Details
        </h4>

        <div class="grid grid-cols-2 gap-4 text-sm">

            <div>
                <p class="text-gray-500">Customer ID</p>
                <p class="font-medium text-gray-800">CUS001</p>
            </div>

            <div>
                <p class="text-gray-500">Name</p>
                <p class="font-medium text-gray-800">Ravi Kumar</p>
            </div>

            <div>
                <p class="text-gray-500">Phone</p>
                <p class="font-medium text-gray-800">9876543210</p>
            </div>

            <div>
                <p class="text-gray-500">City</p>
                <p class="font-medium text-gray-800">Chennai</p>
            </div>

            <div class="col-span-2">
                <p class="text-gray-500">State</p>
                <p class="font-medium text-gray-800">Tamil Nadu</p>
            </div>

        </div>

    </div>

    <!-- 🔥 ORDER TABLE -->
    <div id="cartContent1" class="overflow-x-auto border rounded-lg">

        <!-- <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-center">Qty</th>
                    <th class="px-4 py-3 text-left">Order Date</th>
                    <th class="px-4 py-3 text-left">Comments</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <tr>
                    <td class="px-4 py-3 font-medium">Pant</td>
                    <td class="px-4 py-3 text-center">2</td>
                    <td class="px-4 py-3">18 Apr 2026</td>
                    <td class="px-4 py-3 text-gray-500">Urgent stitching</td>
                </tr>

                <tr>
                    <td class="px-4 py-3 font-medium">Shirt</td>
                    <td class="px-4 py-3 text-center">3</td>
                    <td class="px-4 py-3">18 Apr 2026</td>
                    <td class="px-4 py-3 text-gray-500">Regular</td>
                </tr>

            </tbody>

        </table> -->

    </div>

    <!-- 🔥 SUMMARY -->
    <div class="flex justify-between items-center text-sm">

        <span class="text-gray-500">
            Total Items: <strong>5</strong>
        </span>



    </div>

</div>

        <!-- FOOTER -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t">

            <button onclick="closeCartModal()"
                class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
                Cancel
            </button>

            <button onclick="confirmOrder()"
                class="px-5 py-2 bg-green-600 text-red rounded-lg hover:bg-green-700">
                Confirm Order
            </button>

        </div>

    </div>

</div>



<!-- New Customer Modal -->
 <div id="newcustomerModal" onclick="if(event.target.id==='customerModal') closeModal()"
    class="fixed inset-0 z-[99999] hidden flex items-center justify-center bg-white/40 backdrop-blur-md">

    <!-- Modal Box -->
    <div class="relative" style="width: 900px !important; border-radius: 12px; background-color: whitesmoke !important;">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-t-2xl">
            <h3 class="text-lg font-semibold text-gray-800">
                Add Customer
            </h3>
            <button onclick="closeModal()" class="text-xl text-gray-500 hover:text-red-500">✕</button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[80vh] overflow-y-auto">

           <form id="customerForm">
    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div class="flex items-center gap-2">
            <label class="w-24 text-sm">Name :</label>
            <input name="name" class="input flex-1" required>
        </div>

        <div class="flex items-center gap-2">
            <label class="w-20 text-sm">DOB :</label>
            <input type="date" name="dob" class="input flex-1">
        </div>

        <div class="flex items-center gap-2">
            <label class="w-24 text-sm">Phone :</label>
            <input name="phone"   class="input flex-1" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  maxlength="11" required >
        </div>

         <div class="flex items-center gap-2">
            <label class="w-24 text-sm">Relation :</label>
            <select name="relation" class="input">
            <option value="self">Self</option>
            <option value="spouse">Spouse</option>
            <option value="son">Son</option>
            <option value="daughter">Daughter</option>
            </select
>
        </div>

        <div class="flex items-center gap-2">
            <label class="w-20 text-sm">City :</label>

            <select name="city" id="" class="input flex-1">
                <option value="">Select City</option>
                @foreach($city_list as $city)
                    <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-2">
            <label class="w-24 text-sm">State :</label>
            <select name="state" id="" class="input flex-1">
                <option value="">Select State</option>
                @foreach($state_list as $state)
                    <option value="{{ $state->state_name }}">{{ $state->state_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-2">
            <label class="w-20 text-sm">District :</label>

            <select name="district" id="" class="input flex-1">
                <option value="">Select District</option>
                @foreach($district_list as $district)
                    <option value="{{ $district->district_name }}">{{ $district->district_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-2 flex items-start gap-2">
            <label class="w-24 text-sm mt-2">Address :</label>
            <textarea name="address" class="input flex-1"></textarea>
        </div>

        <input type="text" id="customer_id" name="id">

    </div>

    <div class="flex justify-end gap-3 mt-6">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-lg">
            Cancel
        </button>

        <button type="submit"  class="px-4 py-2 bg-brand-500 text-white rounded-lg">
            Save
        </button>
    </div>
</form>

        </div>
    </div>
</div>
 <!-- New Customer Modal End -->


 <input type="hidden" id="customer_name"  >
        <input type="hidden" id="customer_phone">
         <input type="hidden" id="customer_location" >

<style>
.input {
    width: 100%;
    margin-top: 6px;
    padding: 10px 12px;
    border: 1px solid #000;
    border-radius: 10px;
    outline: none;
}
.input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 2px rgba(59,130,246,0.2);
}
</style>


    <!-- Cart Modal End -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

function openSearchModal() {
    document.getElementById('searchModal').classList.remove('hidden');
}

function closeSearchModal() {
    document.getElementById('searchModal').classList.add('hidden');
}
function closecorrectionModal() {
    document.getElementById('CorrectionModal').classList.add('hidden');
}



function selectCustomer(id, name, phone, city, district){
//alert('Selected Customer ID: ' + id + '\nName: ' + name + '\nPhone: ' + phone + '\nCity: ' + city + '\nDistrict: ' + district);
    $('#custName').text(name);
    $('#custPhone').text(phone);
    $('#customer_id').val(id);
    $('#customer_name').val(name);
    $('#customer_phone').val(phone);
    $('#customer_location').val((city ?? '') + ', ' + (district ?? ''));
    $('#custLocation').text((city ?? '') + ', ' + (district ?? ''));

    document.getElementById('searchModal').classList.add('hidden');

}

</script>

<script>
/* function openCartModal() {
    document.getElementById('cartModal').classList.remove('hidden');
} */

function closeCartModal() {
    document.getElementById('cartModal').classList.add('hidden');
}

function confirmOrder() {
    alert("Order Confirmed!");
    closeCartModal();
}
</script>
<script>
function searchCustomer(){

    let phone = $('#searchPhone').val();

    if(!phone){
        alert('Enter phone number');
        return;
    }

    $('#customerTable').html(`
        <tr><td colspan="6" class="text-center py-3">Loading...</td></tr>
    `);

    $.get('/customers/search', { phone: phone }, function(res){

        if(res.length === 0){
            openCustomerModal(phone);
            return;
        }

        renderTable(res);
    });
}

// 🧾 RENDER TABLE
function renderTable(res){

    let rows = '';

    res.forEach(c => {
        rows += `
        <tr>
            <td class="px-4 py-3">${c.name}</td>
            <td class="px-4 py-3">${c.phone}</td>
            <td class="px-4 py-3">C${c.id}</td>
            <td class="px-4 py-3">${c.city ?? '-'}</td>
            <td class="px-4 py-3">${c.state ?? '-'}</td>
            <td class="px-4 py-3 flex gap-2">
            <button onclick="selectCustomer('${c.id}', '${c.name}', '${c.phone}', '${c.city}', '${c.district}')"
            class="bg-green-500 text-white px-2 py-1 rounded">
            Select
            </button>

            <button onclick="openSpouseModal('${c.id}')"
            class="bg-blue-500 text-white px-2 py-1 rounded">
            +
            </button>
            </td>
        </tr>`;
    });

    $('#customerTable').html(rows);
}

// ➕ OPEN MODAL
function openCustomerModal(phone){

    $('#customerForm')[0].reset();
    $('input[name=phone]').val(phone);

    $('#newcustomerModal').removeClass('hidden');
}

// ❌ CLOSE MODAL
function closeModal(){
    $('#newcustomerModal').addClass('hidden');
}

// 💾 SAVE CUSTOMER


// 🎯 SELECT CUSTOMER



$('#searchPhone').on('keypress', function(e){
    if(e.which == 13){
        searchCustomer();
    }
});

function openSpouseModal(customerId){
    let phone = $('#searchPhone').val();
     $('input[name=phone]').val(phone);
     $('#customer_id').val(customerId);
     $('#newcustomerModal').removeClass('hidden');
     document.getElementById('searchModal').classList.add('hidden');
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){

    // ✅ CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#customerForm').submit(function(e){
        e.preventDefault();

        let id = $('#customer_id').val(); // 👈 hidden input

        let url = '/customers/newstore';
        let formData = $(this).serialize();

        // 👉 for update
        if(id){
            formData += '&_method=POST';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,

            success: function(res){

                if(typeof res === 'string'){
                    res = JSON.parse(res);
                }

                // 🔴 ERROR
                if(res.success === false){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: res.message,
                        width: '300px',
                        padding: '1rem'
                    });
                    return;
                }

                // ✅ SUCCESS
                Swal.fire({
                    icon: 'success',
                    title: id ? 'Updated' : 'Saved',
                    text: res.message,
                    width: '300px',
                    padding: '1rem',
                    confirmButtonText: 'OK'
                }).then(() => location.reload());
            },

            error: function(err){
                console.log(err.responseText);

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong',
                    width: '300px'
                });
            }
        });

    });

});

function correctionnotes(){

    $('#CorrectionModal').removeClass('hidden');
}
</script>


<script>

let selectedType = null;

$(document).on('click', '.type-btn', function(){


    let customerId = $('#customer_id').val();


    if(!customerId){
        Swal.fire({
            title: 'Customer Not Selected',
            text: 'Choose Customer Before Proceeding',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Okay',
            cancelButtonText: 'No'
        });
        return;
    }

    let newType = $(this).data('id');


    // 👉 if already selected
    if(selectedType !== null && selectedType != newType){

        Swal.fire({
            title: 'Change Type?',
            text: 'Do you want to replace existing type?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {

            if(result.isConfirmed){
                setType(newType, this);
            }
        });

    } else {
        setType(newType, this);
    }

});

function setType(typeId, element){

    selectedType = typeId;

    $('#selected_type_id').val(typeId);

    // 👉 UI highlight
    $('.type-btn').removeClass('ring-2 ring-blue-500');
    $(element).addClass('ring-2 ring-blue-500');
    loadMeasurement(typeId);

}


// Measurement scripts
function loadMeasurement(typeId){

    $.get('/types/'+typeId+'/measurements', function(res){

        let html = '';

        res.forEach(m => {
            html += `
                <div class="mb-2">
                    <label>${m.field_name}</label>
                    <input name="measurements[${m.id}]" class="input">
                </div>
            `;
        });

        $('#measurementSection').html(html);
    });
}

let cart = [];
let editIndex = null;

function saveMeasurement(){

    let measurements = {};

    $('#measurementSection input').each(function(){

        let id = $(this).attr('name').match(/\d+/)[0];
        let label = $(this).prev('label').text();

        measurements[id] = {
            name: label,
            value: $(this).val()
        };
    });

    let itemData = {
        customer: {
            name: $('#customer_name').val(),
            phone: $('#customer_phone').val(),
            location: $('#customer_location').val()
        },
        type_id: $('#selected_type_id').val(),
        type_name: $('#selectedTypeName').text(),
        measurements: measurements,
        correctionnotes: $('#notes').val()
    };

    // 👉 UPDATE OR ADD
    if(editIndex !== null){

        cart[editIndex] = itemData; // update

        editIndex = null;

    } else {

        cart.push(itemData); // new
    }

    openCartModal();

    // 👉 reset form
    $('#measurementSection').html('');
    $('#notes').val('');
}


function openCartModal(){

    let html = '';

    // 👉 CUSTOMER TABLE (FULL WIDTH)
   /*  if(cart.length > 0){

        let c = cart[0].customer;

        html += `
            <table class="w-full text-sm border mb-4">
                <thead class="bg-blue-100 text-gray-700">
                    <tr>
                        <th class="p-2 text-left">Customer Name</th>
                        <th class="p-2 text-left">Phone</th>
                        <th class="p-2 text-left">Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="p-2 font-semibold">${c.name}</td>
                        <td class="p-2">${c.phone}</td>
                        <td class="p-2">${c.location}</td>
                    </tr>
                </tbody>
            </table>
        `;
    } */

    // 👉 ORDER ITEMS TABLE (FULL WIDTH)
    html += `
        <table class="w-full text-sm border">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-2 text-left">#</th>
                    <th class="p-2 text-left">Type</th>
                    <th class="p-2 text-left">Measurements</th>
                    <th class="p-2 text-left">Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    `;


    cart.forEach((item, index) => {

        let measurementHtml = '';

        for(let key in item.measurements){

            let m = item.measurements[key];

            measurementHtml += `
                <div class="text-xs">
                    ${m.name}: <b>${m.value}</b>
                </div>
            `;
        }

        html += `
            <tr class="border-t">
                <td class="p-2">${index+1}</td>

                <td class="p-2 font-semibold">
                    ${item.type_name ?? item.type_id}
                </td>

                <td class="p-2">
                    ${measurementHtml}
                </td>

                <td class="p-2">
                    ${
                        item.correctionnotes
                        ? `<div class="text-xs text-red-500 whitespace-pre-line">${item.correctionnotes},</div>`
                        : '-'
                    }
                </td>
                <td>
                 <button onclick="editItem(${index})" class="text-blue-500 text-xs mr-2">Edit</button>
    <button onclick="removeItem(${index})" class="text-red-500 text-xs">Delete</button>
</td>
            </tr>
        `

    });

    html += `
        <tr class="bg-gray-100 font-semibold">
        <td colspan="5s" class="p-2 text-right">
            Total Items: ${cart.length}
        </td>
        </tr>

            </tbody>
        </table>
    `;

    $('#cartContent').html(html);
}



// correction notes scripts
function openCorrectionModal(){


    let type_id = $('#selected_type_id').val();

    if(!type_id){
        alert('Please select type first');
        return;
    }

    selectedCorrections = [];

    $.get('/types/'+type_id+'/corrections', function(res){

        let data = res.data ? res.data : res;

        let rows = '';

        if(data.length === 0){
            rows = `
                <tr>
                    <td colspan="2" class="text-center py-3 text-gray-400">
                        No corrections found
                    </td>
                </tr>
            `;
        } else {

            data.forEach(c => {
                rows += `
                    <tr class="border-t">
                        <td class="px-3 py-2">
                            <input type="checkbox"
                                class="correctionCheck"
                                value="${c.id}"
                                data-name="${c.description ?? c.name}">
                        </td>

                        <td class="px-3 py-2">
                            ${c.description ?? c.name}
                        </td>
                    </tr>
                `;
            });
        }

        $('#correctionTableBody').html(rows);

       $('#CorrectionModal').removeClass('hidden');
    });
}


function saveCorrections(){

    let newSelections = [];

    $('.correctionCheck:checked').each(function(){

        newSelections.push($(this).data('name'));

    });

    // 👉 Get existing notes (split by line)
    let existingNotes = $('#notes').val()
        ? $('#notes').val().split('\n')
        : [];

    // 👉 Merge + remove duplicates
    let finalNotes = [...new Set([...existingNotes, ...newSelections])];

    // 👉 Set back to textarea
    $('#notes').val(finalNotes.join('\n'));

    // 👉 Optional: update global array also
    selectedCorrections = finalNotes.map((name, index) => ({
        id: index,
        name: name
    }));

    document.getElementById('CorrectionModal').classList.add('hidden');
}

function removeItem(index){

    // 👉 remove item from array
    cart.splice(index, 1);

    // 👉 re-render cart UI
    openCartModal();
}

function editItem(index){

    let item = cart[index];

    editIndex = index;

    // 👉 set type
    $('#selected_type_id').val(item.type_id);
    $('#selectedTypeName').text(item.type_name);

    // 👉 load measurement fields again
    loadMeasurement(item.type_id);

    // 👉 wait for fields to render
    setTimeout(() => {

        for(let key in item.measurements){

            let m = item.measurements[key];

            // find input by label match
            $('#measurementSection label').each(function(){

                if($(this).text().trim() === m.name){
                    $(this).next('input').val(m.value);
                }

            });
        }

    }, 300);

    // 👉 notes
    $('#notes').val(item.correctionnotes ?? '');

}



// Image Upload options
let filesArray = [];
let editFileIndex = null;

$(document).ready(function(){

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia){

        navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {

            $('#video').removeClass('hidden');
            $('#captureBtn').removeClass('hidden');

            document.getElementById('video').srcObject = stream;

        })
        .catch(() => {
            showNoCamera();
        });

    } else {
        showNoCamera();
    }

});

function showNoCamera(){
    $('#noCameraMsg').removeClass('hidden');
    $('#video').addClass('hidden');
    $('#captureBtn').addClass('hidden');
}
$('#fileInput').on('change', function(e){

    let files = e.target.files;

    for(let i=0; i<files.length; i++){

        let reader = new FileReader();

        reader.onload = function(ev){

            if(editFileIndex !== null){

                filesArray[editFileIndex] = {
                    src: ev.target.result,
                    type: 'file'
                };

                editFileIndex = null;

            } else {

                filesArray.push({
                    src: ev.target.result,
                    type: 'file'
                });
            }

            renderFiles();
        };

        reader.readAsDataURL(files[i]);
    }

});
function capturePhoto(){

    let video = document.getElementById('video');

    let canvas = document.createElement('canvas');
    canvas.width = 200;
    canvas.height = 150;

    let ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, 200, 150);

    let img = canvas.toDataURL('image/png');

    filesArray.push({
        src: img,
        type: 'camera'
    });

    renderFiles();
}
function renderFiles(){

    let html = '';

    if(filesArray.length === 0){
        html = `<tr><td colspan="4" class="text-center p-3 text-gray-400">No files</td></tr>`;
    }

    filesArray.forEach((file, index) => {

        html += `
            <tr class="border-t">

                <td class="p-2">${index+1}</td>

                <td class="p-2">
                    <img src="${file.src}" width="80" class="rounded border">
                </td>

                <td class="p-2 text-xs">
                    ${file.type === 'camera' ? 'Camera' : 'Upload'}
                </td>

                <td class="p-2">

                    <button onclick="editFile(${index})"
                        class="text-blue-500 text-xs mr-2">
                        Edit
                    </button>

                    <button onclick="deleteFile(${index})"
                        class="text-red-500 text-xs">
                        Delete
                    </button>

                </td>

            </tr>
        `;
    });

    $('#fileTableBody').html(html);
}
function deleteFile(index){
    filesArray.splice(index, 1);
    renderFiles();
}
function editFile(index){
    editFileIndex = index;
    $('#fileInput').click();
}

</script>




    @endsection
