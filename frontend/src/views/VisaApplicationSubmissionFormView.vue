<template>
    <div class="min-h-screen bg-[#e3f4f1] px-6 py-12 text-gray-800 font-sans">
      <div class="max-w-lg mx-auto bg-white rounded-2xl shadow-lg p-8 space-y-6 animate-fade-in-down">
  
        <h1 class="text-3xl font-extrabold text-blue-900">📝 Submit a New Visa Application</h1>
  
        <form @submit.prevent="submitForm" class="space-y-4">
  
          <!-- Visa Type -->
          <div>
            <label for="visa_type" class="block text-sm font-medium text-gray-700 mb-1">Visa Type</label>
            <select
              id="visa_type"
              v-model="form.visa_type"
              class="w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              required
            >
              <option disabled value="">Select a visa type</option>
              <option>Tourist Visa</option>
              <option>Work Visa</option>
              <option>Student Visa</option>
              <option>Family Visa</option>
            </select>
          </div>
  
          <!-- Purpose -->
          <div>
            <label for="purpose" class="block text-sm font-medium text-gray-700 mb-1">Purpose (Optional)</label>
            <textarea
              id="purpose"
              v-model="form.purpose"
              rows="4"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Briefly explain your reason for applying"
            />
          </div>
  
          <!-- Submit -->
          <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg shadow-sm transition-all duration-300"
          >
            Submit Application
          </button>
        </form>
  
        <p v-if="successMessage" class="text-green-600 text-sm text-center mt-4">
          ✅ {{ successMessage }}
        </p>
  
        <p v-if="errorMessage" class="text-red-600 text-sm text-center mt-4">
          ❌ {{ errorMessage }}
        </p>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  import api from '@/services/api';
  
  const form = ref({
    visa_type: '',
    purpose: '',
  });
  
  const successMessage = ref('');
  const errorMessage = ref('');
  
  async function submitForm() {
    successMessage.value = '';
    errorMessage.value = '';
  
    try {
      const res = await api.post('/applications', {
        visa_type: form.value.visa_type,
        purpose: form.value.purpose,
      });
  
      successMessage.value = 'Application submitted successfully!';
      form.value.visa_type = '';
      form.value.purpose = '';
    } catch (err) {
      errorMessage.value = 'Something went wrong. Please try again.';
    }
  }
  </script>
  