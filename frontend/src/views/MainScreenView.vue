<template>
  <div class="min-h-screen bg-[#e3f4f1] text-gray-800 font-sans px-4 py-16 md:py-24">
    <div class="max-w-6xl mx-auto flex flex-col-reverse md:flex-row items-center justify-between gap-12 animate-fade-in-down">
      
      <!-- Left Content -->
      <div class="w-full md:w-1/2 text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 leading-tight mb-6 tracking-tight">
          Wherever you're going,<br />
          <span class="text-blue-600">we're here to help</span>
        </h1>

        <p class="text-gray-700 text-lg leading-relaxed mb-8 max-w-lg">
          Visa Journey is built to guide you with clarity, care, and kindness — every step of the way.
          We're here for individuals, families, and communities across the world.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
          <RouterLink 
            to="/register" 
            class="py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-sm hover:shadow-md transition-all duration-300 active:scale-95"
          >
            Begin Your Application
          </RouterLink>

          <RouterLink 
            to="/login" 
            class="py-3 px-6 bg-white hover:bg-gray-50 text-blue-700 font-medium rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300 active:scale-95"
          >
            Admin Sign In
          </RouterLink>
        </div>

        <p class="text-sm text-gray-500 mt-12">
          Questions or need help?
          <a href="#" class="text-blue-500 font-medium underline hover:text-blue-600 transition-colors duration-200">
            We're here to support you.
          </a>
        </p>
      </div>

      <!-- Illustration -->
      <div class="w-full md:w-1/2 flex justify-center">
        <img 
          :src="globeImg" 
          alt="Globe Illustration" 
          class="w-full max-w-xs md:max-w-md rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-500" 
        />

      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import globeImg from '@/assets/globe.png'
</script>
