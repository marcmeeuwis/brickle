<?php

namespace Doitonlinemedia\Admin\App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseEloquentRepository implements BaseRepository
{
    /**
     * Name of model associated with this repository
     *
     * @var Model
     */
    protected $model;

    /**
     * Array of method names of relationships available to use
     *
     * @var array
     */
    protected $relationships = [];

    /**
     * Array of relationships to include in next query
     *
     * @var array
     */
    protected $requiredRelationships = [];

    /**
     * Array of traits being used by the repository.
     *
     * @var array
     */
    protected $uses = [];

    protected $cacheTtl = 60;

    protected $caching = true;

    /**
     * Get the model from the IoC container
     */
    public function __construct()
    {
        $this->model = app()->make($this->model);
        $this->setUses();
    }

    /**
     * Get all items
     *
     * @param  string $columns specific columns to select
     * @param  string $orderBy column to sort by
     * @param  string $sort    sort direction
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = null, $orderBy = 'created_at', $sort = 'DECS')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->orderBy($orderBy, $sort)
            ->get($columns);
    }

    /**
     * Get paged items
     *
     * @param  integer $paged   Items per page
     * @param  string  $orderBy Column to sort by
     * @param  string  $sort    Sort direction
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginated($paged = 15, $orderBy = 'created_at', $sort = 'DECS')
    {

        return $this->model
            ->with($this->requiredRelationships)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * Items for select options
     *
     * @param  string $data    column to display in the option
     * @param  string $key     column to be used as the value in option
     * @param  string $orderBy column to sort by
     * @param  string $sort    sort direction
     *
     * @return array           array with key value pairs
     */
    public function forSelect($data, $key = 'id', $orderBy = 'created_at', $sort = 'DECS')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->orderBy($orderBy, $sort)
            ->lists($data, $key)
            ->all();
    }

    /**
     * Get item by its id
     *
     * @param  integer $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function byId($id)
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->find($id);

    }

    /**
     * Get instance of model by column
     *
     * @param  mixed  $term   search term
     * @param  string $column column to search
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function itemByColumn($term, $column = 'slug')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where($column, '=', $term)
            ->first();
    }

    /**
     * Get instance of model by column
     *
     * @param  mixed  $term   search term
     * @param  string $column column to search
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function collectionByColumn($term, $column = 'slug')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->where($column, '=', $term)
            ->get();
    }

    /**
     * Get latest item
     *
     * @param array $where an multi-dimensional array with column and value pairs
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function latest()
    {
        return $this->model->orderBy('created_at', 'DESC')->first();
        /*
        return $this->model->where(function($q) use($where, $this) {
            $this->where($q, $where);
        })->orderBy('created_at', 'DESC')->first();
        */
    }

    /**
     * @param $q
     * @param $where
     */
    private function where($q, $where)
    {
        if (count($where) > 0) {
            foreach ($where as $column => $value) {
                $q->where($column, $value);
            }
        }
    }

    /**
     * Get random
     *
     * @param int $amount
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function random($amount = 1)
    {
        return $this->model->take($amount)->get;
    }

    /**
     * Get item by id or column
     *
     * @param  mixed  $term   id or term
     * @param  string $column column to search
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function actively($term, $column = 'slug')
    {
        if (is_numeric($term)) {
            return $this->getById($term);
        }

        return $this->getItemByColumn($term, $column);
    }

    /**
     * Create new using mass assignment
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update a record using the primary key.
     *
     * @param $id   mixed primary key
     * @param $data array
     */
    public function update($id, array $data)
    {
        return $this->model->where($this->model->getKeyName(), $id)->update($data);
    }

    /**
     * Update or crate a record and return the entity
     *
     * @param array $identifiers columns to search for
     * @param array $data
     *
     * @return mixed
     */
    public function updateOrCreate(array $identifiers, array $data)
    {
        $existing = $this->model->where(array_only($data, $identifiers))->first();

        if ($existing) {
            $existing->update($data);

            return $existing;
        }

        return $this->create($data);
    }

    /**
     * Delete a record by the primary key.
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->where($this->model->getKeyName(), $id)->delete();
    }

    /**
     * Choose what relationships to return with query.
     *
     * @param mixed $relationships
     *
     * @return $this
     */
    public function with($relationships)
    {
        $this->requiredRelationships = [];

        if ($relationships == 'all') {
            $this->requiredRelationships = $this->relationships;
        } elseif (is_array($relationships)) {
            $this->requiredRelationships = array_filter($relationships, function ($value) {
                return in_array($value, $this->relationships);
            });
        } elseif (is_string($relationships)) {
            array_push($this->requiredRelationships, $relationships);
        }

        return $this;
    }

    /**
     * Perform the repository query.
     *
     * @param $callback
     *
     * @return mixed
     */
    protected function doQuery($callback)
    {
        $previousMethod = debug_backtrace(null, 2)[1];
        $methodName = $previousMethod['function'];
        $arguments = $previousMethod['args'];

        $result = $this->doBeforeQuery($callback, $methodName, $arguments);

        return $this->doAfterQuery($result, $methodName, $arguments);
    }

    /**
     *  Apply any modifiers to the query.
     *
     * @param $callback
     * @param $methodName
     * @param $arguments
     *
     * @return mixed
     */
    private function doBeforeQuery($callback, $methodName, $arguments)
    {
        $traits = $this->getUsedTraits();

        if (in_array(CacheResults::class, $traits) && $this->caching && $this->isCacheableMethod($methodName)) {
            return $this->processCacheRequest($callback, $methodName, $arguments);
        }

        return $callback();
    }

    /**
     * Handle the query result.
     *
     * @param $result
     * @param $methodName
     * @param $arguments
     *
     * @return mixed
     */
    private function doAfterQuery($result, $methodName, $arguments)
    {
        $traits = $this->getUsedTraits();

        if (in_array(CacheResults::class, $traits)) {
            // Reset caching to enabled in case it has just been disabled.
            $this->caching = true;
        }

        if (in_array(ThrowsHttpExceptions::class, $traits)) {

            if ($this->shouldThrowHttpException($result, $methodName)) {
                $this->throwNotFoundHttpException($methodName, $arguments);
            }

            $this->exceptionsDisabled = false;
        }

        return $result;
    }

    /**
     * @return int
     */
    protected function getCacheTtl()
    {
        return $this->cacheTtl;
    }

    /**
     * @return $this
     */
    protected function setUses()
    {
        $this->uses = array_flip(class_uses_recursive(get_class($this)));

        return $this;
    }

    /**
     * @return array
     */
    protected function getUsedTraits()
    {
        return $this->uses;
    }
}