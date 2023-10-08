import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/main.scss', 'resources/js/app.js'],
            refresh: true,
            server: {
                host: '127.0.0.1',
            }
        }),
    ],
});
