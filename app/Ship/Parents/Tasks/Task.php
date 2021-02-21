<?php

namespace App\Ship\Parents\Tasks;

use Apiato\Core\Abstracts\Tasks\Task as AbstractTask;
use App\Ship\Criterias\Eloquent\OrderByFieldCriteria;
use App\Ship\Criterias\Eloquent\OrderByRawCriteria;
use App\Ship\Parents\Repositories\Repository;
use Illuminate\Support\Arr;

/**
 * Class Task.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class Task extends AbstractTask
{
    protected $with = [];
    protected $withCount = [];
    protected $repository = null;


    /**
     * @param array $with
     */
    public function with(array $with)
    {
        $this->addWith($with);
    }

    /**
     * @param array $with
     */
    protected function addWith(array $with)
    {
        $this->with = array_merge($this->with, $with);
    }

    /**
     * @param array $count
     */
    public function withCount(array $count)
    {
        $this->withCount = array_merge($this->withCount, $count);
    }

    /**
     * @param array $eager
     * @param Repository|null $repository
     */
    public function eagerLoading(array $eager, ?Repository $repository = null)
    {
        $repository = $repository ?? $this->repository;

        if (!$repository) return;

        //get related model instance
        $model = $repository->model();
        $model = new $model;
        //get only first layer of eager loading
        $eager = array_map(function ($v) {
            return explode('.', $v)[0];
        }, $eager);

        //filter with available model relations
        $eager = array_intersect_key($model->relationships, array_flip(array_unique($eager)));

        //filter uniques
        $eager = array_unique(Arr::flatten(array_map(function ($v) {
            return explode(',', $v);
        }, array_values($eager))));


        if (!empty($eager)) $this->addWith($eager);

    }

    /**
     * @param null $repository
     */
    protected function loadEager($repository = null)
    {
        $repository = $repository ?? $this->repository;
        if (!$repository) return;

        //eager
        if (!empty($this->with)) $this->repository->with($this->with);
        if (!empty($this->withCount)) $this->repository->withCount($this->withCount);
    }

    /**
     * @param $field
     * @param $sortOrder
     */
    public function orderByField($field, $sortOrder = 'DESC')
    {
        if ($field) $this->repository->pushCriteria(new OrderByFieldCriteria($field, $sortOrder));
    }

    /**
     * @param array $fields
     */
    public function orderByFields(array $fields)
    {
        if (!empty($fields)) {
            foreach ($fields as $field) {
                $this->repository->pushCriteria(new OrderByFieldCriteria($field[0], $field[1] ?? 'DESC'));
            }
        }
    }

    /**
     * @param $raw
     */
    public function orderByRaw($raw)
    {
        if ($raw) $this->repository->pushCriteria(new OrderByRawCriteria($raw));
    }
}
