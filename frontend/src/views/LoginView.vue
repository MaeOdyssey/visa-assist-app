<template>
<div class="bg-[#e3f4f1] flex items-center justify-center px-4 py-20">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 animate-fade-in-down">
      <h2 class="text-3xl font-extrabold text-blue-800 text-center mb-6">
        Welcome back 👋
      </h2>

      <form @submit.prevent="handleLogin" class="space-y-4">
        <input
          v-model="email"
          type="email"
          placeholder="Email address"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
          required
        />
        <input
          v-model="password"
          type="password"
          placeholder="Password"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
          required
        />
        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-all duration-300 shadow-sm hover:shadow-md active:scale-95"
        >
          Log In
        </button>
      </form>

      <p v-if="error" class="text-red-600 text-sm mt-4 text-center">{{ error }}</p>

      <p class="text-gray-500 text-sm text-center mt-8">
        Need help logging in?
        <a href="#" class="text-blue-500 font-medium underline hover:text-blue-600 transition">
          Contact support
        </a>
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import api, { setAuthToken } from '@/services/api';

const email = ref('');
const password = ref('');
const error = ref('');
const router = useRouter();

async function handleLogin() {
  error.value = '';
  try {
    const res = await api.post('/login', { email: email.value, password: password.value });
    const { token, user } = res.data;

    localStorage.setItem('token', token);
    localStorage.setItem('role', user.role);
    setAuthToken(token);

    if (user.role === 'admin') {
      router.push('/admin');
    } else {
      router.push('/client-dashboard');
    }
  } catch (err) {
    if (err instanceof Error && 'response' in err) {
      error.value = (err as any).response?.data?.message || 'Login failed';
    } else {
      error.value = 'Login failed';
    }
  }
}
</script>
