<?php

namespace  Modules\Blog\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function create($credentials) :Model;
    public function find($id) :?Model;
    public function update($credentials);
    public function destroy($id);
    public function all($sort) :Collection;
    public function filter($filters) :Collection;
    public function with($relations);
    public function first();
    public function query();
}
