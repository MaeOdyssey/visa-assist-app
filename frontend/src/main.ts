import { createApp } from 'vue';
import App from './App.vue';
import router from './router'
import './style.css'; // or your Tailwind setup if you're using it
import { setAuthToken } from './services/api';

const token = localStorage.getItem('token');
if (token) setAuthToken(token);


const app = createApp(App);

app.use(router);
app.mount('#app');
