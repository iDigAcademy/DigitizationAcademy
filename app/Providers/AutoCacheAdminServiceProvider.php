<?php

/*
 * Copyright (C) 2014 - 2025, Biospex
 * biospex@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Providers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\ServiceProvider;

class AutoCacheAdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Override the Gate binding after AutoCache has registered its wrapper
        $this->app->extend(GateContract::class, function ($gate, $app) {
            // If this is a Filament request, return a new Gate instance without caching
            if ($this->isFilamentRequest()) {
                if ($gate instanceof \IDigAcademy\AutoCache\Services\CacheableGate) {
                    // Create a new Gate instance with the same configuration as the CacheableGate
                    // but without caching functionality for Filament admin routes
                    return new Gate(
                        $app,
                        function () use ($app) {
                            return $app->bound('auth') ? $app->make('auth')->user() : null;
                        }
                    );
                }
            }

            return $gate;
        });
    }

    public function boot()
    {
        //
    }

    /**
     * Determine if the current request is for Filament admin
     */
    private function isFilamentRequest(): bool
    {
        if (! $this->app->bound('request')) {
            return false;
        }

        $request = $this->app->make('request');

        // Check if request is for Nova or other admin routes
        return $request->is('nova/*') ||
            $request->is('nova-api/*') ||
            $request->is('admin/*') ||
            str_contains($request->getPathInfo(), '/nova/') ||
            str_contains($request->getPathInfo(), '/admin/') ||
            class_exists('\Laravel\Nova\NovaServiceProvider') ||
            class_exists('\Filament\FilamentServiceProvider');
    }
}
