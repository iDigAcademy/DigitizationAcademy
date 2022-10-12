<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spiritix\LadaCache\Database\LadaCacheTrait;

class Course extends Model
{
    use HasFactory, LadaCacheTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'objectives',
        'front_image',
        'front_image_name',
        'front_image_size',
        'back_image',
        'back_image_name',
        'back_image_size',
        'active',
        'home_page',
        'start_date',
        'end_date',
        'schedule_details'
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
        'end_date'
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
