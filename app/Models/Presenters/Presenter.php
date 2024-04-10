<?php
/*
 * Copyright (c) 2022. Digitization Academy
 * idigacademy@gmail.com
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

namespace App\Models\Presenters;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

abstract class Presenter
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $property
     * @return bool
     */
    public function __isset($property)
    {
        return method_exists($this, Str::camel($property));
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        $camel_property = Str::camel($property);

        if (method_exists($this, $camel_property)) {
            return $this->{$camel_property}();
        }

        return $this->model->{Str::snake($property)};
    }
}