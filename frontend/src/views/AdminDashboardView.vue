<template>
  <div class="min-h-screen bg-[#e3f4f1] text-gray-800 font-sans px-6 py-12">
    <div class="max-w-6xl mx-auto animate-fade-in-down space-y-10">

      <!-- Page Heading -->
      <div class="text-center md:text-left">
        <h1 class="text-4xl font-extrabold text-blue-900 mb-2">📋 Visa Applications</h1>
        <p class="text-lg text-gray-700">Review submitted applications from clients around the world.</p>
      </div>

      <!-- Application List -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="app in applications"
          :key="app.id"
          class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition-all"
        >
          <h2 class="text-xl font-semibold text-blue-800 mb-1">{{ app.visa_type }}</h2>
          <p class="text-sm text-gray-500 mb-2">Submitted: {{ formatDate(app.created_at) }}</p>

          <!-- Status Badge -->
          <span
            class="inline-block text-xs font-semibold px-3 py-1 rounded-full"
            :class="getStatusClass(app.status)"
          >
            {{ app.status }}
          </span>

          <!-- View Button -->
          <RouterLink
            :to="`/admin/applications/${app.id}`"
            class="block mt-4 text-blue-600 hover:underline font-medium"
          >
            View Application →
          </RouterLink>
        </div>
      </div>

      <!-- Empty State -->
      <div v-if="applications.length === 0" class="text-center text-gray-500">
        No applications found. 🎉
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { fetchApplications } from '@/services/api';

interface VisaApplication {
  id: number;
  visa_type: string;
  created_at: string;
  status: string;
}

const applications = ref<VisaApplication[]>([]);

onMounted(async () => {
  const res = await fetchApplications();
  applications.value = res.data;
});

function formatDate(dateStr: string): string {
  const options = { year: 'numeric', month: 'short', day: 'numeric' } as const;
  return new Date(dateStr).toLocaleDateString(undefined, options);
}

function getStatusClass(status: string): string {
  switch (status.toLowerCase()) {
    case 'pending':
      return 'bg-yellow-100 text-yellow-800';
    case 'approved':
      return 'bg-green-100 text-green-800';
    case 'rejected':
      return 'bg-red-100 text-red-800';
    case 'under review':
      return 'bg-blue-100 text-blue-800';
    default:
      return 'bg-gray-100 text-gray-800';
  }
}
</script>
