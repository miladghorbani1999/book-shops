import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/requirements.js',
                'resources/css/app.css',
                'resources/scss/auth/index.scss',
                'resources/scss/auth/dashboard.scss',
                'resources/scss/main.scss',
                'resources/js/app.js',
                'resources/vendor/assets/persian-datepicker/persianDatepicker.min.js',
                'resources/vendor/assets/persian-datepicker/persianDatepicker.css',
            ],
            refresh: true,
        }),
    ],
});
