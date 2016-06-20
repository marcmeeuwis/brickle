<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 20-6-16
 * Time: 11:02
 */
namespace App\Repositories;

interface BaseEloquentRepositoryInterface
{
    /**
     * Get all items
     *
     * @param  string $columns specific columns to select
     * @param  string $orderBy column to sort by
     * @param  string $sort    sort direction
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = null, $orderBy = 'created_at', $sort = 'DECS');

    /**
     * Get paged items
     *
     * @param  integer $paged   Items per page
     * @param  string  $orderBy Column to sort by
     * @param  string  $sort    Sort direction
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginated($paged = 15, $orderBy = 'created_at', $sort = 'DECS');

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
    public function forSelect($data, $key = 'id', $orderBy = 'created_at', $sort = 'DECS');

    /**
     * Get item by its id
     *
     * @param  integer $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function byId($id);

    /**
     * Get instance of model by column
     *
     * @param  mixed  $term   search term
     * @param  string $column column to search
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function itemByColumn($term, $column = 'slug');

    /**
     * Get instance of model by column
     *
     * @param  mixed  $term   search term
     * @param  string $column column to search
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function collectionByColumn($term, $column = 'slug');

    /**
     * Get item by id or column
     *
     * @param  mixed  $term   id or term
     * @param  string $column column to search
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function actively($term, $column = 'slug');

    /**
     * Create new using mass assignment
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a record using the primary key.
     *
     * @param $id   mixed primary key
     * @param $data array
     */
    public function update($id, array $data);

    /**
     * Update or crate a record and return the entity
     *
     * @param array $identifiers columns to search for
     * @param array $data
     *
     * @return mixed
     */
    public function updateOrCreate(array $identifiers, array $data);

    /**
     * Delete a record by the primary key.
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id);

    /**
     * Choose what relationships to return with query.
     *
     * @param mixed $relationships
     *
     * @return $this
     */
    public function with($relationships);
}
