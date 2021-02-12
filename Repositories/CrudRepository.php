<?php

namespace Modules\PanelCore\Repositories;

use App\Repositories\Interfaces\CrudRepositoryInterface;

abstract class CrudRepository
{
    // implements CrudRepositoryInterface {

    abstract public function getModel();

    public function all()
    {
        return $this->getModel()::all();
    }

    public function find($id)
    {
        return $this->getModel()::find($id);
    }

    public function only($id, $array)
    {
        return $this->getModel()::where('id', $id)->first($array);
    }

    public function get($array)
    {
        return $this->getModel()::get($array);
    }

    public function findOrFail($id)
    {
        return $this->getModel()::findOrFail($id);
    }

    public function delete($id)
    {
        return $this->getModel()::destroy($id);
    }

    public function update(mixed $id, array $data)
    {
        return $this->getModel()::findOrFail($id)->update($data);
    }

    public function create(array $data)
    {
        return $this->getModel()::create($data);
    }

    public function orderBy($col = 'name', $order = 'asc')
    {
        return $this->getModel()::orderBy($col, $order)->get();
    }

    public function count()
    {
        return $this->getModel()::count();
    }

    public function todayCount()
    {
        return $this->getModel()::where('created_at', '>', now()->subDay(1))->count();
    }

    public function last3DaysCount()
    {
        return $this->getModel()::where('created_at', '>', now()->subDay(3))->count();
    }

    public function lastWeekCount()
    {
        return $this->getModel()::where('created_at', '>', now()->subDay(7))->count();
    }

    public function lastMonthCount()
    {
        return $this->getModel()::where('created_at', '>', now()->subDay(30))->count();
    }

    public function countBetweenDates($from, $to)
    {
        return $this->getModel()::whereBetween('created_at', [$from, $to])->count();
    }

    public function countOfDaysAgo($days)
    {
        return $this->countBetweenDates(now()->subDays($days + 1), now()->subDays($days));
    }

    public function firstRecord($last = false)
    {
        $order = 'asc';
        if ($last) $order = 'desc';
        return $this->getModel()::orderBy('created_at', $order)->first();
    }
}
