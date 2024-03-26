import './bootstrap';
import '../css/app.css';
import 'tailwindcss/tailwind.css'


import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

import  ApplicationTitle from './Components/Title.vue';
import  IncrementCounter from './Components/IncrementCounter.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createApp({})
    .component('ApplicationTitle', ApplicationTitle)
    .component('IncrementCounter', IncrementCounter)
    .mount('#app');

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
