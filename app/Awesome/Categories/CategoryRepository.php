<?php namespace App\Awesome\Categories;

use App\Category;
use App\Awesome\DbRepository;

class CategoryRepository extends DbRepository {

    public $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
