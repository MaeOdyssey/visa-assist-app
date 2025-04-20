<template>
    <div class="bg-[#e3f4f1] min-h-screen px-6 py-12 text-gray-800 font-sans">
      <div class="max-w-5xl mx-auto animate-fade-in-down space-y-10">
  
        <div class="text-center md:text-left">
          <h1 class="text-4xl font-extrabold text-blue-900 mb-2">📄 My Visa Applications</h1>
          <p class="text-gray-600 text-lg">Here's a list of your past and current visa applications.</p>
        </div>
  
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div
            v-for="app in applications"
            :key="app.id"
            class="bg-white p-6 rounded-xl shadow hover:shadow-md transition-all"
          >
            <h2 class="text-xl font-semibold text-blue-800 mb-1">{{ app.visa_type }}</h2>
            <p class="text-sm text-gray-500 mb-2">{{ app.purpose || 'No purpose provided' }}</p>
            <span
              class="inline-block text-xs font-semibold px-3 py-1 rounded-full"
              :class="getStatusClass(app.status)"
            >
              {{ app.status }}
            </span>
          </div>
        </div>
  
        <div v-if="applications.length === 0" class="text-center text-gray-500">
          No applications yet. 🧳 Ready to start your journey?
        </div>
  
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, onMounted } from 'vue';
  import api from '@/services/api';
  
  interface VisaApplication {
    id: number;
    visa_type: string;
    purpose: string | null;
    status: string;
  }
  
  const applications = ref<VisaApplication[]>([]);
  
  onMounted(async () => {
    const res = await api.get('/applications');
    applications.value = res.data;
  });
  
  function getStatusClass(status: string): string {
    switch (status?.toLowerCase()) {
      case 'pending':
        return 'bg-yellow-100 text-yellow-800';
      case 'approved':
        return 'bg-green-100 text-green-800';
      case 'rejected':
        return 'bg-red-100 text-red-800';
      case 'under review':
        return 'bg-blue-100 text-blue-800';
      default:
        return 'bg-gray-200 text-gray-800';
    }
  }
  </script>
  