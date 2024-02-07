import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
            'node_modules/select2/dist/css/select2.min.css',
            'node_modules/select2/dist/js/select2.min.js',
            'vendor/ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css'
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});