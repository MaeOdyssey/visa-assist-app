import { createRouter, createWebHistory } from 'vue-router';
import type { RouteRecordRaw } from 'vue-router';
import MainScreenView from '@/views/MainScreenView.vue';
import AdminDashboardView from '@/views/AdminDashboardView.vue';
import ApplicationReviewView from '@/views/ApplicationReviewView.vue';
import LoginView from '@/views/LoginView.vue';
import ClientDashboardView from '@/views/ClientDashboardView.vue';
import VisaApplicationFormView from '@/views/VisaApplicationSubmissionFormView.vue';
import RegisterView from '@/views/RegisterView.vue';


const routes: RouteRecordRaw[] = [
  {
    path: '/admin',
    component: AdminDashboardView,
  },
  
  {
    path: '/register',
    component: RegisterView,
  },
  {
    path: '/client/apply',
    component: VisaApplicationFormView,
  },
  
  {
    path: '/client-dashboard',
    component: ClientDashboardView,
  },
  {
    path: '/login',
    component: LoginView,
  },
  {
    path: '/',
    component: MainScreenView,
  },
  {
    path: '/admin/applications/:id',
    component: ApplicationReviewView,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
