<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Builder;

class Books extends Model
{
    use HasFactory, Searchable;
    protected $table = 'books';

    public function authors()
    {
        return $this->belongsToMany(Authors::class);
    }

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    // protected $searchable = [
    //     'title',
    //     'publisher',
    //     'summary',
    // ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {

        return [
            'title' => $this->title,
            'publisher' => $this->publisher,
            'summary' => $this->summary,
        ];
        // return $this->toArray();
    }

    /**
     * Modify the query used to retrieve models when making all of the models searchable.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function makeAllSearchableUsing($query)
    {
        return $query->with('authors');
    }
}
