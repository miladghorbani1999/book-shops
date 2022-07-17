import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            ['resources/scss/app.scss','resources/scss/auth/index.scss'],
            'resources/js/app.js',
        ]),
    ],
});
