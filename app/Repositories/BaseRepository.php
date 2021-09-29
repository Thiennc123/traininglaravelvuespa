<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Hash;
use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        $admin = $this->model::orderBy('id', 'desc')->paginate(10);
        return $admin;
    }

    public function create()
    {
    }

    public function store(array $input)
    {
        return $this->model->create($input);
    }

    public function edit($id)
    {
        $user = $this->model::find($id);
        return $user;
    }

    public function update(array $input, $id)
    {
        $this->model::find($id)->update($input);
    }

    public function destroy($id)
    {
        $this->model::find($id)->delete();
    }
}