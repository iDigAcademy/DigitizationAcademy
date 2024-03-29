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

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spiritix\LadaCache\Database\LadaCacheTrait;

class PageImage extends Model
{
    use HasFactory, LadaCacheTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'page',
        'position',
        'image',
        'active',
    ];

    /**
     * Page image scope.
     *
     * @param $query
     * @param string $page
     * @return mixed
     */
    public function scopePage($query, string $page): mixed
    {
        return $query->where('page', $page);
    }

    /**
     * Position scope.
     *
     * @param $query
     * @param int $position
     * @return mixed
     */
    public function scopePosition($query, int $position = 0): mixed
    {
        return $query->where('position', $position);
    }

    /**
     * Active scope.
     *
     * @param $query
     * @param int $active
     * @return mixed
     */
    public function scopeActive($query, int $active = 1): mixed
    {
        return $query->where('active', $active);
    }
}
