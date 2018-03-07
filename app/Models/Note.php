<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Note extends Model
{
    use Notifiable;
    use \App\Traits\Taggable;
    use \App\Traits\Searchable;

    protected $searchable = [
        'columns'=>['title', 'note']
        ];

    public function getSearchableAttributes()
    {
        return ['title', 'note'];
    }

    public function search($query, $term)
    {
        $query->whereHas('title', function ($q) use ($term) {
              $q->where('title', 'like', "%{$term}%");
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users');
    }

    public function scopePrivate($query)
    {
        $query->where('type', 'private');
    }

    public function scopePublic($query)
    {
        $query->where('type', 'public');
    }
}
