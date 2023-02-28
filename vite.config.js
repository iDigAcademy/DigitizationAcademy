import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from'vite-plugin-mkcert';
import { viteStaticCopy } from 'vite-plugin-static-copy'

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
        // @TODO Temporary until scripts can be worked into vite.
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/js/vendor/*',
                    dest: '../js/vendor/'
                }
            ]
        }),
        mkcert()
    ],
    server: {
        https: true,
        host: '192.168.10.10'
    }
});
