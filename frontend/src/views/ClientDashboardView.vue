<template>
  <div class="min-h-screen bg-[#e3f4f1] text-gray-800 font-sans px-6 py-12">
    <div class="max-w-6xl mx-auto animate-fade-in-down space-y-10">

      <!-- Welcome -->
      <div class="text-center md:text-left">
        <h1 class="text-4xl font-extrabold text-blue-900 mb-2">
          Welcome, traveler! 🎒🛂
        </h1>
        <p class="text-lg text-gray-700">
          Here's a quick look at your visa journey and what's next.
        </p>
        <RouterLink to="/client/apply" class="text-blue-600 hover:underline font-medium">
          + Submit New Visa Application
        </RouterLink>

      </div>

      <!-- Dashboard Cards -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Upcoming Appointment -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition-all">
          <h2 class="text-xl font-semibold text-blue-800 mb-2">📅 Next Appointment</h2>
          <p class="text-sm text-gray-600">Tuesday, April 23rd @ 2:00PM</p>
        </div>

        <!-- Visa Status -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition-all">
          <h2 class="text-xl font-semibold text-blue-800 mb-2">🛂 Visa Status</h2>
          <p class="text-sm text-gray-600">Under review — expect update within 3 business days</p>
        </div>

        <!-- Documents -->
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition-all">
          <h2 class="text-xl font-semibold text-blue-800 mb-2">📎 Documents</h2>
          <p class="text-sm text-gray-600">2 uploaded · 1 required</p>
          <RouterLink to="/upload-docs" class="text-blue-600 font-medium hover:underline mt-2 block">
            Upload now →
          </RouterLink>
        </div>

      </div>

      <!-- Support Box -->
      <div class="bg-[#f0fdfb] border border-blue-100 p-6 rounded-xl text-center md:text-left">
        <p class="text-gray-700">
          💬 Need help or have a question? Our support team is here for you.
        </p>
        <a href="#" class="text-blue-500 font-medium underline hover:text-blue-600 transition">
          Contact Support
        </a>
      </div>

    </div>
  </div>
</template>

<script setup lang="ts">
// No script logic yet — static dashboard mockup
</script>
