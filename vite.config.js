import { defineConfig } from "vite";
import { resolve } from "path";
import liveReload from "vite-plugin-live-reload";

export default defineConfig({
  build: {
    outDir: "dist",
    rollupOptions: {
      input: {
        main: resolve(__dirname, "src/js/main.js"),
      },
      output: {
        entryFileNames: "assets/js/[name].js",
        chunkFileNames: "assets/js/[name].js",
        assetFileNames: "assets/[ext]/[name].[ext]",
      },
    },
  },
  plugins: [
    liveReload([
      // Surveiller tous les fichiers PHP du thème
      __dirname + "/**/*.php",
    ]),
  ],
  server: {
    host: "localhost",
    port: 5174,
    strictPort: true,
    cors: true,
    watch: {
      // Surveiller les fichiers PHP pour recompiler Tailwind
      usePolling: true,
      ignored: ["!**/*.php"],
    },
    hmr: {
      overlay: true,
      // Recharger la page complète quand un fichier PHP change
      protocol: "ws",
      host: "localhost",
    },
  },
  css: {
    postcss: "./postcss.config.js",
  },
});
