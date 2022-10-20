<?php

namespace App\Models;

use App\Models\Presenters\TeamPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spiritix\LadaCache\Database\LadaCacheTrait;
use TheHiveTeam\Presentable\HasPresentable;

class Team extends Model implements Sortable
{
    use HasFactory, SortableTrait, LadaCacheTrait, HasPresentable;

    /**
     * @var string
     */
    protected string $presenter = TeamPresenter::class;

    /**
     * Used for sorting on Nova index.
     * @var array
     */
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'about',
        'image',
        'image_name',
        'image_size',
        'order'
    ];
}
