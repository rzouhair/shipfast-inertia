// vite.config.js
import { defineConfig } from "file:///Users/user/Developer/Personal/shipfast-inertia/node_modules/vite/dist/node/index.js";
import laravel from "file:///Users/user/Developer/Personal/shipfast-inertia/node_modules/laravel-vite-plugin/dist/index.js";
import vue from "file:///Users/user/Developer/Personal/shipfast-inertia/node_modules/@vitejs/plugin-vue/dist/index.mjs";
import AutoImport from "file:///Users/user/Developer/Personal/shipfast-inertia/node_modules/unplugin-auto-import/dist/vite.js";
import Components from "file:///Users/user/Developer/Personal/shipfast-inertia/node_modules/unplugin-vue-components/dist/vite.js";
import vueJsx from "file:///Users/user/Developer/Personal/shipfast-inertia/node_modules/@vitejs/plugin-vue-jsx/dist/index.mjs";
var vite_config_default = defineConfig({
  plugins: [
    vueJsx(),
    AutoImport({
      imports: [
        "vue",
        "vue-i18n",
        "@vueuse/head",
        "@vueuse/core"
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
        "resources/js/Layouts"
      ],
      vueTemplate: true
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
        "resources/js/Layouts"
      ]
    }),
    laravel({
      input: "resources/js/app.ts",
      ssr: "resources/js/ssr.ts",
      refresh: true
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    })
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvVXNlcnMvdXNlci9EZXZlbG9wZXIvUGVyc29uYWwvc2hpcGZhc3QtaW5lcnRpYVwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiL1VzZXJzL3VzZXIvRGV2ZWxvcGVyL1BlcnNvbmFsL3NoaXBmYXN0LWluZXJ0aWEvdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL1VzZXJzL3VzZXIvRGV2ZWxvcGVyL1BlcnNvbmFsL3NoaXBmYXN0LWluZXJ0aWEvdml0ZS5jb25maWcuanNcIjtpbXBvcnQgeyBkZWZpbmVDb25maWcgfSBmcm9tIFwidml0ZVwiO1xuaW1wb3J0IGxhcmF2ZWwgZnJvbSBcImxhcmF2ZWwtdml0ZS1wbHVnaW5cIjtcbmltcG9ydCB2dWUgZnJvbSBcIkB2aXRlanMvcGx1Z2luLXZ1ZVwiO1xuaW1wb3J0IEF1dG9JbXBvcnQgZnJvbSBcInVucGx1Z2luLWF1dG8taW1wb3J0L3ZpdGVcIjtcbmltcG9ydCBDb21wb25lbnRzIGZyb20gXCJ1bnBsdWdpbi12dWUtY29tcG9uZW50cy92aXRlXCI7XG5pbXBvcnQgdnVlSnN4IGZyb20gXCJAdml0ZWpzL3BsdWdpbi12dWUtanN4XCI7XG5cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gIHBsdWdpbnM6IFtcbiAgICB2dWVKc3goKSxcbiAgICBBdXRvSW1wb3J0KHtcbiAgICAgIGltcG9ydHM6IFtcbiAgICAgICAgXCJ2dWVcIixcbiAgICAgICAgXCJ2dWUtaTE4blwiLFxuICAgICAgICBcIkB2dWV1c2UvaGVhZFwiLFxuICAgICAgICBcIkB2dWV1c2UvY29yZVwiLFxuICAgICAgICAvKiBWdWVSb3V0ZXJBdXRvSW1wb3J0cyxcbiAgICAgICAgICB7XG4gICAgICAgICAgICAvLyBhZGQgYW55IG90aGVyIGltcG9ydHMgeW91IHdlcmUgcmVseWluZyBvblxuICAgICAgICAgICAgJ3Z1ZS1yb3V0ZXIvYXV0byc6IFsndXNlTGluayddLFxuICAgICAgICAgIH0sICovXG4gICAgICBdLFxuICAgICAgZHRzOiBcInJlc291cmNlcy9qcy9hdXRvLWltcG9ydHMuZC50c1wiLFxuICAgICAgZGlyczogW1xuICAgICAgICBcInJlc291cmNlcy9qcy9jb21wb3NhYmxlc1wiLFxuICAgICAgICBcInJlc291cmNlcy9qcy9zdG9yZXNcIixcbiAgICAgICAgXCJyZXNvdXJjZXMvanMvQ29tcG9uZW50c1wiLFxuICAgICAgICBcInJlc291cmNlcy9qcy9Db21wb25lbnRzL3VpXCIsXG4gICAgICAgIFwicmVzb3VyY2VzL2pzL0NvbXBvbmVudHMvYnBcIixcbiAgICAgICAgXCJyZXNvdXJjZXMvanMvTGF5b3V0c1wiLFxuICAgICAgXSxcbiAgICAgIHZ1ZVRlbXBsYXRlOiB0cnVlLFxuICAgIH0pLFxuICAgIENvbXBvbmVudHMoe1xuICAgICAgLy8gYWxsb3cgYXV0byBsb2FkIG1hcmtkb3duIGNvbXBvbmVudHMgdW5kZXIgYC4vcmVzb3VyY2VzL2pzL2NvbXBvbmVudHMvYFxuICAgICAgZXh0ZW5zaW9uczogW1widnVlXCIsIFwibWRcIl0sXG4gICAgICAvLyBhbGxvdyBhdXRvIGltcG9ydCBhbmQgcmVnaXN0ZXIgY29tcG9uZW50cyB1c2VkIGluIG1hcmtkb3duXG4gICAgICBpbmNsdWRlOiBbL1xcLnZ1ZSQvLCAvXFwudnVlXFw/dnVlLywgL1xcLm1kJC9dLFxuICAgICAgZHRzOiBcInJlc291cmNlcy9qcy9jb21wb25lbnRzLmQudHNcIixcbiAgICAgIGRpcnM6IFtcbiAgICAgICAgXCJyZXNvdXJjZXMvanMvQ29tcG9uZW50c1wiLFxuICAgICAgICBcInJlc291cmNlcy9qcy9QYWdlcy8qKi9QYXJ0aWFscy8qKlwiLFxuICAgICAgICBcInJlc291cmNlcy9qcy9MYXlvdXRzXCIsXG4gICAgICBdLFxuICAgIH0pLFxuXG4gICAgbGFyYXZlbCh7XG4gICAgICBpbnB1dDogXCJyZXNvdXJjZXMvanMvYXBwLnRzXCIsXG4gICAgICBzc3I6IFwicmVzb3VyY2VzL2pzL3Nzci50c1wiLFxuICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICB9KSxcbiAgICB2dWUoe1xuICAgICAgdGVtcGxhdGU6IHtcbiAgICAgICAgdHJhbnNmb3JtQXNzZXRVcmxzOiB7XG4gICAgICAgICAgYmFzZTogbnVsbCxcbiAgICAgICAgICBpbmNsdWRlQWJzb2x1dGU6IGZhbHNlLFxuICAgICAgICB9LFxuICAgICAgfSxcbiAgICB9KSxcbiAgXSxcbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUErVCxTQUFTLG9CQUFvQjtBQUM1VixPQUFPLGFBQWE7QUFDcEIsT0FBTyxTQUFTO0FBQ2hCLE9BQU8sZ0JBQWdCO0FBQ3ZCLE9BQU8sZ0JBQWdCO0FBQ3ZCLE9BQU8sWUFBWTtBQUVuQixJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUMxQixTQUFTO0FBQUEsSUFDUCxPQUFPO0FBQUEsSUFDUCxXQUFXO0FBQUEsTUFDVCxTQUFTO0FBQUEsUUFDUDtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQSxNQU1GO0FBQUEsTUFDQSxLQUFLO0FBQUEsTUFDTCxNQUFNO0FBQUEsUUFDSjtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDRjtBQUFBLE1BQ0EsYUFBYTtBQUFBLElBQ2YsQ0FBQztBQUFBLElBQ0QsV0FBVztBQUFBO0FBQUEsTUFFVCxZQUFZLENBQUMsT0FBTyxJQUFJO0FBQUE7QUFBQSxNQUV4QixTQUFTLENBQUMsVUFBVSxjQUFjLE9BQU87QUFBQSxNQUN6QyxLQUFLO0FBQUEsTUFDTCxNQUFNO0FBQUEsUUFDSjtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDRjtBQUFBLElBQ0YsQ0FBQztBQUFBLElBRUQsUUFBUTtBQUFBLE1BQ04sT0FBTztBQUFBLE1BQ1AsS0FBSztBQUFBLE1BQ0wsU0FBUztBQUFBLElBQ1gsQ0FBQztBQUFBLElBQ0QsSUFBSTtBQUFBLE1BQ0YsVUFBVTtBQUFBLFFBQ1Isb0JBQW9CO0FBQUEsVUFDbEIsTUFBTTtBQUFBLFVBQ04saUJBQWlCO0FBQUEsUUFDbkI7QUFBQSxNQUNGO0FBQUEsSUFDRixDQUFDO0FBQUEsRUFDSDtBQUNGLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
