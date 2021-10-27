<?php

namespace  Modules\Blog\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    /**
     * __constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($credential) :Model
    {
        return $this->model->create($credential);
    }

    public function find($id) :?Model
    {
        return $this->model->findOrFail($id);
    }

    public function update($credential)
    {
        return $this->model->update($credential);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function all($sort = null) :Collection
    {
        if($sort) return $this->model->orderBy("id", $sort)->get();
        
        return $this->model->all();
    }

    public function filter($filters) :Collection
    {
        return $this->model->where($filters);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function first()
    {
        return $this->model->first();
    }

    public function query()
    {
        return $this->model->newQuery();
    }

}
