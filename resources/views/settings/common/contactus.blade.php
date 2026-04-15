@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="Support" />
    <div class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7
dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

    <div class="mx-auto w-full max-w-[700px] text-center">

        <!-- TITLE -->
        <h3 class="mb-3 font-semibold text-gray-800 text-2xl dark:text-white">
            Contact us for support
        </h3>

        <!-- DESCRIPTION -->
        <p class="text-sm text-gray-500 dark:text-gray-400">
            We are here to help you! If you have any issues, questions, or suggestions,
            feel free to reach out to us anytime.
        </p>

        <!-- 🔥 TOP IMAGE -->


        <!-- SUPPORT CARDS -->
        <div class="mt-6 grid gap-4 sm:grid-cols-3 text-left">

            <!-- WEBSITE -->
            <div class="bg-gray-50 dark:bg-white/[0.05] border rounded-xl p-4 shadow-sm hover:shadow-md transition">
                <div class="mb-2 text-blue-600 text-xl">🌐</div>
                <p class="text-sm text-gray-500">Website</p>
                <a href="https://yourwebsite.com" target="_blank"
                   class="text-sm font-medium text-blue-600 hover:underline">
                    www.tailadmin.com
                </a>
            </div>

            <!-- PHONE -->
            <div class="bg-gray-50 dark:bg-white/[0.05] border rounded-xl p-4 shadow-sm hover:shadow-md transition">
                <div class="mb-2 text-green-600 text-xl">📞</div>
                <p class="text-sm text-gray-500">Call Us</p>
                <p class="text-sm font-medium text-gray-800 dark:text-white">
                    +91 98765 43210
                </p>
            </div>

            <!-- EMAIL -->
            <div class="bg-gray-50 dark:bg-white/[0.05] border rounded-xl p-4 shadow-sm hover:shadow-md transition">
                <div class="mb-2 text-red-500 text-xl">✉️</div>
                <p class="text-sm text-gray-500">Email</p>
                <a href="mailto:support@yourdomain.com"
                   class="text-sm font-medium text-blue-600 hover:underline">
                    support@tailadmin.com
                </a>
            </div>

        </div>

        <!-- 🔥 BOTTOM IMAGE -->
     <img
    src="https://img.freepik.com/free-vector/customer-support-illustration_23-2148887720.jpg"
    alt="Support Lady"
    class="mx-auto mt-2 w-56 h-auto object-contain rounded-xl"
/>

        <!-- SUPPORT TIME -->
        <p class="mt-5 text-xs text-gray-400">
            Support Available: Mon - Sat | 9:00 AM - 7:00 PM
        </p>

        <!-- OPTIONAL BUTTON -->
        <a href="https://wa.me/919876543210"
           class="inline-block mt-4 bg-green-500 text-white px-5 py-2 rounded-lg shadow hover:bg-green-600">
            💬 Chat on WhatsApp
        </a>

    </div>

</div>
@endsection
