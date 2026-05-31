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
                    <button onclick="confirmOrder()"
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

         <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6 ">
                                Measurement
        </h4>
        <div id="measurementSection" style="width:100%;"></div>

        <div class="flex items-center gap-2">

            <textarea name="notes" id="notes" class="input flex-1" style="width:850px !important;"></textarea>



            <button onclick="openCorrectionModal()" class="shadow-theme-xs flex w-full items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 lg:inline-flex lg:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill=""></path>
                </svg>

            </button>
         <input type="checkbox" id="urgent" name="urgent" class="ml-2">Urgent
         <input type="checkbox" id="washing" name="washing" class="ml-2">Washing
| Qty : <input type="text" id="no_of_qty" name="no_of_qty" style="width:10%;" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-200" style="margin-right: 10px;">
        </div>
        <br />

                 <button class="edit-button" onclick="saveMeasurement()">

                            Save
                        </button>


    </div>





    </div>

    <!-- Personal Info  End-->

    <br />

    <!-- Order Info -->
     <div class="p-5 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6 bg-white-50 dark:bg-white-800/50" style="background-color: #FFF !important;">

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

            <button @click="$dispatch('open-profile-address-modal')" style="display: none;"
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


 <!-- Print Modal -->
 <!-- PRINT MODAL -->
<div id="printModal"
    class="fixed inset-0 z-[99999] hidden items-center justify-center bg-black/70 overflow-y-auto p-5">

    <div
        class="bg-white rounded-2xl max-h-[95vh] overflow-y-auto p-6 relative"
        style="
            width:55%;
            max-width:800px;
            height:80vh;
        ">

        <!-- CLOSE -->
        <button onclick="closePrintModal()"
            class="absolute top-3 right-4 text-2xl text-gray-500 hover:text-red-500">

            ✕

        </button>

        <!-- TITLE -->
        <h2 class="text-2xl font-bold mb-5">
            Order Print Preview
        </h2>

        <!-- CONTENT -->
        <div id="printContent"></div>

    </div>

</div>

 <!-- Print Modal End -->


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

/* function confirmOrder() {
    alert("Order Confirmed!");
    closeCartModal();
} */
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
function loadMeasurement(typeId)
{
    let customerId = $('#customer_id').val();

    $.get('/types/' + typeId + '/measurements', {

        customer_id: customerId

    }, function(res){

        let html = `

            <div style="
                display:grid;
                grid-template-columns: repeat(5, 1fr);
                gap:15px;
                width:100%;
            ">

        `;

        res.forEach(m => {

            html += `

                <div>

                    <label style="
                        display:block;
                        margin-bottom:5px;
                        font-size:14px;
                        font-weight:500;
                    ">
                        ${m.field_name}
                    </label>
                        ( ${m.display_name} )

                    <input
                        type="text"
                        name="measurements[${m.id}]"
                        value="${m.value ?? ''}"
                        style="
                            width:100%;
                            border:1px solid #d1d5db;
                            border-radius:8px;
                            padding:10px;
                        ">

                </div>

            `;
        });

        html += `</div>`;

        $('#measurementSection').html(html);
    });
}

let cart = [];
let editIndex = null;

function saveMeasurement()
{
    let measurements = {};

    $('#measurementSection input').each(function(){

        let id = $(this)
            .attr('name')
            .match(/\d+/)[0];

        let label = $(this)
            .prev('label')
            .text();

        measurements[id] = {

            name: label,

            value: $(this).val()
        };
    });

    // ✅ qty textbox
    let qty = parseInt($('#no_of_qty').val()) || 1;

    let itemData = {

        customer: {

            name: $('#customer_name').val(),

            phone: $('#customer_phone').val(),

            location: $('#customer_location').val()
        },

        type_id: $('#selected_type_id').val(),

        type_name: $('#selectedTypeName').text(),

        measurements: measurements,

        correctionnotes: $('#notes').val(),

        urgent: $('#urgent').is(':checked'),

        washing: $('#washing').is(':checked')
    };

    // ✅ EDIT
    if(editIndex !== null){

        cart[editIndex] = itemData;

        editIndex = null;

    } else {

        // ✅ ADD MULTIPLE ITEMS
        for(let i = 0; i < qty; i++){

            cart.push({

                ...itemData
            });
        }
    }

    openCartModal();

    // ✅ RESET
    $('#measurementSection').html('');

    $('#notes').val('');

    $('#urgent').prop('checked', false);

    $('#washing').prop('checked', false);

    $('#no_of_qty').val('');
}


