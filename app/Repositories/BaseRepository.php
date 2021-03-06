<?php

namespace App\Repositories;

class BaseRepository
{
    public function getModel()
    {
        return null;
    }

    public function findById($id)
    {
        return $this->getModel()->find($id);
    }

    public function filter($request)
    {
        return $this->getModel();
    }

    public function create($request)
    {
        $model = $this->getModel();
        $model = $model->create(is_array($request) ? $request : $request->all());
        return $model;
    }

    public function update($id, $request)
    {
        $model = $this->findById($id);
        $model->fill(is_array($request) ? $request : $request->all());
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        $model = $this->findById($id);
        return $model->delete();
    }
}
