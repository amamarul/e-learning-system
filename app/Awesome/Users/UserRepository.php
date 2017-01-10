<?php namespace App\Awesome\Users;

use App\User;
use App\Awesome\DbRepository;

class UserRepository extends DbRepository implements UserInterface {

    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
