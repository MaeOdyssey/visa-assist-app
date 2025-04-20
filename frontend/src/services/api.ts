import axios from 'axios';
import type { AxiosInstance } from 'axios';


// 🔧 Create axios instance
const api: AxiosInstance = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    Accept: 'application/json',
  },
});

// 🌐 Set auth token globally
export function setAuthToken(token: string): void {
  api.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

export default api;

// 📋 Admin APIs

export function fetchApplications(status: string | null = null) {
  const params = status ? { status } : {};
  return api.get('/admin/applications', { params });
}

export function fetchApplicationById(id: number | string) {
  return api.get(`/admin/applications/${id}`);
}

export function updateApplicationStatus(id: number | string, status: string) {
  return api.patch(`/admin/applications/${id}/status`, { status });
}
