<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Quote;

class Repository implements RepositoryInterface
{

    // Constructor to bind model to repo
    public function __construct(Quote $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }
}