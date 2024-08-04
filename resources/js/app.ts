import './bootstrap';
import '../css/app.css';

import { createSSRApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server'
import { renderToString } from '@vue/server-renderer'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createServer(page =>
  createInertiaApp({
    page,
    render: renderToString,
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
      const pages = import.meta.glob<DefineComponent>('./Pages/**/*.vue', { eager: true })
      return pages[`./Pages/${name}.vue`]
    },
    setup({ App, props, plugin }) {
      return createSSRApp({
        render: () => h(App, props),
      })
      .use(plugin)
      .use(ZiggyVue)
    },
  }),
)