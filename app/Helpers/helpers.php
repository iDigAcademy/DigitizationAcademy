<?php

if (! function_exists('vite_asset')) {

    function vite_asset($path) {
        return \Illuminate\Support\Facades\Vite::asset($path);
    }
}
