import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/styles/app.scss',
                'resources/js/app.js',

                'resources/styles/pages/user/auth-register.scss'
            ],
            refresh: true,
        }),
    ],
});
