<?php namespace App\Awesome;

use DB;

abstract class DbRepository {

    public function index()
    {
     return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->where('id', '=', $id)->first();
    }

    public function store($item)
    {
        return $this->model->create($item);
    }

    public function update($id, $item)
    {
        return $this->model->where('id', '=', $id)->update($item);
    }

    public function firstOrCreate($array)
    {
        return $this->model->FirstOrCreate($array);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}