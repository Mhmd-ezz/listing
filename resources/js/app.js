import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue'
import { createInertiaApp } from "@inertiajs/vue3"
import MainLayout from "@/Layouts/MainLayout.vue";
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";
import {ZiggyVue} from 'ziggy';

createInertiaApp({
  resolve: async (name) => {
    const page = await resolvePageComponent(
        `./Pages/${name}.vue`,
        import.meta.glob('./Pages/**/*.vue')
    )
    page.default.layout ??= MainLayout
    return page;
  },
  setup({el, App, props, plugin}) {
    createApp({render: () => h(App, props)})
        .use(plugin)
        .use(ZiggyVue)
        .mount(el)
  },
  progress: {
    color: '#b3123e',
    showSpinner: true,
    // //The delay after which the progress bar will appear
    // during navigation, in milliseconds.
    delay: 100,
    // //Whether to include the default NProgress styles.
    includeCSS: true,
  },
}).then(r => '')
