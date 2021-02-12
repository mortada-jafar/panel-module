<?php

namespace App\Repositories\Interfaces;

interface CrudRepositoryInterface
{
    public function find($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);
}