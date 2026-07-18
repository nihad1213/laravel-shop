import {createApp} from 'vue';

import Header from './components/Layout/Header.vue';
import Footer from './components/Layout/Footer.vue';
import router from './router';

const app = createApp({});

app.component('app-header', Header);
app.component('app-footer', Footer);

app.use(router);

app.mount('#app');