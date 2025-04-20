import api from '@/services/api';

export async function logoutUser() {
  try {
    await api.post('/logout'); // backend logout
  } catch {
    // ignore error just in case token is already dead
  }

  localStorage.removeItem('token');
  localStorage.removeItem('role');
  delete api.defaults.headers.common['Authorization'];

  window.location.href = '/login'; // or use router.push()
}
