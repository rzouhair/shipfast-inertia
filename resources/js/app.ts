import "./bootstrap";
import "../css/app.css";

import { createSSRApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";
const environment = import.meta.env.VITE_ENVIRONMENT || "development";

if (environment === "production") {
  createServer((page) =>
    createInertiaApp({
      page,
      render: renderToString,
      title: (title) => `${title} - ${appName}`,
      resolve: (name) => {
        const pages = import.meta.glob<DefineComponent>("./Pages/**/*.vue", {
          eager: true,
        });
        return pages[`./Pages/${name}.vue`];
      },
      setup({ App, props, plugin }) {
        return createSSRApp({
          render: () => h(App, props),
        })
          .use(plugin)
          .use(ZiggyVue)
      },
      progress: {
        color: "#4B5563",
      },
    })
  );
} else {
  createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
      const pages = import.meta.glob<DefineComponent>("./Pages/**/*.vue", {
        eager: true,
      });
      return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
      createSSRApp({ render: () => h(App, props) })
        .use(plugin)
        .use(ZiggyVue)
        .mount(el);
    },
  });
}
