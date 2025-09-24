<?php

namespace EscolaLms\HeadlessH5P\Dtos;

use EscolaLms\HeadlessH5P\Dtos\Contracts\InstantiateFromRequest;
use EscolaLms\HeadlessH5P\Repositories\Criteria\Criterion;

abstract class CriteriaDto implements InstantiateFromRequest
{
    protected array $criteria = [];

    public function getCriteria(): array
    {
        return $this->criteria;
    }

    protected function addCriterion(Criterion $criterion): self
    {
        $this->criteria[] = $criterion;
        return $this;
    }
}