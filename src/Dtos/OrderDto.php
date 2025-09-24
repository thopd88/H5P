<?php

namespace EscolaLms\HeadlessH5P\Dtos;

use Illuminate\Http\Request;

class OrderDto
{
    private ?string $orderBy;
    private string $order;

    public function __construct(?string $orderBy = null, string $order = 'ASC')
    {
        $this->orderBy = $orderBy;
        $this->order = strtoupper($order);
    }

    public static function instantiateFromRequest(Request $request): self
    {
        return new self(
            $request->get('order_by'),
            $request->get('order', 'ASC')
        );
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public function hasOrder(): bool
    {
        return !empty($this->orderBy);
    }
}