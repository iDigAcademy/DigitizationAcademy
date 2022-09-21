import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from'vite-plugin-mkcert';

export default defineConfig({
    build: {
        assetsInlineLimit: 0,
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        mkcert()
    ],
    server: {
        https: true,
        host: '192.168.10.10'
    }
});
