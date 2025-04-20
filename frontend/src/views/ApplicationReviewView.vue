<template>
  <div class="min-h-screen bg-[#e3f4f1] px-6 py-12 text-gray-800 font-sans">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 space-y-8 animate-fade-in-down">

      <!-- Application Info -->
      <div>
        <h2 class="text-3xl font-extrabold text-blue-900 mb-2">
          Reviewing: {{ application?.visa_type || 'Loading...' }}
        </h2>
        <p class="text-gray-600 mb-1">Client: <span class="font-medium">{{ application?.client?.user?.name }}</span></p>
        <p class="text-sm text-gray-500">
          Current Status:
          <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full"
                :class="getStatusClass(application?.status)">
            {{ application?.status }}
          </span>
        </p>
      </div>

      <!-- Documents List -->
      <div>
        <h3 class="text-xl font-semibold text-blue-800 mb-4">📎 Documents</h3>
        <ul class="space-y-3">
          <li v-for="doc in application?.documents" :key="doc.id" class="flex items-center justify-between bg-[#f9fafb] p-4 rounded-xl shadow-sm">
            <div>
              <p class="font-medium text-sm text-gray-800">{{ doc.name }}</p>
              <p class="text-xs text-gray-500">{{ doc.status }}</p>
            </div>
            <a :href="`/storage/${doc.path}`" target="_blank" class="text-blue-600 hover:underline text-sm">
              View →
            </a>
          </li>
        </ul>
      </div>

      <!-- Status Actions -->
      <div class="flex flex-wrap gap-4 justify-center md:justify-start mt-6">
        <button
          @click="setStatus('under_review')"
          class="px-4 py-2 rounded-lg bg-yellow-100 text-yellow-800 font-semibold hover:bg-yellow-200 transition"
        >
          Mark Under Review
        </button>
        <button
          @click="setStatus('approved')"
          class="px-4 py-2 rounded-lg bg-green-100 text-green-800 font-semibold hover:bg-green-200 transition"
        >
          ✅ Approve
        </button>
        <button
          @click="setStatus('rejected')"
          class="px-4 py-2 rounded-lg bg-red-100 text-red-800 font-semibold hover:bg-red-200 transition"
        >
          ❌ Reject
        </button>
      </div>

    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import { fetchApplicationById, updateApplicationStatus } from '@/services/api';

const route = useRoute();
const application = ref<any>(null); // optionally make a proper type

onMounted(async () => {
  const res = await fetchApplicationById(route.params.id.toString());
  application.value = res.data;
});

async function setStatus(newStatus: string) {
  await updateApplicationStatus(route.params.id.toString(), newStatus);
  const updated = await fetchApplicationById(route.params.id.toString());
  application.value = updated.data;
}


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
