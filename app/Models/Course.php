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

use App\Models\Traits\Presentable;
use IDigAcademy\AutoCache\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Str;

/**
 * Course Model
 *
 * Represents a course within the Digital Biodiversity Specimens system.
 * This model handles the storage and retrieval of course information including
 * title, objectives, syllabus and related media.
 *
 * @property int $id
 * @property string $title The title of the course
 * @property string $slug URL-friendly version of the title
 * @property string $objectives Course learning objectives
 * @property string $page_image Main image for the course page
 * @property string $tile_image Thumbnail image for course listings
 * @property bool $active Whether the course is currently active
 * @property string $syllabus Course syllabus content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Course extends Model
{
    use Cacheable, HasFactory, Presentable;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['courseType'];

    /**
     * Get the relations that should be cached.
     */
    protected function getCacheRelations(): array
    {
        return ['courseType', 'assets', 'events'];
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Generate slug from title when creating a new course
        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });

        // Update slug when title changes
        static::updating(function ($course) {
            if ($course->isDirty('title')) {
                $course->slug = Str::slug($course->title);
            }
        });

        // Set order for new records
        static::creating(function ($team) {
            if (is_null($team->order)) {
                $team->order = static::max('order') + 1;
            }
        });

        // Listen for database queries that might be reordering operations
        static::bootedIfNotBooted(function () {
            \Illuminate\Support\Facades\DB::listen(function ($query) {
                // Check if this is an UPDATE query on the courses table involving the order column
                if (stripos($query->sql, 'update') === 0 &&
                    stripos($query->sql, 'courses') !== false &&
                    stripos($query->sql, 'order') !== false) {

                    // Clear the course cache after the query completes
                    $store = \Illuminate\Support\Facades\Cache::store(config('auto-cache.store'));
                    $store->tags(['course'])->flush();
                }
            });
        });
    }

    /**
     * Ensure the database listener is only registered once
     */
    protected static function bootedIfNotBooted(callable $callback)
    {
        static $booted = [];

        $class = static::class;
        if (! isset($booted[$class])) {
            $callback();
            $booted[$class] = true;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'type',
        'course_type_id',
        'description',
        'objectives',
        'language',
        'instructor',
        'page_image',
        'tile_image',
        'syllabus',
        'video',
        'expert_panel_headline',
        'expert_panel_copy',
        'expert_panel_image',
        'expert_panelist_copy',
        'active',
        'order',
    ];

    /**
     * The attributes that should be mutated to dates.
     * DATETIME to database, Carbon out.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Active scope.
     */
    /**
     * Scope query to only include active courses.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(\Illuminate\Database\Eloquent\Builder $query): mixed
    {
        return $query->where('active', 1);
    }

    /**
     * Scope the query to courses with the specified slug.
     */
    public function scopeSlug(\Illuminate\Database\Eloquent\Builder $query, string $slug): mixed
    {
        return $query->where('slug', $slug);
    }

    /**
     * Home page scope for course.
     */
    /**
     * Scope query to only include courses that should appear on the home page.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHome(\Illuminate\Database\Eloquent\Builder $query): mixed
    {
        return $query->where('home_page', 1);
    }

    /**
     * The course type that belongs to the course.
     */
    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class);
    }

    /**
     * The assets that belong to the course.
     */
    public function assets(): BelongsToMany
    {
        return $this->belongsToMany(Asset::class);
    }

    /**
     * Get the events associated with the course.
     */
    public function events(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Event::class);
    }
}
