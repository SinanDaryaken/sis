require('./bootstrap');

import { createApp } from 'vue';
import router from './router';

import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';

import Auth from './components/auth/Auth.vue'

const app = createApp(Auth);

app.use(router)
    .use(VueSweetalert2)
    .mount('#app');
