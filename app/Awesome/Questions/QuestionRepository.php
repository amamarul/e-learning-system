<?php namespace App\Awesome\Questions;

use App\Question;
use App\Awesome\DbRepository;

class QuestionRepository extends DbRepository {

    public $model;

    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model->with('answer')->get();
    }

}
