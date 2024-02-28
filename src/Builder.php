<?php

namespace Maize\RulesBuilder;

use Closure;
use Illuminate\Support\Arr;

class Builder
{
    public function __construct(
        private array $rules = []
    ) {
    }

    public static function new(): self
    {
        return new self();
    }

    public function add(
        array|string $attributes,
        Closure|array|string $rules = []
    ): self {

        $attributes = Arr::wrap($attributes);

        foreach ($attributes as $key => $value) {
            $attribute = array_is_list($attributes)
                ? $value
                : $key;

            $this->rules[$attribute] = match (true) {
                $rules instanceof Closure => array_is_list($attributes)
                    ? $rules()
                    : $rules($value),
                default => $rules,
            };
        }

        return $this;
    }

    public function get(): array
    {
        return $this->rules;
    }
}
