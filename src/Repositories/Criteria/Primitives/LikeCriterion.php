<?php

namespace EscolaLms\HeadlessH5P\Repositories\Criteria\Primitives;

use EscolaLms\HeadlessH5P\Repositories\Criteria\Criterion;
use Illuminate\Database\Eloquent\Builder;

class LikeCriterion extends Criterion
{
    private string $column;
    private $value;

    public function __construct(string $column, $value)
    {
        $this->column = $column;
        $this->value = $value;
    }

    public function apply(Builder $query): Builder
    {
        return $query->where($this->column, 'LIKE', '%' . $this->value . '%');
    }
}