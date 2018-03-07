<?php

namespace App\Traits;

use App\Models\Note;
use App\Scopes\WithTagScope;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Request;

trait Searchable
{
    public function scopeSearchTerm(Builder $q, $search)
    {
        $query = clone $q;
        $query->select($this->getTable() . '.*');
        if (!$search)
        {
            abort(404);
        }

        if (isset($this->searchable))
        {
            foreach ($this->getColumns() as $key)
            {
                $query = $query->orWhere($key, 'LIKE', '%'.$search.'%');
            }
            return $query;
        }
    }

    protected function getColumns()
    {
        if (array_key_exists('columns', $this->searchable)) {
            $columns = [];
            foreach($this->searchable['columns'] as $column){
                $columns[] = $column;
            }
            return $columns;
        } else {
            return [];
        }
    }
}