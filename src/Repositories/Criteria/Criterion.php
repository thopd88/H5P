<?php

namespace EscolaLms\HeadlessH5P\Repositories\Criteria;

use Illuminate\Database\Eloquent\Builder;

abstract class Criterion
{
    abstract public function apply(Builder $query): Builder;
}