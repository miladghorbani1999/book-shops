import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/auth/main.scss',
                'resources/scss/dashboard/main.scss',
                'resources/scss/app.css',

                'resources/js/app.js',
                'resources/js/requirements.js',

            ],
            refresh: true,
        }),
    ],
});