function openCartModal(){

    let html = '';



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

function editItem(index)
{
    let item = cart[index];

    editIndex = index;

    console.log('Editing Item:', item);

    // ✅ set type
    $('#selected_type_id').val(item.type_id);

    $('#selectedTypeName').text(item.type_name);

    // ✅ load measurements again
    loadMeasurement(item.type_id);

    // ✅ wait render
    setTimeout(() => {

        let measurements = typeof item.measurements === 'string'
            ? JSON.parse(item.measurements)
            : item.measurements;

        // ✅ fill values
        Object.keys(measurements).forEach(key => {

            let m = measurements[key];

            $(`input[name="measurements[${key}]"]`)
                .val(m.value);

        });

    }, 500);

    // ✅ notes
    $('#notes').val(item.correctionnotes ?? '');

    // ✅ urgent
    $('#urgent').prop(
        'checked',
        item.urgent == 1
    );

    // ✅ washing
    $('#washing').prop(
        'checked',
        item.washing == 1
    );
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



// Order Confirmation



function confirmOrder(){

    // 🔴 VALIDATION
    if(cart.length === 0){
        Swal.fire('Error', 'Cart is empty', 'error');
        return;
    }

    let customer_id = $('#customer_id').val();
    let phone = $('#customer_phone').val();

    if(!customer_id){
        Swal.fire('Error', 'Please select customer', 'error');
        return;
    }

    if(!phone){
        Swal.fire('Error', 'Phone number required', 'error');
        return;
    }

    // ✅ CONFIRMATION
    Swal.fire({
        title: 'Confirm Order?',
        text: 'Do you want to save this order?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Save',
        cancelButtonText: 'Cancel'
    }).then((result) => {

        if(result.isConfirmed){

            // 🔥 DISABLE BUTTON
            $('#confirmBtn').prop('disabled', true);

            $.ajax({
                url: '/orders', // ✅ resource route
                type: 'POST',

                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    customer_id: customer_id,
                    phone: phone,
                    items: cart,
                    images: filesArray
                },

                beforeSend: function(){
                    Swal.fire({
                        title: 'Saving...',
                        text: 'Please wait',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },

                success: function(res){

                    if(typeof res === 'string'){
                        res = JSON.parse(res);
                    }

                    if(!res.success){
                        $('#confirmBtn').prop('disabled', false);

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message
                        });
                        return;
                    }

                    // ✅ SUCCESS
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Created',
                        //text: 'Order No: ' + (res.order_no ?? '')
                    }).then(() => {

                        openPrintModal(res.order_id);

                        // 👉 RESET EVERYTHING
                        cart = [];
                        filesArray = [];

                        $('#notes').val('');
                        $('#measurementSection').html('');
                        $('#fileTableBody').html('');
                        $('#customer_id').val('');
                        $('#customer_phone').val('');

                        openCartModal(); // refresh cart UI

                       // location.reload(); // optional
                    });
                },

                error: function(xhr){

                    $('#confirmBtn').prop('disabled', false);

                    console.log(xhr.responseText);

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong'
                    });
                }
            });
        }
    });
}


// Print Modal



</script>

<script>

