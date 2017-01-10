<?php namespace App\Awesome\Courses;

use App\Course;
use App\Awesome\DbRepository;

class CourseRepository extends DbRepository {

    public $model;

    public function __construct(Course $model)
    {
        $this->model = $model;
    }

    public function store($item)
    {
        $this->model->create($item);
    }
}
