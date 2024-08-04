import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import AutoImport from "unplugin-auto-import/vite";
import Components from "unplugin-vue-components/vite";
import vueJsx from "@vitejs/plugin-vue-jsx";

export default defineConfig({
  plugins: [
    vueJsx(),
    AutoImport({
      imports: [
        "vue",
        "vue-i18n",
        "@vueuse/head",
        "@vueuse/core",
        /* VueRouterAutoImports,
          {
            // add any other imports you were relying on
            'vue-router/auto': ['useLink'],
          }, */
      ],
      dts: "resources/js/auto-imports.d.ts",
      dirs: [
        "resources/js/composables",
        "resources/js/stores",
        "resources/js/Components",
        "resources/js/Components/ui",
        "resources/js/Components/bp",
        "resources/js/Layouts",
      ],
      vueTemplate: true,
    }),
    Components({
      // allow auto load markdown components under `./resources/js/components/`
      extensions: ["vue", "md"],
      // allow auto import and register components used in markdown
      include: [/\.vue$/, /\.vue\?vue/, /\.md$/],
      dts: "resources/js/components.d.ts",
      dirs: [
        "resources/js/Components",
        "resources/js/Pages/**/Partials/**",
        "resources/js/Layouts",
      ],
    }),

    laravel({
      input: ["resources/js/app.ts", "resources/css/app.css"],
      ssr: "resources/js/ssr.ts",
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
});