function openPrintModal(orderId)
{
    $('#printModal')
        .removeClass('hidden')
        .addClass('flex');

    $('#printContent').html(`

        <div class="text-center py-10 text-gray-400">

            Loading...

        </div>

    `);

    $.get('/orders/' + orderId + '/print-details', function(res){

        if(!res.success){

            alert(res.message);

            return;
        }

        let order = res.data;

        let html = '';

        order.items.forEach((item, index) => {

            let track = item.tracks.length
                ? item.tracks[item.tracks.length - 1]
                : null;

            let measurements =
                typeof item.measurements === 'string'
                ? JSON.parse(item.measurements)
                : item.measurements;

            html += `

            <div class="print-block border rounded-2xl mb-6 overflow-hidden">

                <!-- HEADER -->
                <div class="flex justify-between items-center bg-gray-100 px-4 py-3">

                    <div>

                        <h3 class="font-bold text-lg">

                            ${item.item_no}

                        </h3>

                        <p class="text-xs text-gray-500">

                            Order : ${order.order_no}

                        </p>

                    </div>

                    <button
                        onclick="printBlock(this)"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">

                        Print

                    </button>

                </div>

                <!-- TABLE -->
                <table class="w-full text-sm border-collapse">

                    <tbody>

                        <!-- CUSTOMER + ASSIGNED + TYPE -->
                        <tr class="border-b">

                            <td class="bg-gray-50 font-semibold px-4 py-3">
                                Customer
                            </td>

                            <td class="px-4 py-3">

                                ${order.customer?.name ?? ''}

                                |

                                ${order.customer?.phone ?? ''}

                                |

                                ${order.customer?.city ?? ''}

                            </td>

                            <td class="bg-gray-50 font-semibold px-4 py-3">
                                Assigned
                            </td>

                            <td class="px-4 py-3">

                                ${track?.tailor?.name ?? '-'}

                                |

                                ${track?.stage?.name ?? '-'}

                                |

                                ${track?.status ?? '-'}

                            </td>

                            <td class="bg-gray-50 font-semibold px-4 py-3">
                                Type
                            </td>

                            <td class="px-4 py-3">

                                ${item.type?.type ?? '-'}

                            </td>

                        </tr>

                        <!-- NOTES -->
                        <tr class="border-b">

                            <td class="bg-gray-50 font-semibold px-4 py-3">

                                Notes

                            </td>

                            <td colspan="5"
                                class="px-4 py-3 leading-7">

                                ${(item.notes || '')
                                    .replace(/\n/g, '<br>')}

                            </td>

                        </tr>

                        <!-- MEASUREMENTS -->
                        <tr>

                            <td class="bg-gray-50 font-semibold px-4 py-3 align-top">

                                Measurements

                            </td>

                            <td colspan="5"
                                class="px-4 py-3">

                                <table class="w-full text-xs border">

                                    <tbody>

                                        ${Object.values(measurements || {}).map(m => `

                                            <tr class="border-b">

                                                <td class="px-2 py-2 bg-gray-50 w-[250px]">

                                                    ${m.name}

                                                </td>

                                                <td class="px-2 py-2">

                                                    ${m.value}

                                                </td>

                                            </tr>

                                        `).join('')}

                                    </tbody>

                                </table>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            `;
        });

        $('#printContent').html(html);
    });
}

function closePrintModal()
{
    $('#printModal')
        .removeClass('flex')
        .addClass('hidden');
}


</script>

<script>
    function printBlock(btn)
{
    let block = btn.closest('.print-block');

    let win = window.open('', '', 'width=1000,height=700');

    win.document.write(`

        <html>

        <head>

            <title>Print</title>

            <style>

                body{
                    font-family:Arial;
                    padding:20px;
                }

                table{
                    width:100%;
                    border-collapse:collapse;
                }

                td{
                    border:1px solid #ddd;
                    padding:8px;
                    vertical-align:top;
                }

                .bg-gray-50{
                    background:#f9fafb;
                }

                .font-semibold{
                    font-weight:bold;
                }

            </style>

        </head>

        <body>

            ${block.outerHTML}

        </body>

        </html>

    `);

    win.document.close();

    win.focus();

    setTimeout(() => {

        win.print();

    }, 500);
}

</script>



    @endsection
