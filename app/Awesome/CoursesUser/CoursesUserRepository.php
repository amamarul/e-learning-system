<?php namespace App\Awesome\CoursesUser;

use App\CourseUser;
use App\Awesome\DbRepository;

class CoursesUserRepository extends DbRepository {

    public $model;

    public function __construct(CourseUser $model)
    {
        $this->model = $model;
    }

    public function firstOrCreate($course)
    {
        return $this->model->firstOrCreate($course);
    }

    public function byUserbyCourse($courseId, $userId)
    {
        return $this->model->where('user_id', '=', $userId)
            ->where('course_id', $courseId)
            ->first();
    }
}
