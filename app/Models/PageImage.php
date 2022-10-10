<?php

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
        'image',
        'image_name',
        'image_size',
        'active'
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
     * Scope for page images.
     *
     * @param $query
     * @param string $page
     * @param int $position
     * @return mixed
     */
    public function scopePageImage($query, string $page, int $position = 0): mixed
    {
        return $query->where('page', $page)->where('position', $position)->active();
    }
}
