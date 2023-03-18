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

use App\Models\Presenters\CoursePresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spiritix\LadaCache\Database\LadaCacheTrait;
use Laracasts\Presenter\PresentableTrait;

class Course extends Model
{
    use HasFactory, LadaCacheTrait, PresentableTrait;

    /**
     * @var string
     */
    protected string $presenter = CoursePresenter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'objectives',
        'front_image',
        'back_image',
        'active',
        'home_page',
        'start_date',
        'end_date',
        'schedule_details',
        'registration_url',
        'registration_start_date',
        'registration_end_date',
        'syllabus_url'
    ];

    /**
     * The attributes that should be mutated to dates.
     * DATETIME to database, Carbon out.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
        'registration_start_date',
        'registration_end_date',
    ];

    /**
     * Active scope.
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query): mixed
    {
        return $query->where('active', 1);
    }

    /**
     * Home page scope for course.
     *
     * @param $query
     * @return mixed
     */
    public function scopeHome($query): mixed
    {
        return $query->where('home_page', 1);
    }

}
