<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class NoTagScope implements Scope {

	 /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

    	$builder->with('tags');
    }

    /*public function remove(Builder $builder)
    {
        $query = $builder->getQuery();

        foreach ((array) $query->wheres as $key => $where) {
            if($where['column'] == 'tags') {
                unset($query->where[$key]);

                $query->wheres = array_values($query->wheres);
            }
        }
    }*/

    public function noTags(Builder $builder)
    {
        $query = $builder->getQuery();

        unset($query->wheres[$this->where_index]);
        $where_bindings = $query->getRawBindings()['with'];
        unset($where_bindings[$this->binding_index]);
        $query->setBindings(array_values($where_bindings));
        $query->wheres = array_values($query->wheres);
    }

}