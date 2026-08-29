import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        cors: true,
        hmr: {
            host: 'benkt-45-201-199-129.run.pinggy-free.link', // ដូរមកជា Link របស់ Pinggy បច្ចុប្បន្ន
        },
    },
});