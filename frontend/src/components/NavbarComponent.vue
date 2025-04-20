<template>
    <nav class="flex justify-between p-4 shadow">
      <RouterLink to="/" class="font-bold text-xl text-blue-700">Visa Journey</RouterLink>
      <div class="space-x-4">
        <RouterLink v-if="!isLoggedIn" to="/login">Login</RouterLink>
        <button
          v-else
          @click="logout"
          class="text-red-600 hover:underline"
        >Logout</button>
      </div>
    </nav>
  </template>
  
  <script setup lang="ts">
  import { computed } from 'vue';
  import { logoutUser } from '@/utils/auth';
  
  const isLoggedIn = computed(() => !!localStorage.getItem('token'));
  
  function logout() {
    logoutUser();
  }
  </script>
  