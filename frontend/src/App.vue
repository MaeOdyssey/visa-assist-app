<template>
  <div class="min-h-screen bg-[#e3f4f1] text-gray-800 font-sans">
    <!-- Optional shared header -->
    <header class="flex justify-between items-center px-6 py-4 shadow-sm bg-[#d5ece7]">
      <h1 class="text-xl font-bold text-blue-800">Visa Journey 🌍</h1>
      <nav>
        <RouterLink to="/login" class="text-blue-700 hover:underline font-medium">Client Login</RouterLink>
        <span class="mx-2 text-gray-400">|</span>
        <RouterLink to="/admin-login" class="text-blue-700 hover:underline font-medium">Admin</RouterLink>
      </nav>
    </header>

    <!-- Injects MainScreenView, LoginView, etc based on the route -->
    <RouterView />

    <!-- Optional shared footer -->
    <footer class="bg-[#d5ece7] py-6 text-center text-sm text-gray-700">
      Built with care. Questions? <a href="#" class="text-blue-600 hover:underline">We’re here to help</a>.
    </footer>
  </div>
</template>

<script setup lang="ts">
// No page-specific imports here!
</script>
