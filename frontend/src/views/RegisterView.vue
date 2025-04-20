<template>
    <div class="min-h-screen bg-[#e3f4f1] flex items-center justify-center px-4 py-20">
      <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 animate-fade-in-down">
        <h2 class="text-3xl font-extrabold text-blue-800 text-center mb-6">
          Create your account ✨
        </h2>
  
        <form @submit.prevent="handleRegister" class="space-y-4">
          <input
            v-model="name"
            type="text"
            placeholder="Full Name"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <input
            v-model="email"
            type="email"
            placeholder="Email address"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <input
            v-model="password"
            type="password"
            placeholder="Password"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition-all duration-300"
          >
            Sign Up
          </button>
        </form>
  
        <p v-if="error" class="text-red-600 text-sm text-center mt-4">
          ❌ {{ error }}
        </p>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  import { useRouter } from 'vue-router';
  import api, { setAuthToken } from '@/services/api';
  
  const name = ref('');
  const email = ref('');
  const password = ref('');
  const error = ref('');
  const router = useRouter();
  
  async function handleRegister() {
    error.value = '';
    try {
      const res = await api.post('/register', {
        name: name.value,
        email: email.value,
        password: password.value,
      });
  
      const { token, user } = res.data;
      localStorage.setItem('token', token);
      localStorage.setItem('role', user.role);
      setAuthToken(token);
  
      router.push('/client-dashboard');
    } catch (err) {
      if (err instanceof Error && 'response' in err) {
        error.value = (err as any).response?.data?.message || 'Registration failed';
      } else {
        error.value = 'Registration failed';
      }
    }
  }
  </script>
  